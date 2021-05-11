<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualitycontroll;

class QualityControlController extends Controller
{
    public function quality_control()
    {
        $data['quality_control']=Qualitycontroll::all();
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
