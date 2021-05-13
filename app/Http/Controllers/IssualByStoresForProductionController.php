<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rawmeterial;
use App\Models\IssualStoresForProduction;
use Auth;
class IssualByStoresForProductionController extends Controller
{
    public function issual_by_stores_for_production()
    {
        $data['issue_stores']=IssualStoresForProduction::select('issual_by_stores_for_production.*','raw_materials.material_name',"inward_raw_materials_items.batch_no","users.name")
        ->join('raw_materials','raw_materials.id','issual_by_stores_for_production.id')
        ->join('inward_raw_materials_items','inward_raw_materials_items.id','issual_by_stores_for_production.batch_no')
        ->join('users','users.id','issual_by_stores_for_production.dispensed_by')
        ->get();
        return view('issual_by_stores_for_production',$data);
    }
    public function issual_by_stores_for_production_add()
    {

        $rawmaterial =Rawmeterial::where('material_type','R')->where("material_stock",">",0)->pluck("material_name","id");
        return view('issual_by_stores_for_production_add')->with(["rawmaterial"=>$rawmaterial]);
    }
    public function issue_by_stores_insert(Request $request)
    {

         $data = [
            "requisition_no"=>$request['requisition_no'],
            "opening_balance"=>$request['opening_balance'],
            "issual_date"=>$request['issual_date'],
            "product_name"=>$request['product_name'],
            "batch_no"=>$request['batch_no'],
            "quantity"=>$request['quantity'],
            "for_fg_batch_no"=>$request['for_fg_batch_no'],
            "returned_from_day_store"=>$request['returned_from_day_store'],
            "dispensed_by"=> Auth::user()->id,
            "remark"=>$request['remark'],
         ];

        $result = IssualStoresForProduction::create($data);

        if ($result) {
            return redirect("issual_by_stores_for_production")->with('success', "Data created successfully");
        }
    }
    public function view_store(Request $request)
    {
        //
        if($request->id)
        {
            $IssualStores = IssualStoresForProduction::select('issual_by_stores_for_production.*','raw_materials.material_name')
            ->join('raw_materials','raw_materials.id','issual_by_stores_for_production.id')
            ->where("issual_by_stores_for_production.id",$request->id)->first();
             $view = view('view_issual_stores', ['IssualStores'=> $IssualStores])->render();
             return response()->json(['html'=>$view]);

        }
        else
        {
            redirect(404);
        }
    }


}
