<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inwardfinishedgoods;
use App\Models\Grade;
use App\Models\Arnomaster;
use App\Models\Supplier;

class InwardFinishedController extends Controller
{
    public function new_stock()
    {
        $data['grade_master']=Grade::all();
        $data['supplier_master']=Supplier::all();
        $data['arno_master']=Arnomaster::all();
        return view('new_stock',$data);
    }
    public function inward_finished_insert(Request $request)
    {

        $data = [
            'inward_date' => $request['inward_date'],
            'product_name' => $request['product_name'],
            'batch_no' => $request['batch_no'],
            'grade' => $request['grade'],
            'viscosity' => $request['viscosity'],
            'mfg_date' => $request['mfg_date'],
            'expiry_ratest_date' => $request['expiry_ratest_date'],
            'total_no_of_200kg_drums' => $request['total_no_of_200kg_drums'],
            'total_no_of_50kg_drums' => $request['total_no_of_50kg_drums'],
            'total_no_of_30kg_drums' => $request['total_no_of_30kg_drums'],
            'total_no_of_5kg_drums' => $request['total_no_of_5kg_drums'],
            'total_no_of_fiber_board_drums' => $request['total_no_of_fiber_board_drums'],
            'total_quantity' => $request['total_quantity'],
            'ar_no' => $request['ar_no'],
            'approval_data' => $request['approval_data'],
            'received_by' => $request['received_by'],
            'remark' => $request['remark'],

        ];

       $result= Inwardfinishedgoods::create($data);

        if($result)
        {
        return redirect("new_stock")->with('success', "Data created successfully");
        }
    }
}
