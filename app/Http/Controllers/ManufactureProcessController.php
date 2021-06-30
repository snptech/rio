<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BatchManufacture;
use App\Models\BillOfRwaMaterial;
use App\Models\BillOfRawMaterialsDetails;
use App\Models\BatchManufacturingPacking;
use App\Models\BatchManufacturingEquipment;
use App\Models\ListOfEquipmentManufacturing;
use App\Models\LineClearance;
use App\Models\Rawmeterial;
use Illuminate\Support\Facades\Auth;
use App\Models\BatchManufacturingRecordsLine;
use App\Models\PackingMaterialSlip;
use App\Models\MaterialDetails;
use App\Models\DetailsRequisition;
use App\Models\RequisitionSlip;
use session;



class ManufactureProcessController extends Controller
{
    public function add_batch_manufacture()
    {
        $data['manufacture'] = BatchManufacture::select('add_batch_manufacture.*', 'raw_materials.material_name')
            ->leftJoin('raw_materials', 'raw_materials.id', '=', 'add_batch_manufacture.proName')
            ->get();

        return view('add_batch_manufacture', $data);
    }
    public function add_batch_manufacturing_record(Request $request)
    {
        $data["product"] = Rawmeterial::where("material_stock", ">", 0)->where("material_type", "F")->pluck("material_name", "id");
        $batch = "";
        if ($request->session()->has('batch')) {
            //
            $batch = $request->session()->get('batch');
        }
        $data["batch"] = $batch;

        return view('add_batch_manufacturing_record', $data);
    }


    public function add_btch_manufacture_view(Request $request)
    {
        if ($request->ajax()) {

            $res = BatchManufacture::select('add_batch_manufacture.*', 'raw_materials.material_name')
                ->join('raw_materials', 'raw_materials.id', '=', 'add_batch_manufacture.proName')
                ->where('add_batch_manufacture.id', $request->id)
                ->first();
        }
        return (['status' => true, 'res' => $res]);
    }

    public function add_manufacturing_insert(Request $request)
    {

        $arrRules = [
            "proName" => "required",
            "bmrNo" => "required",
            "batchNo" => "required|unique:add_batch_manufacture",
            "refMfrNo" => "required",
            "grade" => "required",
            "BatchSize" => "required",
            "Viscosity" => "required",
            "ProductionCommencedon" => "required",
            "ProductionCompletedon" => "required",
            "ManufacturingDate" => "required",
            "RetestDate" => "required",
            "doneBy" => "required",
            "checkedBy" => "required",
            "inlineRadioOptions" => "required",
            "approval" => "required",
            "approvalDate" => "required",
            "checkedByI" => "required",

        ];
        $arrMessages = [
            "proName" => "This :attribute field is required.",
            "bmrNo" => "This :attribute field is required.",
            "batchNo" => "This :attribute field is required.",
            "refMfrNo" => "This :attribute field is required.",
            "grade" => "This :attribute field is required.",
            "BatchSize" => "This :attribute field is required.",
            "Viscosity" => "This :attribute field is required.",
            "ProductionCommencedon" => "This :attribute field is required.",
            "ProductionCompletedon" => "This :attribute field is required.",
            "ManufacturingDate" => "This :attribute field is required.",
            "RetestDate" => "This :attribute field is required.",
            "doneBy" => "This :attribute field is required.",
            "checkedBy" => "This :attribute field is required.",
            "inlineRadioOptions" => "This :attribute field is required.",
            "inlineRadioOptions" => "This :attribute field is required.",
            "approval" => "This :attribute field is required.",
            "approvalDate" => "This :attribute field is required.",
            "checkedBy" => "This :attribute field is required.",
        ];
        // $validated = $request->validate($arrRules,$arrMessages);
        $data = [
            "proName" =>  $request['proName'],
            "bmrNo" =>  $request['bmrNo'],
            "batchNo" =>  $request['batchNo'],
            "refMfrNo" =>  $request['refMfrNo'],
            "grade" =>  $request['grade'],
            "BatchSize" =>  $request['BatchSize'],
            "Viscosity" =>  $request['Viscosity'],
            "ProductionCommencedon" =>  $request['ProductionCommencedon'],
            "ProductionCompletedon" =>  $request['ProductionCompletedon'],
            "ManufacturingDate" =>  $request['ManufacturingDate'],
            "RetestDate" =>  $request['RetestDate'],
            "doneBy" => Auth::user()->id,
            "checkedBy" => Auth::user()->id,
            "inlineRadioOptions" =>  $request['inlineRadioOptions'],
            "approval" =>  Auth::user()->id,
            "approvalDate" =>  $request['approvalDate'],
            "checkedByI" => Auth::user()->id,
            "Remark" =>  $request['Remark'],
            "is_active" => 1,
            "is_delete" => 1,

        ];
        $result = BatchManufacture::create($data);

        if ($result) {
            $request->session()->put('batch', $request['batchNo']);
            return redirect("add-batch-manufacturing-record#billOfRawMaterial")->with('success', "Data created successfully");
        }
    }

