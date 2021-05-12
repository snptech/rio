<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Rawmeterial;
use App\Models\Rawmaterialitems;
use App\Models\Issuematerialproduction;
use DB;
use Auth;
class MaterialForProductionController extends Controller
{
    public function issue_material_for_production()
    {

        $data['issue_material']=Issuematerialproduction::select('issue_material_production.*','raw_materials.material_name',"inward_raw_materials_items.batch_no as rbatch","users.name")
        ->join("raw_materials", "raw_materials.id", "=", "issue_material_production.material")
        ->join("inward_raw_materials_items", "inward_raw_materials_items.id", "=", "issue_material_production.batch_no")
        ->join("users", "users.id", "=", "issue_material_production.dispensed_by")

        ->get();

        return view('issue_material_for_production',$data);
    }
    public function view_issue_material($id)
    {

        $data['issue_material']=Issuematerialproduction::select('issue_material_production.*','raw_materials.material_name')
        ->join("raw_materials", "raw_materials.id", "=", "issue_material_production.material")
        ->where("issue_material_production.id", $id)->get();

        return view('view_issue_material',$data);
    }
    public function issue_material_for_production_add()
    {
        $data['supplier_master']=Supplier::all();
        $data["rawmaterial"] = Rawmeterial::where("material_type","R")->where("material_stock",">",0)->pluck("material_name","id");
        return view('issue_material_for_production_add',$data);
    }
    public function issue_material_insert(Request $request)
    {

        $data = [
        'requisition_no'=> $request['requisition_no'],
        'material'=> $request['material'],
         'opening_bal'=> $request['opening_bal'],
        'batch_no'=> $request['batch_no'],
        'viscosity'=> $request['viscosity'],
        'issual_date'=> $request['issual_date'],
        'issued_quantity'=> $request['issued_quantity'],
        'finished_batch_no'=> $request['finished_batch_no'],
        'batch_quantity'=> $request['batch_quantity'],
        'excess'=> $request['excess'],
        'wastage'=> $request['wastage'],
        'returned_from_day_store'=> $request['returned_from_day_store'],
        'closing_balance_qty'=> $request['closing_balance_qty'],
        'dispensed_by'=> Auth::user()->id,
        'remark'=> $request['remark'],
        ];
        $result= Issuematerialproduction::create($data);
        if($result)
        {
            $rawmaterial = Rawmeterial::find($request["matetial"]);
            if(isset($rawmaterial))
            {
                //update rawmaterial main stock
                $rdata["material_stock"] = ($rawmaterial->material_stock-$request['issued_quantity']);
                $rawmaterial->update($rdata["material_stock"]);

                //update rawmaterial batch quantity
                $batch = Rawmaterialitems::find($request["batch_no"]);
                if(isset($batch)){
                    $bdata["used_qty"] = ($batch->used_qty-$request['issued_quantity']);
                    $batch->updat($batch);
                }
            }
            return redirect("issue_material_for_production")->with('message', "Data created successfully");
        }
    }
    public function getmatarialqtyandbatch(Request $request){
        if($request->id)
        {
            $rawmaterial=Rawmeterial::where("id",$request->id)->first();
            $batch = Rawmaterialitems::where("material",$request->id)->where("qty_received_kg",">",0)->pluck("batch_no","id");

            $data["material"] = $rawmaterial;
            $data["batch"] = $batch;
            return response()->json($data);
        }
        else{
            throw(404);
        }
    }
    public function getmatarialqtyofbatch(Request $request)
    {
        if($request->id && $request->rawmaterial)
        {

            $batch = Rawmaterialitems::where("material",$request->rawmaterial)->where("id",$request->id)->where(DB::raw("(qty_received_kg-used_qty)"),">",0)->first();
            if(isset($batch))
                $data["qty"] = ($batch->qty_received_kg-$batch->used_qty);
            else
            $data["qty"] = 0;

            return response()->json($data);
        }
        else{
            throw(404);
        }
    }
}
