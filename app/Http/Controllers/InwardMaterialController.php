<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InwardMaterial;
use App\Models\Supplier;
use App\Models\Manufacturer;
use App\Models\Rawmeterial;
use App\Models\Rawmaterialitems;
use App\Models\Department;
use DB;
use Auth;
class InwardMaterialController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');


    }
    public function index()
    {


        $data['inward_material']=Rawmaterialitems::select(
            "inward_raw_materials.*","inward_raw_materials_items.*","suppliers.name","manufacturers.manufacturer as man_name","raw_materials.material_name","raw_materials.material_stock","mesurments.mesurment","inward_raw_materials_items.id as itemid")->join("inward_raw_materials","inward_raw_materials.id","inward_raw_materials_items.inward_raw_material_id")->join("suppliers","suppliers.id","inward_raw_materials.supplier")->join("manufacturers","manufacturers.id","inward_raw_materials.manufacturer")->join("raw_materials","raw_materials.id","inward_raw_materials_items.material")->join("mesurments","mesurments.id","raw_materials.material_mesurment")->get();

        return view("inwardrawmaterial",$data);
    }
    public function create()
    {

        $rawmaterial = Rawmeterial::where("material_type","R")->pluck("material_name","id");
        $supplier  = Supplier::where("publish",1)->pluck("name","id");
        $manufacturer = Manufacturer::where("publish",1)->pluck("manufacturer","id");
        $maxid = InwardMaterial::select(DB::Raw("max(id) as nextid"))->first();
        $department = Department::pluck("department","id");
        $nextid =1;
        if($maxid->nextid)
            $nextid = $maxid->nextid+1;
        return view("inwardrawmaterial_add")->with(["rawmaterial"=>$rawmaterial,"supplier"=>$supplier,"manufacturer"=>$manufacturer,"nextid"=>$nextid,"department"=>$department]);
    }
    public function store(Request $request)
    {


         //
         $arrRules = ["rno"=>"required",
         "from"=>"required",
         "to"=>"required",
         "receiptDate"=>"required",
         "materialname"=>"required",
         "manufacturername"=>"required",
         "suppliername"=>"required",
         /*"supplierAddress"=>"required",
         "supplierGST"=>"required",*/
         "invoiceNo"=>"required",
         "receiptNo"=>"required",
         "materialnames.*"=>"required",
         "batch.*"=>"required",
         "Containers.*"=>"required",
         "Quantity.*"=>"required",
         "mfgDate.*"=>"required",
         "ExpiryDate.*"=>"required",
         /*"RIOExpiryDate.*"=>"required",*/

         "createdby"=>"required",
         "cdate"=>"required",
         "ctime"=>"required"];


        $arrMessages = [
            "rno"=>"This :attribute field is required.",
            "rno.unique"=>"This :attribute already in use.",
            "from"=>"This :attribute field is required.",
            "to"=>"This :attribute field is required.",
            "receiptDate"=>"This :attribute field is required.",
            "materialname"=>"This :attribute field is required.",
            "manufacturername"=>"This :attribute field is required.",
            "suppliername"=>"This :attribute field is required.",
            "supplierAddress"=>"This :attribute field is required.",
            "supplierGST"=>"This :attribute field is required.",
            "invoiceNo"=>"This :attribute field is required.",
            "receiptNo"=>"This :attribute field is required.",
            "materialnames.*"=>"This :attribute field is required.",
            "batch.*"=>"This :attribute field is required.",
            "Containers.*"=>"This :attribute field is required.",
            "Quantity.*"=>"This :attribute field is required.",
            "mfgDate.*"=>"This :attribute field is required.",
            "ExpiryDate.*"=>"This :attribute field is required.",
            "RIOExpiryDate.*"=>"This :attribute field is required.",
            "ARNo.*"=>"This :attribute field is required.",
            "createdby"=>"This :attribute field is required.",
            "cdate"=>"This :attribute field is required.",
            "ctime"=>"This :attribute field is required."

        ];

        $attributes = array();
        foreach ($request->input() as $key => $val)
        $attributes[$key] = ucwords(str_replace("_", " ", $key));

        $validateData = $request->validate($arrRules, $arrMessages,$attributes);

        $data = array();
        $data["inward_no"] = $request->rno;
        $data["received_from"] = $request->to;
        $data["received_to"] = $request->from;
        $data["date_of_receipt"] = $request->receiptDate?strtotime($request->receiptDate):"";
        $data["material"] = $request->materialname;
        $data["manufacturer"] = $request->manufacturername;
        $data["supplier"] = $request->suppliername;
        $data["supplier_address"] = $request->supplierAddress;
        $data["supplier_gst"] = $request->supplierGST;
        $data["invoice_no"] = $request->invoiceNo;
        $data["goods_receipt_no"] = $request->receiptNo;
        $data["created_by"] = Auth::user()->id;
        $data["remark"] = $request->remark;

        $result = InwardMaterial::create($data);

        if($result->id)
        {
            if(isset($request->materialnames))
            {
                $itemdata = array();
                $i=0;
                foreach($request->materialnames as $value)
                {
                    $itemdata["inward_raw_material_id"] = $result->id;
                    $itemdata["material"] = $value;
                    $itemdata["batch_no"] = $request->batch[$i];
                    $itemdata["total_no_of_containers_or_bags"] = $request->Containers[$i];
                    $itemdata["qty_received_kg"] = $request->Quantity[$i];
                    $itemdata["mfg_date"] = $request->mfgDate[$i]!=""?strtotime($request->mfgDate[$i]):"";
                    $itemdata["mfg_expiry_date"] = $request->ExpiryDate[$i]!=""?strtotime($request->ExpiryDate[$i]):"";
                    $itemdata["rio_care_expiry_date"] = $request->RIOExpiryDate[$i]!=""?strtotime($request->RIOExpiryDate[$i]):"";
                    $itemdata["ar_no_date"] = $request->ARNo[$i]?($request->ARNo[$i]):"";

                    $resultsItem = Rawmaterialitems::create($itemdata);
                    $datas = array();
                    $stock = Rawmeterial::find($value);
                    $datas["material_stock"] = ($stock->material_stock+$request->Quantity[$i]);

                    $stock->update($datas);

                    $i++;
                }
            }
            return redirect("inward-rawmaterials")->with('message', "Material Inward successfully");
        }
        else
            return redirect("inward-rawmaterials")->with('error', "Something went wrong");


    }
    public  function getsupllier(Request $request)
    {
        if($request->id)
        {
            $supplier = Supplier::where("id",$request->id)->first();
            if($supplier)
            {
                return response()->json(['address' => $supplier->address, 'gst' =>$supplier->gst_no]);
            }
        }
    }
    public function showmaterail(Request $request)
    {
        if($request->id)
        {
            $data['inward_material']=Rawmaterialitems::select("inward_raw_materials.*","inward_raw_materials_items.*","suppliers.name","manufacturers.manufacturer as man_name","raw_materials.material_name","raw_materials.material_stock","mesurments.mesurment","inward_raw_materials_items.id as itemid","users.name as uname")
            ->join("inward_raw_materials","inward_raw_materials.id","inward_raw_materials_items.inward_raw_material_id")
            ->join("suppliers","suppliers.id","inward_raw_materials.supplier")
            ->join("manufacturers","manufacturers.id","inward_raw_materials.manufacturer")
            ->join("raw_materials","raw_materials.id","inward_raw_materials_items.material")
            ->join("mesurments","mesurments.id","raw_materials.material_mesurment")
            ->join("users","users.id","inward_raw_materials.created_by")
            ->where("inward_raw_materials_items.id",$request->id)->first();

            $view = view('viewinwardrawmaterial',$data)->render();
             return response()->json(['html'=>$view]);

        }
        else
        {
            throw(404);
        }
    }
}