    public function add_manufacturing_edit($id)
    {
        $product = Rawmeterial::where("material_stock", ">", 0)->where("material_type", "F")->pluck("material_name", "id");
        $edit_batchmanufacturing = BatchManufacture::select('add_batch_manufacture.*', 'raw_materials.material_name')
            ->join('raw_materials', 'raw_materials.id', '=', 'add_batch_manufacture.proName')
            ->where('add_batch_manufacture.id', '=', $id)->first();
        return view('add_manufacturing_edit', compact('edit_batchmanufacturing', $edit_batchmanufacturing, 'product', $product));
    }
    public function add_manufacturing_update(Request $request)
    {
        $data = [
            "proName" =>  $request['proName'],
            "bmrNo" =>  $request['bmrNo'],
            "batchNo" =>  $request['batchNo'],
            "refMfrNo" =>  $request['refMfrNo'],
            "grade" =>  $request['grade'],
            "BatchSize" =>  $request['BatchSize'],
            "Viscosity" =>  $request['Viscosity'],
            "ProductionCommencedon" =>  $request['ProductionCommencedon'],
            "ProductionCompletedon" =>  $request['ProductionCompletedon'],
            "ManufacturingDate" =>  $request['ManufacturingDate'],
            "RetestDate" =>  $request['RetestDate'],
            "doneBy" =>   Auth::user()->id,
            "checkedBy" =>  Auth::user()->id,
            "inlineRadioOptions" =>  $request['inlineRadioOptions'],
            "approval" =>  $request['approval'],
            "approvalDate" =>  $request['approvalDate'],
            "checkedByI" => Auth::user()->id,
            "Remark" =>  $request['Remark'],
            "is_active" => 1,
            "is_delete" => 1,

        ];
        $result = BatchManufacture::where('id', $request->id)->update($data);

        if ($result) {
            return redirect("add-batch-manufacturing-record")->with('success', " Batch  Data Update successfully");
        }
    }

