<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualitycontroll;
use App\Models\Rawmeterial;
use App\Models\InwardMaterial;
use App\Models\Rawmaterialitems;
use App\Models\InwardPackingMaterial;
use App\Models\InwardPackingMaterialItems;
use App\Models\Inwardfinishedgoods;
use App\Models\BatchManufacture;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class QualityControlController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:quality-control-list|quality-control-check|quality_control_packing|quality_control_finishgood|quality_control_batch|quality_control', ['only' => ['quality_control','quality_control_insert',"quality_control_packing","quality_control_finishgood","quality_control_batch"]]);
         $this->middleware('permission:quality-control-check', ['only' => ['qty_control','quality_control_insert']]);
     }
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
            'ar_no_date_date' => $request['ar_date']?$request['ar_date']:"",
            'checked_by' => Auth::user()->id,
            'material_type' =>
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

                $stockarr = array();
                if($request['quantity_status'] == 'Approved')
                {
                    $stockarr["matarial_id"] = $result->raw_material_id;
                    $stockarr["material_type"] = "R";
                    $stockarr["department"] = 3;
                    $stockarr["qty"] = ($request['quantity_approved']-$request['quantity_rejected']);
                    $stockarr["batch_no"] = $request['inward_item_id'];
                    $stockarr["process_batch_id"] = $request['inward_item_id'];
                    $stockarr["ar_no_date"] = $request['ar_number'];
                    $stockarr["ar_no_date_date"] = $request['ar_date']?$request['ar_date']:"";
                    $stockarr["type"] = "R";


                    $stid = Stock::create($stockarr);
                }


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
         $sms='User does not have the right permissions. Necessary permissions are quality-control-check';
         return response()->json(['html'=>$view ,'message'=>$sms]);

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
    public function quality_control_packing(Request $request)
    {
        $data['quality_control']=InwardPackingMaterialItems::select(
            'quality_controll_check.*','quality_controll_check.id as quality_id',
            'goods_receipt_note_items.material as raw_material_name',
            'goods_receipt_note_items.id as inward_r_m_id',
            'goods_receipt_notes.manufacturer as name_manufacturer',
            'goods_receipt_notes.supplier as name_supplier',
            'goods_receipt_notes.id as inward_r_m_t_id',
            'goods_receipt_note_items.total_qty',
            'goods_receipt_notes.goods_receipt_no',
            'raw_materials.id as r_m_id',
            'raw_materials.material_name',
            "suppliers.name",
            "manufacturers.manufacturer",
            "raw_materials.created_at",
            "goods_receipt_note_items.id as itemid"
            )

        ->join('goods_receipt_notes','goods_receipt_notes.id','=','goods_receipt_note_items.good_receipt_id' )
        ->join('raw_materials','raw_materials.id','=','goods_receipt_note_items.material')
        ->join("suppliers","suppliers.id","goods_receipt_notes.supplier")
        ->join("manufacturers","manufacturers.id","goods_receipt_notes.manufacturer")
        ->leftjoin('quality_controll_check','quality_controll_check.inward_material_item_id','=','goods_receipt_note_items.id' )
        ->orderBy('goods_receipt_notes.created_at', 'desc')
       ->get();
        return view('quality_control_packing',$data);

    }
}
