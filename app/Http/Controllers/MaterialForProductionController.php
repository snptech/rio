<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Issuematerialproduction;

class MaterialForProductionController extends Controller
{
    public function issue_material_for_production()
    {
        $data['supplier_master']=Supplier::all();
        return view('admin.issue_material_for_production',$data);
    }
    public function issue_material_insert(Request $request)
    {

        $data = [
         'requisition_no'=> $request['requisition_no'],
        'material'=> $request['material'],
        'opening_bal'=> $request['opening_bal'],
        'batch_no'=> $request['batch_no'],
        'viscosity'=> $request['viscosity'],
        'issual_date'=> $request['issual_date'],
        'issued_quantity'=> $request['issued_quantity'],
        'finished_batch_no'=> $request['finished_batch_no'],
        'excess'=> $request['excess'],
        'wastage'=> $request['wastage'],
        'returned_from_day_store'=> $request['returned_from_day_store'],
        'closing_balance_qty'=> $request['closing_balance_qty'],
        'dispensed_by'=> $request['dispensed_by'],
        'remark'=> $request['remark'],
        ];
        $result= Issuematerialproduction::create($data);
        if($result)
        {
        return redirect("issue_material_for_production")->with('success', "Data created successfully");
        }
    }
}