    public function add_btch_manufacture_delete($id)
    {
        $result = BatchManufacture::where('id', $id)->delete();
        if ($result) {
            return redirect("add-batch-manufacture")->with('danger', "Data deleted successfully");
        }
    }
    public function bill_of_raw_material()
    {
        $data['bill_material'] = BillOfRwaMaterial::select('bill_of_raw_material.*', 'raw_materials.material_name')
            ->join('raw_materials', 'raw_materials.id', '=', 'bill_of_raw_material.id')
            ->where('bill_of_raw_material.is_delete', 1)
            ->get();
        return view('bill_of_raw_material', $data);
    }
    public function add_batch_manufacturing_record_bill()
    {
        return view('add_batch_manufacturing_record_bill');
    }
    public function add_batch_manufacturing_recorde_insert(Request $request)
    {
        $arrRules = [
            "proName" => "required",
            "bmrNo" => "required",
            "batchNoI" => "required",
            "refMfrNo" => "required",
            "rawMaterialName" => "required",
            "batchNo" => "required",
            "Quantity" => "required",
            "arNo" => "required",
            "date" => "required",
            "doneBy" => "required",
            "checkedBy" => "required",
        ];
        $arrMessages = [
            "proName" => "This :attribute field is required.",
            "bmrNo" => "This :attribute field is required.",
            "batchNoI" => "This :attribute field is required.",
            "refMfrNo" => "This :attribute field is required.",
            "rawMaterialName" => "This :attribute field is required.",
            "batchNo" => "This :attribute field is required.",
            "Quantity" => "This :attribute field is required.",
            "arNo" => "This :attribute field is required.",
            "date" => "This :attribute field is required.",
            "doneBy" => "This :attribute field is required.",
            "checkedBy" => "This :attribute field is required.",

        ];

        $validateData = $request->validate($arrRules, $arrMessages);

        $arr['proName'] = $request->proName;
        $arr['bmrNo'] = $request->bmrNo;
        $arr['batchNoI'] = $request->batchNoI;
        $arr['refMfrNo'] = $request->refMfrNo;
        $order_number = date('dyHs');
        $arr['order_id'] = $order_number;
        $arr['doneBy'] = $request->doneBy;
        $arr['checkedBy'] = Auth::user()->id;
        $arr['Remark'] = $request->Remark;
        $arr['is_active'] = 1;
        $arr['is_delete'] = 1;
        $BillOfRwaMaterial_id = BillOfRwaMaterial::Create($arr);
        if ($BillOfRwaMaterial_id->id) {
            foreach ($request->rawMaterialName as $key => $value) {
                $arr_data['rawMaterialName'] = $value;
                $arr_data['batchNo'] = $request->batchNo[$key];
                $arr_data['Quantity'] = $request->Quantity[$key];
                $arr_data['arNo'] = $request->arNo[$key];
                $arr_data['date'] = $request->date[$key];
                $arr_data['bill_of_raw_material_id'] = $BillOfRwaMaterial_id->id;
                BillOfRawMaterialsDetails::Create($arr_data);
            }
            return redirect('add-batch-manufacturing-record')->with('success', "Data Bill Of Raw Materrila successfully");
        } else {
            return redirect('add-batch-manufacturing-record')->with('error', "Something went wrong");
        }
    }
    public function bill_of_raw_material_edit($id)
    {

        $res_data = BillOfRwaMaterial::where('id', '=', $id)->first();
        $res = BillOfRawMaterialsDetails::where('bill_of_raw_material_id', '=', $id)->get();
        return view('bill_of_raw_material_edit', compact('res_data', $res_data, 'res', $res));
    }
    public function bill_of_raw_material_update(Request $request)
    {
        $arr['proName'] = $request->proName;
        $arr['bmrNo'] = $request->bmrNo;
        $arr['batchNoI'] = $request->batchNoI;
        $arr['refMfrNo'] = $request->refMfrNo;
        $order_number = date('dyHs');
        $arr['order_id'] = $order_number;
        $arr['doneBy'] = $request->doneBy;
        $arr['checkedBy'] = Auth::user()->id;
        $arr['Remark'] = $request->Remark;
        $arr['is_active'] = 1;
        $arr['is_delete'] = 1;

        $BillOfRwaMaterial_id = BillOfRwaMaterial::where('id', $request->id)->update($arr);

        if ((isset($request->id)) && ($request->id > 0)) {

            if (count($request->rawMaterialName)) {
                BillOfRawMaterialsDetails::where('bill_of_raw_material_id', $request->id)->delete();
                foreach ($request->rawMaterialName as $key => $value) {
                    $arr_data['rawMaterialName'] = $value;
                    $arr_data['batchNo'] = $request->batchNo[$key];
                    $arr_data['Quantity'] = $request->Quantity[$key];
                    $arr_data['arNo'] = $request->arNo[$key];
                    $arr_data['date'] = $request->date[$key];
                    $arr_data['bill_of_raw_material_id'] = $request->id;
                    BillOfRawMaterialsDetails::Create($arr_data);
                }

                return redirect('bill-of-raw-material')->with('success', "Data update successfully");
            }
            return redirect('bill-of-raw-material')->with('error', "Invalid Data");
        } else {
            return redirect('bill-of-raw-material')->with('error', "Something went wrong");
        }
    }
    public function bill_of_raw_m_view(Request $request)
    {
        if ($request->ajax()) {

            $res_data = BillOfRwaMaterial::select(
                'bill_of_raw_material.*',
            )
                ->where('bill_of_raw_material.id', $request->id)
                ->first();
            $res = BillOfRwaMaterial::select(
                'bill_of_raw_material.*',
                'bill_of_raw_material_details.*'
            )
                ->join('bill_of_raw_material_details', 'bill_of_raw_material_details.bill_of_raw_material_id', '=', 'bill_of_raw_material.id')
                ->where('bill_of_raw_material_details.bill_of_raw_material_id', $request->id)
                ->get();
        }

        return (['status' => true, 'res' => $res, 'res_data' => $res_data]);
    }
    public function bill_of_raw_material_delete($id)
    {
        $data = BillOfRwaMaterial::where('id', $id)->delete();
        if ($data) {
            return redirect('bill-of-raw-material')->with('danger', "Data Deleted successfully");
        }
    }

