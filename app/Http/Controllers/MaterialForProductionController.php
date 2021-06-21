<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Rawmeterial;
use App\Models\Rawmaterialitems;
use App\Models\Issuematerialproduction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public function view_issue_material(Request $request)
    {
        if($request->id)
        {

        $issue_material=Issuematerialproduction::select('issue_material_production.*','raw_materials.material_name',"inward_raw_materials_items.batch_no as rbatch","users.name")
        ->join("raw_materials", "raw_materials.id", "=", "issue_material_production.material")
        ->join("inward_raw_materials_items", "inward_raw_materials_items.id", "=", "issue_material_production.batch_no")
        ->join("users", "users.id", "=", "issue_material_production.dispensed_by")
        ->where("issue_material_production.id", $request->id)->first();
        $view = view('view_issue_material', ['issue_material'=> $issue_material])->render();
        return response()->json(['html'=>$view]);



    }
    else
    {
        redirect(404);
    }
    }
    public function issue_material_for_production_add()
    {
        $data['supplier_master']=Supplier::all();
        $data["rawmaterial"] = Rawmeterial::where("material_type","R")->where("material_stock",">",0)->pluck("material_name","id");
        return view('issue_material_for_production_add',$data);
    }
    public function issue_material_insert(Request $request)
    {

        $arrRules = [
       "requisition_no"=>"required",
        "material"=>"required",
        "opening_bal"=>"required",
        "batch_no"=>"required",
        "viscosity"=>"required",
        // "batch_quantity"=>"required",
        "issual_date"=>"required",
        // "issued_quantity"=>"required",
        // "excess"=> "required",
        // "finished_batch_no"=>"required",
        // "wastage"=> "required",
        // "returned_from_day_store"=>"required",
        "closing_balance_qty"=>"required",
        "dispensed_by"=>"required",
        // "remark"=>"required",
         ];
   $arrMessages = [
            "requisition_no"=>"This :attribute field is required.",
            "material"=>"This :attribute field is required..",
            "opening_bal"=>"This :attribute field is required.",
            "batch_no"=>"This :attribute field is required..",
            "viscosity"=>"This :attribute field is required.",
            "batch_quantity"=>"This :attribute field is required.",
            "issual_date"=>"This :attribute field is required.",
            "issued_quantity"=>"This :attribute field is required.",
            "finished_batch_no"=>"This :attribute field is required.",
            "excess"=>"This :attribute field is required.",
            "wastage"=>"This :attribute field is required.",
            "returned_from_day_store"=>" This :attribute field is required.",
            "closing_balance_qty"=>"This :attribute field is required.",
            "dispensed_by"=>"This :attribute field is required.",
            "remark"=>"This :attribute field is required.",
     ];
      $validateData = $request->validate($arrRules,$arrMessages);


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
            redirect(404);
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
            redirect(404);
        }
    }
}
