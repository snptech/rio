<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Rawmeterial;
use App\Models\Rawmaterialitems;
use App\Models\RequisitionSlip;
use App\Models\DetailsRequisition;
use App\Models\Issuematerialproduction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Requisitionissuedmaterialdetails;
use App\Models\Requisitionissuedmaterial;
use App\Models\InwardPackingMaterialItems;
use App\Models\PackingMaterialSlip;
use App\Models\Requisition;
use App\Models\Stock;
use Session;
class MaterialForProductionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:issue-material-for-production-list|issue-material-for-production-add|issue-material-for-production-edit', ['only' => ['issue_material_for_production_new','issue_material_insert']]);
        $this->middleware('permission:issue-material-for-production-add', ['only' => ['issue_material_for_production_add','issue_material_insert']]);


    }
    public function issue_material_for_production()
    {

        $data['issue_material']=Issuematerialproduction::select('issue_material_production.*','raw_materials.material_name',"inward_raw_materials_items.batch_no as rbatch","users.name")
        ->join("raw_materials", "raw_materials.id", "=", "issue_material_production.material")
        ->join("inward_raw_materials_items", "inward_raw_materials_items.id", "=", "issue_material_production.batch_no")
        ->join("users", "users.id", "=", "issue_material_production.dispensed_by")

        ->get();

        return view('issue_material_for_production',$data);
    }
    public function issue_material_for_production_new()
    {

        $data['issue_material']=RequisitionSlip::select('packing_material_requisition_slip.*',"users.name","add_batch_manufacture.bmrNo","add_batch_manufacture.Viscosity","add_batch_manufacture.BatchSize")
        ->join("users", "users.id", "=", "packing_material_requisition_slip.checkedBy")
        ->join("add_batch_manufacture", "add_batch_manufacture.id", "=", "packing_material_requisition_slip.batch_id")
      ->get();



        return view('issue_material_for_production_new',$data);
    }
    public function issue_packing_material()
    {
        $data['issue_packing_material']=RequisitionSlip::select('packing_material_requisition_slip.*',"users.name","add_batch_manufacture.bmrNo","add_batch_manufacture.Viscosity","add_batch_manufacture.BatchSize")
        ->join("users", "users.id", "=", "packing_material_requisition_slip.checkedBy")
        ->join("add_batch_manufacture", "add_batch_manufacture.id", "=", "packing_material_requisition_slip.batch_id")
        ->where("packing_material_requisition_slip.type","P")
        ->orderBy('id','desc')
        ->get();

        return view('issue_packing_material',$data);
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
        $data["finishedproducts"] = Rawmeterial::where("material_type","F")->where("material_stock",">",0)->pluck("material_name","id");
        return view('issue_material_for_production_add',$data);
    }
    public function issue_packing_material_add()
    {
        $data['supplier_master']=Supplier::all();
        $data["rawmaterial"] = Rawmeterial::where("material_type","P")->where("material_stock",">",0)->pluck("material_name","id");
        $data["finishedproducts"] = Rawmeterial::where("material_type","F")->where("material_stock",">",0)->pluck("material_name","id");
        return view('issue_packing_material_add',$data);
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
      //$validateData = $request->validate($arrRules,$arrMessages);


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
        'closing_balance_qty'=> $request['opening_bal'] - $request['issued_quantity'],
        // 'closing_balance_qty'=> $request['closing_balance_qty'],
        'dispensed_by'=> Auth::user()->id,
        'remark'=> $request['remark'],
        ];
        DB::beginTransaction();



    // all good

    try {
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
                        $batch->update($batch);
                    }
                }
                DB::commit();
                return redirect("issue_material_for_production")->with('message', "Data created successfully");
            }
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
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
    public function issue_material(Request $request)
    {

        if($request->id)
        {
            $data['issue_material']=RequisitionSlip::select('packing_material_requisition_slip.*',"users.name",
            "add_batch_manufacture.bmrNo","add_batch_manufacture.Viscosity","add_batch_manufacture.BatchSize",
            "fromdep.department as fromdepartmet","todep.department as todepartmet","packing_material_requisition_slip.type")
            ->join("users", "users.id", "=", "packing_material_requisition_slip.checkedBy")
            ->join("add_batch_manufacture", "add_batch_manufacture.id", "=", "packing_material_requisition_slip.batch_id")
            ->join("department as fromdep", "fromdep.id", "=", "packing_material_requisition_slip.from")
            ->join("department as todep", "todep.id", "=", "packing_material_requisition_slip.to")
            //
            ->where("packing_material_requisition_slip.id",$request->id)
            ->first();

            $data["material_details"] = DetailsRequisition::select("detail_packing_material_requisition.*",
            "raw_materials.material_name","detail_packing_material_requisition.id as details_id")
            ->where("requisition_id",$data["issue_material"]->id)
            ->join("raw_materials","raw_materials.id","detail_packing_material_requisition.PackingMaterialName")
            ->get();



            return view('issue_material_for_production_approved',$data);
        }
        else
        {
            redirect(404);
        }
    }
    public function getmatarialqtyofbatchwitharno(Request $request)
    {
        if($request->id && $request->rawmaterial)
        {
            if($request->mat_type == 'P'){
                $items = Stock::where("matarial_id",$request->rawmaterial)->where("id",$request->id)->where(DB::raw("(qty-used_qty)"),">",0)->where("material_type","P")->first();
                if($items)
                {
                    $data["qty"] = ($items->qty-$items->used_qty);
                    $data["arno"] = ($items->ar_no_date);
                    $data["arno_date"] = ($items->ar_no_date_date);
                    return response()->json($data);

                }
                else
                    return response()->json(['qty'=>'Not Available','arno'=>'']);
                }
            else{
                $items = Stock::where("matarial_id",$request->rawmaterial)->where("id",$request->id)->where(DB::raw("(qty-used_qty)"),">",0)->where("material_type","R")->first();
                if($items)
                {
                    $data["qty"] = ($items->qty-$items->used_qty);
                    $data["arno"] = ($items->ar_no_date);
                    $data["arno_date"] = ($items->ar_no_date_date);
                    return response()->json($data);

                }
                else
                    return response()->json(['qty'=>'Not Available','arno'=>'']);
                }


        }
        else
        {
            redirect(404);
        }
    }
    public function packing_material_requisition_slip_approved(Request $request)
    {
        if($request->id)
        {
            $material_details = DetailsRequisition::select("detail_packing_material_requisition.*","raw_materials.material_name","detail_packing_material_requisition.id as details_id")->where("requisition_id",$request->id)->join("raw_materials","raw_materials.id","detail_packing_material_requisition.PackingMaterialName")->get();


            $arrRules = [
                "from"=>"required",
                 "to"=>"required",
                 "batchNo"=>"required",
                 "Date"=>"required",
                 "checkedBy"=>"required",
                 "ApprovedBy"=>"required",
                 "batch_id"=>"required"];

                 $arrMessages = [
                    "from"=>"This :attribute field is required.",
                    "to"=>"This :attribute field is required..",
                    "batchNo"=>"This :attribute field is required.",
                    "Date"=>"This :attribute field is required..",
                    "checkedBy"=>"This :attribute field is required.",
                    "ApprovedBy"=>"This :attribute field is required.",
                    "batch_id"=>"This :attribute field is required."

             ];
            if(isset($material_details) && $material_details)
            {
                foreach($material_details as $material){
                    $arrRules["material_name".$material->id] = "required";
                    $arrRules["Quantity".$material->id] = "required";
                    $arrRules["rBatch".$material->id] = "required";
                    $arrRules["arno".$material->id] = "required";
                    $arrRules["Quantity_app".$material->id] = "required";
                    $arrRules["details_id".$material->id] = "required";

                    $arrMessages["material_name".$material->id] = "This :attribute field is required.";
                    $arrMessages["Quantity".$material->id] = "This :attribute field is required.";
                    $arrMessages["rBatch".$material->id] = "This :attribute field is required.";
                    $arrMessages["arno".$material->id] = "This :attribute field is required.";
                    $arrMessages["Quantity_app".$material->id] = "This :attribute field is required.";
                    $arrMessages["details_id".$material->id] = "This :attribute field is required.";

                }
            }
               $validateData = $request->validate($arrRules,$arrMessages);

               $data["from"] = $request->from;
               $data["to"] = $request->to;
               $data["batch_no"] = $request->batchNo;
               $data["issed_date"] = $request->Date;
               $data["requestion_id"] = $request->id;
               $data["checkedBy"] = Auth::user()->id;
               $data["ApprovedBy"] = Auth::user()->id;
               $data["batch_id"] = $request->batch_id;
               $data["type"] = $request->type;
               DB::beginTransaction();
               // all good

               try {
                    $result = Requisitionissuedmaterial::create($data);
                    if($result)
                    {
                        $requesetion = RequisitionSlip::find($request->id);

                        if(isset($requesetion) && $requesetion)
                        {
                            $requesetion->update(array("status"=>1));
                        }
                        foreach($material_details as $material)
                        {
                                $batch = "rBatch".$material->id;

                                $batches = $request->$batch;

                                $qty = 0;
                            if(count($batches) >0)
                            {
                                    foreach($batches as $k=>$v)
                                    {

                                        $stock =  Stock::where("id",$request->$batch[$k])->first();

                                        $detailsdata["issual_material_id"] = $result->id;
                                        $matrail_id = "material_name_id".$material->id;
                                        $detailsdata["material_id"] = $request->$matrail_id;
                                        $rqty = "Quantity".$material->id;
                                        $detailsdata["requesist_qty"] = $request->$rqty;

                                        $detailsdata["batch_id"] = $v;
                                        $arno = "arno".$material->id;
                                        $detailsdata["ar_no_date"] = $request->$arno[$k];

                                        $arnodate = "arnodate".$material->id;
                                        $detailsdata["ar_no_date_date"] = $request->$arnodate[$k];

                                        $appqty = "Quantity_app".$material->id;
                                        $detailsdata["approved_qty"] = $request->$appqty[$k];
                                        // dd( $request->id);
                                        $detailsdata["main_details_id"] = $request->id;

                                        if($stock->qty >= $request->$appqty[$k])
                                        {
                                                $res = Requisitionissuedmaterialdetails::create($detailsdata);


                                                $type = "type".$material->id;
                                                $type = $request->$type;
                                                if($stock->qty >= $request->$appqty[$k])
                                                if($type == 'P'){

                                                    $rawmeterial = InwardPackingMaterialItems::find($stock->batch_no);

                                                    $rawmeterial->update(array("used_qty"=>($rawmeterial->used_qty+$request->$appqty[$k])));
                                                }
                                                else
                                                    {
                                                        $rawmeterial = Rawmaterialitems::find($stock->batch_no);
                                                        $rawmeterial->update(array("used_qty"=>($rawmeterial->used_qty+$request->$appqty[$k])));
                                                    }



                                                $qty = $qty+$request->$appqty[$k];

                                                $stockupd = $stock->update(array("used_qty"=>($stock->used_qty+$request->$appqty[$k])));


                                        }
                                        else
                                        {

                                            DB::rollback();
                                            return redirect("issue_material_for_production")->with('danger',"Data not created successfully or quantity is greater than avialable quantity");
                                        }

                                    }//foreach
                                        $detailsid = "details_id".$material->id;
                                        $issualdata = array();
                                        $issualdata["approved_qty"] = $qty;
                                        $detailsred = DetailsRequisition::find($request->$detailsid);
                                        $detailsred->update($issualdata);
                                        $stocka = array();
                                        $materialreq =  RequisitionSlip::where("batch_id",$request->batch_id)->first();

                                        /*$stocka["matarial_id"] =  $request->$matrail_id;
                                        $stocka["material_type"] =  $type;
                                        $stocka["department"] =  $materialreq->to;
                                        $stocka["qty"] =  $qty;
                                        $stocka["batch_no"] =  $v;
                                        $stocka["process_batch_id"] =  $request->batch_id;
                                        $stocka["ar_no_date"] =  "";
                                        $stocka["type"] =  $type;

                                        $resstock = Stock::create($stocka);*/

                                        DB::commit();
                                }




                        }
                        return redirect("issue_material_for_production")->with('massage',"Data created successfully");
                    }



            } catch (\Exception $e) {
                    DB::rollback();
                    // something went wrong

                    dd($e);
                }


        }
        else
        {
            redirect(404);
        }
    }
    public function issue_material_view(Request $request)
    {
        if($request->id)
        {
            $data['issue_material']=Requisitionissuedmaterial::select('issue_material_production_requestion.*',"users.name","add_batch_manufacture.bmrNo","add_batch_manufacture.Viscosity","add_batch_manufacture.BatchSize","packing_material_requisition_slip.type")
            ->join("users", "users.id", "=", "issue_material_production_requestion.ApprovedBy")
            ->join("add_batch_manufacture", "add_batch_manufacture.id", "=", "issue_material_production_requestion.batch_id")
            ->join("packing_material_requisition_slip", "packing_material_requisition_slip.id", "=", "issue_material_production_requestion.requestion_id")
            ->where("issue_material_production_requestion.requestion_id",$request->id)
            ->first();

            $data["material_details"] = Requisitionissuedmaterialdetails::select("issue_material_production_requestion_details.*","raw_materials.material_name","issue_material_production_requestion_details.id as details_id")->where("issual_material_id",$data["issue_material"]->id)->join("raw_materials","raw_materials.id","issue_material_production_requestion_details.material_id")->get();

            return view('issue_material_for_production_approved_view',$data);
        }
        else
        {
            redirect(404);
        }
    }
    public function assingindex(Request $request)
    {
        Session::forget('batchid');
        session()->put('batchid', $request->id);
        echo Session::get('batchid');
    }
}