    public function packing_detail()
    {
        $data['packing_detail'] = BatchManufacturingPacking::select('batch_manufacturing_records_packing.*', 'raw_materials.material_name')
            ->join('raw_materials', 'raw_materials.id', '=', 'batch_manufacturing_records_packing.id')
            ->get();
        return view('packing_detail', $data);
    }
    public function add_manufacturing_record_Packing()
    {
        return view('add_manufacturing_record_Packing');
    }
    public function add_manufacturing_packing_insert(Request $request)
    {
        $arrRules = [
            "proName" => "required.",
            "bmrNo" => "required.",
            "batchNo" => "required",
            "refMfrNo" => "required",
            "ManufacturerDate" => "required",
            "Observation" => "required",
            "Temperature" => "required",
            "Humidity" => "required",
            "TemperatureP" => "required",
            "50kgDrums" => "required",
            "20kgDrums" => "required",
            "startTime" => "required",
            "EndstartTime" => "required",
            "areaCleanliness" => "required",
            "CareaCleanliness" => "required",
            "rmInput" => "required",
            "fgOutput" => "required",
            "filledDrums" => "required",
            "excessFilledDrums" => "required",
            "qcsampling" => "required",
            "StabilitySample" => "required",
            "WorkingSlandered" => "required",
            "ValidationSample" => "required",
            "CustomerSample" => "required",
            "ActualYield" => "required",
            "checkedBy" => "required",
            "ApprovedBy" => "required",
            "Remark" => "required",

        ];
        $arrMessages = [
            "proName" => "This :attribute field is required.",
            "bmrNo" => "This :attribute field is required.",
            "batchNo" => "This :attribute field is required.",
            "refMfrNo" => "This :attribute field is required.",
            "ManufacturerDate" => "This :attribute field is required.",
            "Observation" => "This :attribute field is required.",
            "Temperature" => "This :attribute field is required.",
            "Humidity" => "This :attribute field is required.",
            "TemperatureP" => "This :attribute field is required.",
            "50kgDrums" => "This :attribute field is required.",
            "20kgDrums" => "This :attribute field is required.",
            "startTime" => "This :attribute field is required.",
            "EndstartTime" => "This :attribute field is required.",
            "areaCleanliness" => "This :attribute field is required.",
            "CareaCleanliness" => "This :attribute field is required.",
            "rmInput" => "This :attribute field is required.",
            "fgOutput" => "This :attribute field is required.",
            "filledDrums" => "This :attribute field is required.",
            "excessFilledDrums" => "This :attribute field is required.",
            "qcsampling" => "This :attribute field is required.",
            "StabilitySample" => "This :attribute field is required.",
            "WorkingSlandered" => "This :attribute field is required.",
            "ValidationSample" => "This :attribute field is required.",
            "CustomerSample" => "This :attribute field is required.",
            "ActualYield" => "This :attribute field is required.",
            "checkedBy" => "This :attribute field is required.",
            "ApprovedBy" => "This :attribute field is required.",
            "Remark" => "This :attribute field is required.",
        ];
        // $validated = $request->validate($arrRules, $arrMessages);
        $data = [
            "proName" => $request['proName'],
            "bmrNo" => $request['bmrNo'],
            "batchNo" => $request['batchNo'],
            "refMfrNo" => $request['refMfrNo'],
            "ManufacturerDate" => $request['ManufacturerDate'],
            "Observation" => $request['Observation'],
            "Temperature" => $request['Temperature'],
            "Humidity" => $request['Humidity'],
            "TemperatureP" => $request['TemperatureP'],
            "50kgDrums" => $request['50kgDrums'],
            "20kgDrums" => $request['20kgDrums'],
            "startTime" => $request['startTime'],
            "EndstartTime" => $request['EndstartTime'],
            "areaCleanliness" => Auth::user()->id,
            "CareaCleanliness" => Auth::user()->id,
            "rmInput" => $request['rmInput'],
            "fgOutput" => $request['fgOutput'],
            "filledDrums" => $request['filledDrums'],
            "excessFilledDrums" => $request['excessFilledDrums'],
            "qcsampling" => $request['qcsampling'],
            "StabilitySample" => $request['StabilitySample'],
            "WorkingSlandered" => $request['WorkingSlandered'],
            "ValidationSample" => $request['ValidationSample'],
            "CustomerSample" => $request['CustomerSample'],
            "ActualYield" => $request['ActualYield'],
            "checkedBy" => Auth::user()->id,
            "ApprovedBy" => Auth::user()->id,
            "Remark" => $request['Remark'],

        ];
        $result = BatchManufacturingPacking::create($data);

        if ($result) {

            return redirect("add-batch-manufacturing-record")->with('success', "Data Batch Manufacturing Packing successfully");
        }
    }

