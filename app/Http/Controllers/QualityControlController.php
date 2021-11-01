<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualitycontroll;
use App\Models\Rawmeterial;
use App\Models\InwardMaterial;
use App\Models\Rawmaterialitems;
use Illuminate\Support\Facades\Auth;

class QualityControlController extends Controller
{
    public function quality_control()
    {
        $data['quality_control']=Rawmaterialitems::select(
            'quality_controll_check.*','quality_controll_check.id as quality_id',
            'inward_raw_materials_items.material as raw_material_name',
            'inward_raw_materials_items.id as inward_r_m_id',
            'inward_raw_materials.manufacturer as name_manufacturer',
            'inward_raw_materials.supplier as name_supplier',
            'inward_raw_materials.material as name_material',
            'inward_raw_materials.id as inward_r_m_t_id',
            'inward_raw_materials_items.batch_no',
            'inward_raw_materials_items.qty_received_kg',
            'inward_raw_materials_items.ar_no_date',
            'inward_raw_materials.goods_receipt_no',
            'raw_materials.id as r_m_id',
            'raw_materials.material_name',
            "suppliers.name",
            "manufacturers.manufacturer",
            "raw_materials.created_at",
            "inward_raw_materials_items.id as itemid"
            )

        ->join('inward_raw_materials','inward_raw_materials.id','=','inward_raw_materials_items.inward_raw_material_id' )
        ->join('raw_materials','raw_materials.id','=','inward_raw_materials_items.material')
        ->join("suppliers","suppliers.id","inward_raw_materials.supplier")
        ->join("manufacturers","manufacturers.id","inward_raw_materials.manufacturer")
        ->leftjoin('quality_controll_check','quality_controll_check.inward_material_item_id','=','inward_raw_materials_items.id' )
        ->orderBy('inward_raw_materials.created_at', 'desc')
       ->get();
        return view('quality_control',$data);
    }

    public function quality_control_insert(Request $request)
    {
        $arrRules = [
            "quantity_approved"=>"required",
            "quantity_rejected"=>"required",
            "quantity_status"=>"required",
            "date_of_approval"=>"required",
            "inward_material_id"=>"required",
            "inward_material_item_id"=>"required",
            "total_qty"=>"required",
            "raw_material_id"=>"required",
            "ar_number"=>"required",

           ];
           $arrMessages = [
            "dispath_noThis :attribute field is required.",
            "quantity_approved"=>"This :attribute field is required.",
            "quantity_rejected"=>"This :attribute field is required.",
            "quantity_status"=>"This :attribute field is required.",
            "date_of_approval"=>"This.This :attribute field is required.",
            "inward_material_id"=>"This :attribute field is required.",
            "inward_material_item_id"=>"This.This :attribute field is required.",
            "total_qty"=>"This :attribute field is required.",
            "raw_material_id"=>"This :attribute field is required.",
            "ar_number"=>"This :attribute field is required.",
            ];
          // $validateData = $request->validate($arrRules, $arrMessages);

        $data = [
            'quantity_approved' => $request['quantity_approved'],
            'quantity_rejected' => $request['quantity_rejected'],
            'quantity_status' => $request['quantity_status'],
            'date_of_approval' => $request['date_of_approval'],
            'inward_material_id' => $request['inward_id'],
            'inward_material_item_id' => $request['inward_item_id'],
            'total_qty' => $request['total_qty'],
            'raw_material_id' => $request['rawmaterial_id'],
            'ar_no' => $request['ar_number'],
            'checked_by' => Auth::user()->id,
        ];

        $result =Qualitycontroll::create($data);


         if($result)
         {
            $rowmeterial = Rawmaterialitems::find($request['inward_item_id']);
            if($rowmeterial)
            {
                $datas = array();
                $datas["ar_no_date"] = $request['ar_number'];
                $rowmeterial->update($datas);
            }
            return redirect("quality_control")->with('success', "Item checked successfully.");
         }
    }
    public function qty_control(Request $request)
    {

         $qty_control_view = Rawmaterialitems::select(
            'quality_controll_check.*','quality_controll_check.id as quality_id',
            'inward_raw_materials_items.material as raw_material_name',
            'inward_raw_materials.id as inward_id',
            'inward_raw_materials_items.batch_no',
            'inward_raw_materials_items.qty_received_kg',
            'inward_raw_materials_items.ar_no_date',
            'inward_raw_materials.goods_receipt_no',
            'raw_materials.id as r_m_id',
            'raw_materials.material_name',
            "inward_raw_materials_items.id as itemid"
            )

        ->join('inward_raw_materials','inward_raw_materials.id','=','inward_raw_materials_items.inward_raw_material_id' )
        ->join('raw_materials','raw_materials.id','=','inward_raw_materials_items.material')
        ->join("suppliers","suppliers.id","inward_raw_materials.supplier")
        ->join("manufacturers","manufacturers.id","inward_raw_materials.manufacturer")
        ->leftjoin('quality_controll_check','quality_controll_check.inward_material_item_id','=','inward_raw_materials_items.id' )
        ->where("inward_raw_materials_items.id",$request->quality_id)->first();
         $view = view('qty_control_view',['qty_control_view'=> $qty_control_view])->render();

         return response()->json(['html'=>$view]);

    }
    public function view_quality(Request $request)
    {

        if($request->quality_id)
        {

            $view_quality =Rawmaterialitems::select(
                'quality_controll_check.*','quality_controll_check.id as quality_id',
                'inward_raw_materials_items.material as raw_material_name',
                'inward_raw_materials_items.id as inward_r_m_id',
                'inward_raw_materials.manufacturer as name_manufacturer',
                'inward_raw_materials.supplier as name_supplier',
                'inward_raw_materials.material as name_material',
                'inward_raw_materials.id as inward_r_m_t_id',
                'inward_raw_materials_items.batch_no',
                'inward_raw_materials_items.qty_received_kg',
                'inward_raw_materials_items.ar_no_date',
                'inward_raw_materials.goods_receipt_no',
                'raw_materials.id as r_m_id',
                'raw_materials.material_name',
                "suppliers.name",
                "manufacturers.manufacturer",
                "inward_raw_materials_items.id as itemid"
                )
            ->join('inward_raw_materials','inward_raw_materials.id','=','inward_raw_materials_items.inward_raw_material_id' )
            ->join('raw_materials','raw_materials.id','=','inward_raw_materials_items.material')
            ->join("suppliers","suppliers.id","inward_raw_materials.supplier")
            ->join("manufacturers","manufacturers.id","inward_raw_materials.manufacturer")
            ->leftjoin('quality_controll_check','quality_controll_check.inward_material_item_id','=','inward_raw_materials_items.id' )
            ->where("inward_raw_materials_items.id",$request->quality_id)->first();
            $view = view('view_quality_control', ['view_quality'=> $view_quality])->render();
            return response()->json(['html'=>$view]);



        }
        else
        {

        redirect(404);
        }
    }
}
