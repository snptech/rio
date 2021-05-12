<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualitycontroll;
use App\Models\Rawmeterial;
use App\Models\InwardMaterial;
use App\Models\Rawmaterialitems;


class QualityControlController extends Controller
{
    public function quality_control()
    {
        $data['quality_control']=Qualitycontroll::select(
            'quality_controll_check.*',
            'inward_raw_materials_items.material as raw_material_name',
            'inward_raw_materials.manufacturer as name_manufacturer',
            'inward_raw_materials.supplier as name_supplier',
            'inward_raw_materials.material as name_material',
            'inward_raw_materials_items.batch_no',
            'inward_raw_materials_items.qty_received_kg',
            'inward_raw_materials_items.ar_no_date',
            'inward_raw_materials.goods_receipt_no'
            )
        ->join('inward_raw_materials_items','inward_raw_materials_items.id','=','quality_controll_check.id' )
        ->join('inward_raw_materials','inward_raw_materials.id','=','quality_controll_check.id' )
        ->get();
        return view('quality_control',$data);
    }

    public function quality_control_insert(Request $request)
    {
        $data = [
            'quantity_approved' => $request['quantity_approved'],
            'quantity_rejected' => $request['quantity_rejected'],
            'quantity_status' => $request['quantity_status'],
            'date_of_approval' => $request['date_of_approval'],
            'remark' => $request['remark'],
        ];
        $result =Qualitycontroll::create($data);

         if($result)
         {
         return redirect("quality_control")->with('success', "Data created successfully");
         }
    }
}