    public function list_of_equipment()
    {
        $data['list_equipment'] = BatchManufacturingEquipment::select('batch_manufacturing_records_list_of_equipment.*', 'raw_materials.material_name')
            ->join('raw_materials', 'raw_materials.id', '=', 'batch_manufacturing_records_list_of_equipment.id')
            ->get();
        return view('list_of_equipment', $data);
    }
    public function add_batch_list_of_equipment()
    {
        return view('add_batch_list_of_equipment');
    }
    public function add_batch_equipment_insert(Request $request)
    {


        $arrRules = [
            "proName" => "required.",
            "bmrNo" => "required.",
            "batchNo" => "required",
            "refMfrNo" => "required",
            "EquipmentName" => "required",
            "EquipmentCode" => "required",
        ];
        $arrMessages = [
            "proName" => "This :attribute field is required.",
            "bmrNo" => "This :attribute field is required.",
            "batchNo" => "This :attribute field is required.",
            "refMfrNo" => "This :attribute field is required.",
            "EquipmentName" => "This :attribute field is required.",
            "EquipmentCode" => "This :attribute field is required.",
        ];
        // $validated = $request->validate($arrRules, $arrMessages);
        $arr['proName'] = $request->proName;
        $order_number = date('dyHs');
        $arr['order_id'] = $order_number;
        $arr['bmrNo'] = $request->bmrNo;
        $arr['batchNo'] = $request->batchNo;
        $arr['refMfrNo'] = $request->refMfrNo;
        $arr['Remark'] = $request->Remark;
        $BatchManufacturing_id = BatchManufacturingEquipment::Create($arr);
        if ($BatchManufacturing_id->id) {
            foreach ($request->EquipmentName as $key => $value) {
                $a_data['EquipmentName'] = $value;
                $a_data['EquipmentCode'] = $request->EquipmentCode[$key];
                $a_data['batch_manufacturing_id'] = $BatchManufacturing_id->id;
                ListOfEquipmentManufacturing::Create($a_data);
            }


            return redirect("add-batch-manufacturing-record")->with('success', "Data List Of Equipment Successfully");
        } else {
            return redirect("add-batch-manufacturing-record")->with('error', " Something went wrong");
        }
    }

    public function list_of_equipment_edit($id)
    {
        $res = ListOfEquipmentManufacturing::where('batch_manufacturing_id', '=', $id)
            ->get();
        $res_data = BatchManufacturingEquipment::where('id', '=', $id)
            ->first();

        return view('list_of_equipment_edit', compact('res', $res, 'res_data', $res_data));
    }
    public function list_of_equipment_delete($id)
    {
        $data = BatchManufacturingEquipment::where('id', $id)->delete();
        if ($data) {
            return redirect('list-of-equipment')->with('danger', "Data Deleted successfully");
        }
    }

