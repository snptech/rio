<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rawmeterial;
use App\Models\Stock;
use DB;
class RawmaterialController extends Controller
{
    //
    public function __construct()
    {
        {
            $this->middleware('auth');
            $this->middleware('permission:rawmaterial-list|rawmaterial-add|rawmaterial-edit|rawmaterial-delete', ['only' => ['index','store']]);
            $this->middleware('permission:rawmaterial-add', ['only' => ['create','store']]);
            $this->middleware('permission:rawmaterial-edit', ['only' => ['edit','update']]);
            $this->middleware('permission:rawmaterial-delete', ['only' => ['destroy']]);
    
        }


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //LISTING THE Departments
        $rawmaterials = Rawmeterial::select("raw_materials.*","mesurments.mesurment")->join("mesurments","mesurments.id","raw_materials.material_mesurment")->get();

        return view("master.rawmaterial.index")->with(["rawmaterials"=>$rawmaterials]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mesurments = DB::table('mesurments')->pluck("mesurment","id");
        $type = array("P"=>"Packing Material","F"=>"Finished Goods","R"=>"Raw Material");
        return view("master.rawmaterial.create")->with(["mesurments"=>$mesurments,"type"=>$type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $arrRules = ["rawmeterial"=>"required|unique:raw_materials,material_name",
                     "mesurment"=>"required",
                     "stock"=>"required",
                     "type"=>"required"];


        $arrMessages = [
        "rawmaterial"=>"This :attribute field is required.",
         "mesurment"=>"This :attribute field is required.",
        "stock"=>"This :attribute field is required.",
        "type"=>"This :attribute field is required"
        ];

        $attributes = array();
        foreach ($request->input() as $key => $val)
            $attributes[$key] = ucwords(str_replace("_", " ", $key));

        $validateData = $request->validate($arrRules, $arrMessages,$attributes);


        $data = array();
        $data["material_name"] = $request->rawmeterial;
        $data["material_mesurment"] = $request->mesurment;
        $data["material_stock"] = $request->stock;
        $data["capacity"] = $request->capacity;
        $data["material_preorder_stock"] = $request->prestock?$request->prestock:0;
        $data["expiry_date"] = $request->expierydate?strtotime($request->expierydate):'';
        $data["rio_expiry_date"] = $request->rioexpierydate?strtotime($request->rioexpierydate):'';
        $data["material_type"] = $request->type?$request->type:"";
        $data["man_date"] = $request->manufacturingdate?strtotime($request->manufacturingdate):'';
        $data["material_code"] = $request->rawmeterial_code?($request->rawmeterial_code):'';


        

        /*if($request->expierydat)
        {
            $expdate = explode("/",$request->expierydate);
            $data["expiry_date"] = $request->expierydate?strtotime($expdate[2]."-".$expdate[0]."-".$expdate[1]):"";
        }
        if($request->rioexpierydate){
            $rio_expiry_date = explode("/",$request->rioexpierydate);
            $data["rio_expiry_date"] = $request->rioexpierydate?strtotime($rio_expiry_date[2]."-".$rio_expiry_date[0]."-".$rio_expiry_date[1]):"";

        }
        if($request->manufacturingdate){
            $manufacturingdate = explode("/",$request->manufacturingdate);
            $data["man_date"] = $request->manufacturingdate?strtotime($manufacturingdate[2]."-".$manufacturingdate[0]."-".$manufacturingdate[1]):"";

        }*/


        $result = Rawmeterial::create($data);

        


        if($result->id)
        {
            $stockarr = array();
            //$stockitem = Stock::where("material_id",$value)->where("material_type","P")->where("process_batch_id",$id)->first();
            $stockarr["matarial_id"] = $result->id;
            $stockarr["material_type"] = $request->type?$request->type:"";;
            $stockarr["department"] = 3;
            $stockarr["qty"] = $request->stock;
            $stockarr["batch_no"] = 0;
            $stockarr["process_batch_id"] = $result->id;
            $stockarr["ar_no_date"] =  $request->rawmeterial_code?($request->rawmeterial_code):'';
            $stockarr["type"] = $request->type?$request->type:"";
            
            $stockins = Stock::create($stockarr);
            return redirect("rawmaterial")->with('message', "Raw Material created successfully");
        }
        else
            return redirect("rawmaterial")->with('error', "Something went wrong");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if($id)
        {
            $rawmaterial = Rawmeterial::where("id",$id)->first();
            $mesurments = DB::table('mesurments')->pluck("mesurment","id");
            $type = array("P"=>"Packing Material","F"=>"Finished Goods","R"=>"Raw Material");
            return view("master.rawmaterial.edit")->with(["rawmaterial"=>$rawmaterial,"mesurments"=>$mesurments,"type"=>$type]);
        }
        else
            redirect(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $arrRules = ["rawmeterial"=>"required|unique:raw_materials,material_name,".$id,
        "mesurment"=>"required",
        "stock"=>"required",
        "type"=>"required"];


        $arrMessages = [
        "rawmaterial"=>"This :attribute field is required.",
        "mesurment"=>"This :attribute field is required.",
        "stock"=>"This :attribute field is required.",
        "type"=>"This :attribute field is required"
        ];

        $attributes = array();
        foreach ($request->input() as $key => $val)
        $attributes[$key] = ucwords(str_replace("_", " ", $key));

        $validateData = $request->validate($arrRules, $arrMessages,$attributes);


        $data = array();
        $data["material_name"] = $request->rawmeterial;
        $data["material_mesurment"] = $request->mesurment;
        $data["material_stock"] = $request->stock;
        $data["material_preorder_stock"] = $request->prestock?$request->prestock:0;
        $data["expiry_date"] = $request->expierydate?strtotime($request->expierydate):'';
        $data["rio_expiry_date"] = $request->rioexpierydate?strtotime($request->rioexpierydate):'';
        $data["material_type"] = $request->type?$request->type:"";
        $data["man_date"] = $request->manufacturingdate?strtotime($request->manufacturingdate):'';
        $data["material_code"] = $request->rawmeterial_code?($request->rawmeterial_code):'';
        /*if($request->expierydat)
        {
            $expdate = explode("/",$request->expierydate);
            $data["expiry_date"] = $request->expierydate?strtotime($expdate[2]."-".$expdate[0]."-".$expdate[1]):"";
        }
        if($request->rioexpierydate){
            $rio_expiry_date = explode("/",$request->rioexpierydate);
            $data["rio_expiry_date"] = $request->rioexpierydate?strtotime($rio_expiry_date[2]."-".$rio_expiry_date[0]."-".$rio_expiry_date[1]):"";

        }
        if($request->manufacturingdate){
            $manufacturingdate = explode("/",$request->manufacturingdate);
            $data["man_date"] = $request->manufacturingdate?strtotime($manufacturingdate[2]."-".$manufacturingdate[0]."-".$manufacturingdate[1]):"";

        }*/
        $rawmaterial = Rawmeterial::find($id);
        $result = $rawmaterial->update($data);

        if($result)
        {

            $stockarr = array();
            $stockitem = Stock::where("matarial_id",$id)->where("material_type",$request->type)->where("process_batch_id",$id)->first();
            $stockarr["matarial_id"] = $id;
            $stockarr["material_type"] = $request->type?$request->type:"";;
            $stockarr["department"] = 3;
            $stockarr["qty"] = $request->stock;
            $stockarr["batch_no"] = 0;
            $stockarr["process_batch_id"] = $id;
            $stockarr["ar_no_date"] =  $request->rawmeterial_code?($request->rawmeterial_code):'';
            $stockarr["type"] = $request->type?$request->type:"";
            
            if(isset($stockitem))
            {
                $stockins = $stockitem->update($stockarr);
            }
            else
            {
                $cr = Stock::create($stockarr);
            }
                

            return redirect("rawmaterial")->with('message', "Raw Material updated successfully");
        }
        else
            return redirect("rawmaterial")->with('error', "Something went wrong");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rawmaterial = Rawmeterial::findOrFail($id);
        if($rawmaterial)
        {
            $stockitem = Stock::where("matarial_id",$id)->where("material_type",$rawmaterial->material_type)->where("process_batch_id",$id)->first();
            $result = $rawmaterial->delete();
            $res = $stockitem->delete();
            if($result)
            {
                return redirect("rawmaterial")->with('message', "Raw Material deleted successfully");
            }
            else
                return redirect("rawmaterial")->with('error', "Something went wrong");
            }
    }
}
