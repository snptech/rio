<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rawmeterial;
use App\Models\IssualStoresForProduction;

class IssualByStoresForProductionController extends Controller
{
    public function issual_by_stores_for_production()
    {
        $data['issue_stores']=IssualStoresForProduction::all();
        return view('issual_by_stores_for_production',$data);
    }
    public function issual_by_stores_for_production_add()
    {

        $rawmaterial =Rawmeterial::where('material_type','F')->where("material_stock",">",0)->pluck("material_name","id");

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
            "dispensed_by"=> $request['dispensed_by'],
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
            $IssualStores = IssualStoresForProduction::where("id",$request->id)->first();
             $view = view('view_issual_stores', ['IssualStores'=> $IssualStores])->render();
             return response()->json(['html'=>$view]);

        }
        else
        {
            redirect(404);
        }
    }


}