    public function list_of_equipment_update(Request $request)
    {
        $arr['proName'] = $request->proName;
        $order_number = date('dyHs');
        $arr['order_id'] = $order_number;
        $arr['bmrNo'] = $request->bmrNo;
        $arr['batchNo'] = $request->batchNo;
        $arr['refMfrNo'] = $request->refMfrNo;
        $arr['Remark'] = $request->Remark;
        $BatchManufacturing_id = BatchManufacturingEquipment::where('id', $request->id)->update($arr);

        if ((isset($request->id)) && ($request->id > 0)) {

            if (count($request->EquipmentName)) {
                ListOfEquipmentManufacturing::where('batch_manufacturing_id', $request->id)->delete();
                foreach ($request->EquipmentName as $key => $value) {
                    $arr_data['EquipmentName'] = $value;
                    $arr_data['EquipmentCode'] = $request->EquipmentCode[$key];
                    $arr_data['batch_manufacturing_id'] = $request->id;
                    ListOfEquipmentManufacturing::Create($arr_data);
                }
                return redirect('list-of-equipment')->with('message', "Data update successfully");
            }
            return redirect('list-of-equipment')->with('error', "Invalid Data");
        } else {
            return redirect('list-of-equipment')->with('error', "Something went wrong");
        }
    }


    public function list_of_equipment_view(Request $request)
    {
        if ($request->ajax()) {

            $res = ListOfEquipmentManufacturing::select(
                'list_of_equipment_in_manufacturin_process.*'
            )
                ->where('list_of_equipment_in_manufacturin_process.batch_manufacturing_id', $request->id)
                ->get();
            $res_data = BatchManufacturingEquipment::select(
                'batch_manufacturing_records_list_of_equipment.*',
            )
                ->where('batch_manufacturing_records_list_of_equipment.id', $request->id)
                ->first();
        }

        return (['status' => true, 'res' => $res, 'res_data' => $res_data]);
    }
    public function line_clearance()
    {
        $data['BatchManufacturing'] = BatchManufacturingRecordsLine::select('batch_manufacturing_records_line_clearance_record.*', 'raw_materials.material_name')
            ->join('raw_materials', 'raw_materials.id', '=', 'batch_manufacturing_records_line_clearance_record.id')
            ->get();
        return view('line_clearance', $data);
    }
    public function add_line_clearance_record()
    {
        return view('add_line_clearance_record');
    }

    public function add_line_clearance_insert(Request $request)
    {
        $arrRules = [
            "proName" => "required.",
            "bmrNo" => "required.",
            "batchNo" => "required",
            "refMfrNo" => "required",
            "Date" => "required",
            "EquipmentName" => "required",
            "Observation" => "required",
            "time" => "required",
        ];
        $arrMessages = [
            "proName" => "This :attribute field is required.",
            "bmrNo" => "This :attribute field is required.",
            "batchNo" => "This :attribute field is required.",
            "refMfrNo" => "This :attribute field is required.",
            "Date" => "This :attribute field is required.",
            "EquipmentName" => "This :attribute field is required.",
            "Observation" => "This :attribute field is required.",
            "time" => "This :attribute field is required.",
        ];
        // $validated = $request->validate($arrRules, $arrMessages);
        $arr['proName'] = $request->proName;
        $arr['bmrNo'] = $request->bmrNo;
        $order_number = date('dyHs');
        $arr['order_id'] = $order_number;
        $arr['batchNo'] = $request->batchNo;
        $arr['refMfrNo'] = $request->refMfrNo;
        $arr['Date'] = $request->Date;
        $arr['Remark'] = $request->Remark;
        $BatchManufacturing_id = BatchManufacturingRecordsLine::Create($arr);
        if ($BatchManufacturing_id->id) {
            foreach ($request->EquipmentName as $key => $value) {
                $arr_data['EquipmentName'] = $value;
                $arr_data['Observation'] = $request->Observation[$key];
                $arr_data['time'] = $request->time[$key];
                $arr_data['line_clearance_id'] = $BatchManufacturing_id->id;
                LineClearance::Create($arr_data);
            }
            return redirect('add-batch-manufacturing-record')->with('success', "Data Line Clearance successfully");
        } else {
            return redirect('add-batch-manufacturing-record')->with('error', " Something went wrong");
        }
    }
    public function line_clearance_edit($id)
    {

        $res = LineClearance::where('line_clearance_id', '=', $id)
            ->get();
        $res_data = BatchManufacturingRecordsLine::where('id', '=', $id)
            ->first();

        return view('line_clearance_edit', compact('res', $res, 'res_data', $res_data));
    }
    public function line_clearance_update(Request $request)
    {

        $arr['proName'] = $request->proName;
        $arr['bmrNo'] = $request->bmrNo;
        $order_number = date('dyHs');
        $arr['order_id'] = $order_number;
        $arr['batchNo'] = $request->batchNo;
        $arr['refMfrNo'] = $request->refMfrNo;
        $arr['Date'] = $request->Date;
        $arr['Remark'] = $request->Remark;
        $BatchManufacturing_id = BatchManufacturingRecordsLine::where('id', $request->id)->update($arr);

        if ((isset($request->id)) && ($request->id > 0)) {

            if (count($request->EquipmentName)) {
                LineClearance::where('line_clearance_id', $request->id)->delete();
                foreach ($request->EquipmentName as $key => $value) {
                    $arr_data['EquipmentName'] = $value;
                    $arr_data['Observation'] = $request->Observation[$key];
                    $arr_data['time'] = $request->time[$key];
                    $arr_data['line_clearance_id'] = $request->id;
                    LineClearance::Create($arr_data);
                }
                return redirect('line-clearance')->with('message', "Data update successfully");
            }
            return redirect('line-clearance')->with('error', "Invalid Data");
        } else {
            return redirect('line-clearance')->with('error', "Something went wrong");
        }
    }

