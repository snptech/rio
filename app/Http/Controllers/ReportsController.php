<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InwardMaterial;
use App\Models\Supplier;
use App\Models\Manufacturer;
use App\Models\Rawmeterial;
use App\Models\Rawmaterialitems;
use App\Models\InwardPackingMaterialItems;
use App\Models\Department;
use App\Models\Issuematerialproduction;
use App\Models\IssualStoresForProduction;
use App\Models\Inwardfinishedgoods;
use App\Models\FinishedGoodsDispatch;
use DB;
use Auth;

class ReportsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:annexure-i-list', ['only' => ['annexure_i']]);
        $this->middleware('permission:annexure-ii-list', ['only' => ['annexure_ii']]);
        $this->middleware('permission:annexure-iii-list', ['only' => ['annexure_iii']]);
        $this->middleware('permission:annexure-iv-list', ['only' => ['annexure_iv']]);
        $this->middleware('permission:packing-annexure-list', ['only' => ['packing_annexure']]);
        $this->middleware('permission:annexure-vi-list', ['only' => ['annexure_vi']]);
        $this->middleware('permission:annexure-vii-list', ['only' => ['annexure_vii']]);

    }
    public function annexure_i()
    {


        $data['inward_material']=Rawmaterialitems::select(
            "inward_raw_materials.*"
            ,"inward_raw_materials_items.*",
            "suppliers.name",
            "manufacturers.manufacturer as man_name",
            "raw_materials.material_name",
            "raw_materials.material_stock",
            "mesurments.mesurment",
            "inward_raw_materials_items.id as itemid")
            ->join("inward_raw_materials","inward_raw_materials.id","inward_raw_materials_items.inward_raw_material_id")
            ->join("suppliers","suppliers.id","inward_raw_materials.supplier")
            ->join("manufacturers","manufacturers.id","inward_raw_materials.manufacturer")
            ->join("raw_materials","raw_materials.id","inward_raw_materials_items.material")
            ->join("mesurments","mesurments.id","raw_materials.material_mesurment")
            ->get();
          return view('reports.annexure_i',$data);
    }
    public function annexure_ii()
    {
        $data['issue_stores']=IssualStoresForProduction::select('issual_by_stores_for_production.*','raw_materials.material_name')
        ->join('raw_materials','raw_materials.id','issual_by_stores_for_production.id')
        ->get();

        return view('reports.annexure_ii',$data);
    }
    public function annexure_iii()
    {
        $data['issue_material']=Issuematerialproduction::select('issue_material_production.*','raw_materials.material_name',"inward_raw_materials_items.batch_no as rbatch","users.name")
        ->join("raw_materials", "raw_materials.id", "=", "issue_material_production.material")
        ->join("inward_raw_materials_items", "inward_raw_materials_items.id", "=", "issue_material_production.batch_no")
        ->join("users", "users.id", "=", "issue_material_production.dispensed_by")

        ->get();

        return view('reports.annexure_iii',$data);

    }
    public function annexure_iv()

    {
        $data['inward_goods']=Inwardfinishedgoods::select("inward_finished_goods.*","raw_materials.material_name","grades.grade","users.name")->join("raw_materials","raw_materials.id","inward_finished_goods.product_name")->join("grades","grades.id","inward_finished_goods.grade")->join("users","users.id","inward_finished_goods.received_by")->get();

        return view('reports.annexure_iv',$data);
    }
    public function packing_annexure()
    {
        $listquery = InwardPackingMaterialItems::select("goods_receipt_notes.*"
        ,"goods_receipt_note_items.*",
        "suppliers.name",
        "manufacturers.manufacturer",
        "users.name as uname",
        "department.department as goods_going_from_name",
        "detpto.department as goods_going_to_name",
        "raw_materials.material_name",
        "goods_receipt_note_items.id as itemid",
        "goods_receipt_notes.id as id")
                    ->join("goods_receipt_notes","goods_receipt_notes.id","goods_receipt_note_items.good_receipt_id")
                     ->join("suppliers","suppliers.id","goods_receipt_notes.supplier")
                     ->join("manufacturers","manufacturers.id","goods_receipt_notes.manufacurer")
                     ->join("raw_materials","raw_materials.id","goods_receipt_note_items.material")
                     ->leftJoin("users","users.id","goods_receipt_notes.created_by")
                     ->join("department", "department.id", "=", "goods_receipt_notes.goods_going_from")
                     ->join("department as detpto", "detpto.id", "=", "goods_receipt_notes.goods_going_to")
                     ->get();

        return view('reports.packing_annexure')->with(["listquery"=>$listquery]);
    }
    public function annexure_vi()
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
            "inward_raw_materials_items.id as itemid"
            )

        ->join('inward_raw_materials','inward_raw_materials.id','=','inward_raw_materials_items.inward_raw_material_id' )
        ->join('raw_materials','raw_materials.id','=','inward_raw_materials_items.material')
        ->join("suppliers","suppliers.id","inward_raw_materials.supplier")
        ->join("manufacturers","manufacturers.id","inward_raw_materials.manufacturer")
        ->leftjoin('quality_controll_check','quality_controll_check.inward_material_item_id','=','inward_raw_materials_items.id' )
        ->orderBy('inward_raw_materials.created_at', 'desc')
       ->get();
        return view('reports.annexure_vi',$data);
    }
    public function annexure_vii()
    {
        $data['finished_good'] = FinishedGoodsDispatch::select(
            'finished_goods_dispatch.*',
            'grades.grade as grades_name',
            'mode_of_dispatch.mode as mode_name',
            "raw_materials.material_name",
            "party_master.company_name",
            "inward_finished_goods.batch_no",
            "users.name"
        )
            ->Join("party_master", "party_master.id", "=", "finished_goods_dispatch.party_name")
            ->Join("grades", "grades.id", "=", "finished_goods_dispatch.grade")
            ->Join("mode_of_dispatch", "mode_of_dispatch.id", "=", "finished_goods_dispatch.mode_of_dispatch")
            ->Join("raw_materials", "raw_materials.id", "=", "finished_goods_dispatch.product")
            ->Join("inward_finished_goods", "inward_finished_goods.id", "=", "finished_goods_dispatch.batch_no")
            ->Join("users","users.id", "=", "finished_goods_dispatch.dispatch_by")
            ->get();

        return view('reports.annexure_vii',$data);
    }

    public function material_report(Request $request)
    {
        $data['inward_material']=Rawmaterialitems::select(
            "inward_raw_materials.*"
            ,"inward_raw_materials_items.*",
            "suppliers.name",
            "manufacturers.manufacturer as man_name",
            "raw_materials.material_name",
            "raw_materials.material_stock",
            "mesurments.mesurment",
            "inward_raw_materials_items.id as itemid")
            ->join("inward_raw_materials","inward_raw_materials.id","inward_raw_materials_items.inward_raw_material_id")
            ->join("suppliers","suppliers.id","inward_raw_materials.supplier")
            ->join("manufacturers","manufacturers.id","inward_raw_materials.manufacturer")
            ->join("raw_materials","raw_materials.id","inward_raw_materials_items.material")
            ->join("mesurments","mesurments.id","raw_materials.material_mesurment")
            ->get();
        return view('reports.material_report',$data);
    }

}
