<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeMaster;
use App\Models\Rawmeterial;
use App\Models\MaterialForProduction;
class MaterialForProductionController extends Controller
{
    public function issue_material_for_production()
    {
        $rawmaterial = Rawmeterial::pluck("material_name","id");
        return view('issue_material_for_production')->with(["rawmaterial"=>$rawmaterial]);
    }
    public function getmatarial(Request $request)
    {
        if($request->id)
        {
            $material = Rawmeterial::where("id",$request->id)->first();

            if(isset($material))
            {
                return response()->json(['address' => $supplier->address, 'gst' =>$supplier->gst_no]);
            }
        }
    }
}