    public function line_clearance_view(Request $request)
    {
        if ($request->ajax()) {

            $res = BatchManufacturingRecordsLine::select(
                'batch_manufacturing_records_line_clearance_record.*',
                'line_clearance_record.*'
            )
                ->join('line_clearance_record', 'line_clearance_record.line_clearance_id', '=', 'batch_manufacturing_records_line_clearance_record.id')
                ->where('line_clearance_record.line_clearance_id', $request->id)
                ->get();
            $res_data = BatchManufacturingRecordsLine::select(
                'batch_manufacturing_records_line_clearance_record.*',
                'line_clearance_record.*'
            )
                ->join('line_clearance_record', 'line_clearance_record.line_clearance_id', '=', 'batch_manufacturing_records_line_clearance_record.id')
                ->where('line_clearance_record.line_clearance_id', $request->id)
                ->first();
        }

        return (['status' => true, 'res' => $res, 'res_data' => $res_data]);
    }

    public function generate_label()

    {
        return view('generate_label');
    }
    public function add_manufacturing_record_label()

    {
        return view('add_manufacturing_record_label');
    }
    public function add_lots()

    {
        return view('add_lots');
    }
    public function add_batch_manufacturing_record_add_lot()

    {
        return view('add_batch_manufacturing_record_add_lot');
    }
    public function add_batch_manufacturing_record_add_lot2()

    {
        return view('add_batch_manufacturing_record_add_lot2');
    }
    public function add_batch_manufacturing_record_add_lot3()

    {
        return view('add_batch_manufacturing_record_add_lot3');
    }
    public function add_batch_manufacturing_record_add_lot4()

    {
        return view('add_batch_manufacturing_record_add_lot4');
    }
    public function add_batch_manufacturing_record_add_lot5()

    {
        return view('add_batch_manufacturing_record_add_lot5');
    }
    public function add_batch_manufacturing_record_process_chec_5()

