<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InwardPackingMaterial;
use App\Models\Modedispatch;
use App\Models\Grade;
use App\Models\Supplier;
use App\Models\Manufacturer;
use APP\Models\Rawmeterial;
use DB;
class InwardPackingMaterialController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');


    }
    public function index(){
        return view('inward_packing_material');
    }
    public function add()
    {
        $rawmaterial = Rawmeterial::pluck("material_name","id");
        $supplier  = Supplier::where("publish",1)->pluck("name","id");
        $manufacturer = Manufacturer::where("publish",1)->pluck("manufacturer","id");
        return view("add_inward_packing_material")->with(["rawmaterial"=>$rawmaterial,"supplier"=>$supplier,"manufacturer"=>$manufacturer]);
    }
    public function store(Request $request)
    {
        dd($request->input());
        $arrRules = ["dispath_no"=>"required",
                     "dispatch_form"=>"required",
                     "dispatch_to"=>"required",
                     "good_dispatch_date"=>"required",
                     "mode_of_dispatch"=>"required",
                     "party_name"=>"required",
                     "product"=>"required",
                     "invoice_no"=>"required",
                     "batch_no"=>"required",
                     "grade"=>"required",
                     "mfg_date"=>"required",
                     "total_no_qty"=>"required",
                     "seal_no"=>"required",
                     "dispatch_date"=>"required",
                     "dispatch_by"=>"required"
                    ];


        $arrMessages = [
            "dispath_no"=>"This :attribute field is required.",
            "dispatch_form"=>"This :attribute field is required.",
            "dispatch_to"=>"This :attribute field is required.",
            "good_dispatch_date"=>"This :attribute field is required.",
            "mode_of_dispatch"=>"This :attribute field is required.",
            "party_name"=>"This :attribute field is required.",
            "product"=>"This :attribute field is required.",
            "invoice_no"=>"This :attribute field is required.",
            "batch_no"=>"This :attribute field is required.",
            "grade"=>"This :attribute field is required.",
            "mfg_date"=>"This :attribute field is required.",
            "total_no_qty"=>"This :attribute field is required.",
            "seal_no"=>"This :attribute field is required.",
            "dispatch_date"=>"This :attribute field is required.",
            "dispatch_by"=>"This :attribute field is required."

        ];

        $attributes = array();
        foreach ($request->input() as $key => $val)
            $attributes[$key] = ucwords(str_replace("_", " ", $key));

        $validateData = $request->validate($arrRules, $arrMessages,$attributes);

        $data = array();
        $data["inward_no"]=$request->dispath_no;
        $data[""]=$request->dispatch_form;
        $data[""]=$request->dispatch_to;
        $data[""]=$request->good_dispatch_date;
        $data[""]=$request->mode_of_dispatch;
        $data[""]=$request->party_name;
        $data[""]=$request->product;
        $data[""]=$request->invoice_no;
        $data[""]=$request->batch_no;
        $data[""]=$request->grade;
        $data[""]=$request->mfg_date;
        $data[""]=$request->total_no_qty;
        $data[""]=$request->seal_no;
        $data[""]=$request->dispatch_date;
        $data[""]=$request->dispatch_by;
    }
}
