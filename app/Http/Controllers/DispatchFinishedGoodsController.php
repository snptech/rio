<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Grade;
use App\Models\FinishedGoodsDispatch;
use App\Models\Modedispatch;
use App\Models\Rawmeterial;
use App\Models\Department;
use App\Models\PartyMaster;
use DB;
use Auth;
class DispatchFinishedGoodsController extends Controller
{
    public function dispatch_finished_goods()
    {
        $data['finished_good'] = FinishedGoodsDispatch::select(
            'finished_goods_dispatch.*',
            'grades.grade as grades_name',
            'suppliers.name as suppliers_name',
            'mode_of_dispatch.mode as mode_name'
        )
            ->Join("suppliers", "suppliers.id", "=", "finished_goods_dispatch.dispatch_by")
            ->Join("grades", "grades.id", "=", "finished_goods_dispatch.grade")
            ->Join("mode_of_dispatch", "mode_of_dispatch.id", "=", "finished_goods_dispatch.mode_of_dispatch")
            ->get();

        return view('dispatch_finished_goods', $data);
    }

    public function add_dispatch_finished_goods()
    {
        $data['supplier_master'] = Supplier::all();
        $data['mode'] = Modedispatch::all();
        $data["product"] = Rawmeterial::where("material_type","F")->where("material_preorder_stock",">",0)->pluck("material_name","id");
        $data["department"] = Department::pluck("department","id");
        $data["partyname"] = PartyMaster::pluck("company_name","id");
        $data['grade'] = Grade::all();
        $maxid = FinishedGoodsDispatch::select(DB::Raw("max(dispath_no) as nextid"))->first();

        $nextid =1;
        if($maxid->nextid)
            $nextid = $maxid->nextid+1;
        $data["nextid"] = $nextid;
        return view('add_dispatch_finished_goods', $data);
    }
    public function dispatch_finished_good_insert(Request $request)
    {

        $data = [
            'dispath_no' => $request['dispath_no'],
            'dispatch_form' => $request['dispatch_form'],
            'dispatch_to' => $request['dispatch_to'],
            'good_dispatch_date' => $request['good_dispatch_date'],
            'mode_of_dispatch' => $request['mode_of_dispatch'],
            'party_name' => $request['party_name'],
            'product' => $request['product'],
            'invoice_no' => $request['invoice_no'],
            'batch_no' => $request['batch_no'],
            'grade' => $request['grade'],
            'viscosity' => $request['viscosity'],
            'mfg_date' => $request['mfg_date'],
            'expiry_ratest_date' => $request['expiry_ratest_date'],
            'total_no_of_50kg_drums' => $request['total_no_of_50kg_drums'],
            'total_no_of_30kg_drums' => $request['total_no_of_30kg_drums'],
            'total_no_of_5kg_drums' => $request['total_no_of_5kg_drums'],
            'total_no_qty' => $request['total_no_qty'],
            'seal_no' => $request['seal_no'],
            'dispatch_date' => $request['dispatch_date'],
            'dispatch_by' => $request['dispatch_by'],
            'remark' => $request['remark'],

        ];

        $result = FinishedGoodsDispatch::create($data);

        if ($result) {
            return redirect("dispatch_finished_goods")->with('success', "Data created successfully");
        }
    }

    public function view_dispatch_finished($id)
    {


        $data['finished_good'] = FinishedGoodsDispatch::select(
            'finished_goods_dispatch.*',
            'grades.grade as grades_name',
            'suppliers.name as suppliers_name',
            'mode_of_dispatch.mode as mode_name'
        )
            ->leftJoin("suppliers", "suppliers.id", "=", "finished_goods_dispatch.dispatch_by")
            ->leftJoin("grades", "grades.id", "=", "finished_goods_dispatch.grade")
            ->leftJoin("mode_of_dispatch", "mode_of_dispatch.id", "=", "finished_goods_dispatch.mode_of_dispatch")
            ->where("finished_goods_dispatch.id", $id)->get();
        return view('view_dispatch_finished', $data);
    }
    public function edit_dispatch_finished($id)
    {
        $supplier_master = Supplier::all();
        $mode = Modedispatch::all();
        $grade = Grade::all();
        $finished = FinishedGoodsDispatch::where("id", $id)->first();
        return view("edit_dispatch_finished")->with(["finished" => $finished, "supplier_master" => $supplier_master, "mode" => $mode, "grade" => $grade]);
    }


    public function update_dispatch_finished(Request $request, $id)
    {

        $data = [
            'dispath_no' => $request['dispath_no'],
            'dispatch_form' => $request['dispatch_form'],
            'dispatch_to' => $request['dispatch_to'],
            'good_dispatch_date' => $request['good_dispatch_date'],
            'mode_of_dispatch' => $request['mode_of_dispatch'],
            'party_name' => $request['party_name'],
            'product' => $request['product'],
            'invoice_no' => $request['invoice_no'],
            'batch_no' => $request['batch_no'],
            'grade' => $request['grade'],
            'viscosity' => $request['viscosity'],
            'mfg_date' => $request['mfg_date'],
            'expiry_ratest_date' => $request['expiry_ratest_date'],
            'total_no_of_50kg_drums' => $request['total_no_of_50kg_drums'],
            'total_no_of_30kg_drums' => $request['total_no_of_30kg_drums'],
            'total_no_of_5kg_drums' => $request['total_no_of_5kg_drums'],
            'total_no_qty' => $request['total_no_qty'],
            'seal_no' => $request['seal_no'],
            'dispatch_date' => $request['dispatch_date'],
            'dispatch_by' => $request['dispatch_by'],
            'remark' => $request['remark'],
        ];
        $finished = FinishedGoodsDispatch::select(
            'finished_goods_dispatch.*',
            'grades.grade as grades_name',
            'suppliers.name as suppliers_name',
            'mode_of_dispatch.mode as mode_name',
        )
            ->leftJoin("suppliers", "suppliers.id", "=", "finished_goods_dispatch.dispatch_by")
            ->leftJoin("grades", "grades.id", "=", "finished_goods_dispatch.grade")
            ->leftJoin("mode_of_dispatch", "mode_of_dispatch.id", "=", "finished_goods_dispatch.mode_of_dispatch")
            ->first($id);

        $result = $finished->update($data);
        if ($result) {
            return redirect("dispatch_finished_goods")->with('update', "Data Update successfully");
        }
    }
    public function delete_dispatch_finished($id)
    {

        $finished = FinishedGoodsDispatch::where("id", $id)->delete();
        if ($finished) {

            return redirect("dispatch_finished_goods")->with('danger', "Data deleted successfully");
        }
    }
    public function dispacth_view(Request $request)
    {

        if($request->id)
        {
            $dispacth_view = FinishedGoodsDispatch::select(
                'finished_goods_dispatch.*',
                'grades.grade as grades_name',
                'suppliers.name as suppliers_name',
                'mode_of_dispatch.mode as mode_name'
            )
                ->Join("suppliers", "suppliers.id", "=", "finished_goods_dispatch.dispatch_by")
                ->Join("grades", "grades.id", "=", "finished_goods_dispatch.grade")
                ->Join("mode_of_dispatch", "mode_of_dispatch.id", "=", "finished_goods_dispatch.mode_of_dispatch")

            ->where("finished_goods_dispatch.id",$request->id)->first();
             $view = view('dispacth_view', ['dispacth_view'=> $dispacth_view])->render();
             return response()->json(['html'=>$view]);
            }
            else
            {
                redirect(404);
            }


    }
}