    {
        return view('add_batch_manufacturing_record_process_chec_5');
    }
    public function add_packing_material_issual_slip()
    {
        return view('add_packing_material_issual_slip');
    }
    public function packing_material_issuel_insert(Request $request)
    {
        $arrRules = [
            "from" => "required",
            "to" => "required",
            "batchNo" => "required",
            "Date" => "required",
            "PackingMaterialName" => "required",
            "Capacity" => "required",
            "Quantity" => "required",
            "arNo" => "required",
            "ARDate" => "required",
            "doneBy" => "required",
            "checkedBy" => "required",
        ];
        $arrMessages = [
            "from" => "This :attribute field is required.",
            "to" => "This :attribute field is required.",
            "batchNo" => "This :attribute field is required.",
            "Date" => "This :attribute field is required.",
            "PackingMaterialName" => "This :attribute field is required.",
            "Capacity" => "This :attribute field is required.",
            "Quantity" => "This :attribute field is required.",
            "arNo" => "This :attribute field is required.",
            "ARDate" => "This :attribute field is required.",
            "doneBy" => "This :attribute field is required.",
            "checkedBy" => "This :attribute field is required.",
        ];
        // $validated = $request->validate($arrRules, $arrMessages);
        $arr['from'] = $request->from;
        $order_number = date('dyHs');
        $arr['order_id'] = $order_number;
        $arr['to'] = $request->to;
        $arr['batchNo'] = $request->batchNo;
        $arr['Date'] = $request->Date;
        $arr['doneBy'] = $request->doneBy;
        $arr['checkedBy'] = $request->checkedBy;
        $packingmaterial_id = PackingMaterialSlip::Create($arr);
        if ($packingmaterial_id->id) {
            foreach ($request->PackingMaterialName as $key => $value) {
                $a_data['PackingMaterialName'] = $value;
                $a_data['Capacity'] = $request->Capacity[$key];
                $a_data['Quantity'] = $request->Quantity[$key];
                $a_data['arNo'] = $request->arNo[$key];
                $a_data['ARDate'] = $request->ARDate[$key];
                $a_data['packingmaterial_id'] = $packingmaterial_id->id;
                MaterialDetails::Create($a_data);
            }
            return redirect("add-batch-manufacturing-record")->with('success', "Packing Material Successfully");
        } else {
            return redirect("add-batch-manufacturing-record")->with('error', " Something went wrong");
        }
    }
    public function packing_material_requisition_slip_insert(Request $request)
    {

        $arrRules = [
            "from" => "required",
            "from" => "required",
            "to" => "required",
            "batchNo" => "required",
            "Date" => "required",
            "checkedBy" => "required",
            "ApprovedBy" => "required",
            "Remark" => "required",
            "PackingMaterialName" => "required",
            "Capacity" => "required",
            "Quantity" => "required",
            "requisition_id" => "required",
        ];
        $arrMessages = [

            "from" => "This :attribute field is required.",
            "from" => "This :attribute field is required.",
            "to" => "This :attribute field is required.",
            "batchNo" => "This :attribute field is required.",
            "Date" => "This :attribute field is required.",
            "checkedBy" => "This :attribute field is required.",
            "ApprovedBy" => "This :attribute field is required.",
            "Remark" => "This :attribute field is required.",
            "PackingMaterialName" => "This :attribute field is required.",
            "Capacity" => "This :attribute field is required.",
            "Quantity" => "This :attribute field is required.",
            "requisition_id" => "This :attribute field is required.",
        ];
        //$validateData = $request->validate($arrRules, $arrMessages);

        $arr['from'] = $request->from;
        $arr['to'] = $request->to;
        $arr['batchNo'] = $request->batchNo;
        $arr['Date'] = $request->Date;
        $order_number = date('dyHs');
        $arr['order_id'] = $order_number;
        $arr['checkedBy'] =  Auth::user()->id;
        $arr['ApprovedBy'] =  Auth::user()->id;
        $arr['Remark'] = $request->Remark;

        $RequisitionSlip_id = RequisitionSlip::Create($arr);

        if ($RequisitionSlip_id->id) {
            foreach ($request->PackingMaterialName as $key => $value) {
                $arr_data['PackingMaterialName'] = $value;
                $arr_data['Capacity'] = $request->Capacity[$key];
                $arr_data['Quantity'] = $request->Quantity[$key];
                $arr_data['requisition_id'] = $RequisitionSlip_id->id;
                DetailsRequisition::Create($arr_data);
            }
            return redirect('add-batch-manufacturing-record')->with('success', "Raw Materrila Of Requisition successfully");
        } else {
            return redirect('add-batch-manufacturing-record')->with('error', "Something went wrong");
        }
    }
}
