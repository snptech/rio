@extends("layouts.app")
@section("title","Add batch Manufacture")
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Batch Manufacturing Records</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>

                @endif
                @if ($message = Session::get('danger'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('update'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <ul class="nav nav-tabs" role="tablist">
                    <li><a role="tab" data-toggle="tab" href="#batch" class="active">Batch</a></li>
                    <li class="dropdown"><a role="tab" class="dropdown-toggle" data-toggle="dropdown" href="#">Raw Material<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a role="tab" data-toggle="tab" href="#billOfRawMaterial">Bill of Raw Material</a></li>
                            <li><a role="tab" data-toggle="tab" href="#requisition">Requisition</a></li>
                            <li><a role="tab" data-toggle="tab" href="#issualofrequisition">Issual of requisition</a></li>
                        </ul>
                    </li>
                    <li><a role="tab" data-toggle="tab" href="#listOfEquipment">List of Equipment</a></li>
                    <li><a role="tab" data-toggle="tab" href="#lineClearance">Line Clearance</a></li>
                    <li><a role="tab" data-toggle="tab" href="#addLots">Add Lots</a></li>
                    <li><a data-toggle="tab" href="#Packing">Packing</a></li>
                </ul>
                <div class="tab-content">
                    <div id="batch" class="tab-pane fade in active show">
                        <form id="add_manufacturing" method="post" action="{{ route('add_manufacturing_insert') }}">
                            @csrf

                            <div class="form-row">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="proName" class="active">Product Name</label>
                                        <!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)"> -->

                                        <select class="form-control" name="proName" id="proName">
                                        <option> Choose Product Name</option>
                                        @foreach ($product as $temp)
                                        <option value="{{$temp->id}}">{{$temp->material_name}}</option>

                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="bmrNo" class="active">BMR No.</label>
                                        <input type="text" class="form-control" name="bmrNo" id="bmrNo" placeholder="BMR No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="batchNo">Batch No.</label>
                                        <input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Batch No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="refMfrNo">Ref. MFR No.</label>
                                        <input type="text" class="form-control" name="refMfrNo" id="refMfrNo" placeholder="Ref. MFR No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="grade" class="active">Grade</label>
                                        <input type="text" class="form-control" name="grade" id="grade" placeholder="Grade">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="BatchSize" class="active">Batch Size</label>
                                        <input type="text" class="form-control" name="BatchSize" id="BatchSize" placeholder="batch size">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="Viscosity" class="active">Viscosity</label>
                                        <input type="text" class="form-control" name="Viscosity" id="Viscosity" placeholder="Viscosity">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6"> &nbsp; </div>

                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="ProductionCommencedon" class="active">Production Commenced on</label>
                                        <input type="date" class="form-control" name="ProductionCommencedon" id="ProductionCommencedon" value={{ date("Y-m-d") }}>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="ProductionCompletedon" class="active">Production Completed on</label>
                                        <input type="date" class="form-control" name="ProductionCompletedon" id="ProductionCompletedon" placeholder="" value={{ date("Y-m-d") }}>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="ManufacturingDate" class="active">Manufacturing Date</label>
                                        <input type="date" class="form-control" name="ManufacturingDate" id="ManufacturingDate" placeholder="" value={{ date("Y-m-d") }}>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="RetestDate" class="active">Retest Date</label>
                                        <input type="date" class="form-control" name="RetestDate" id="RetestDate" placeholder="" value={{ date("Y-m-d") }}>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="doneBy">Prepared by</label>
                                        <input class="form-control" type="text" name="doneBy" id="doneBy" value="{{ \Auth::user()->name }}" readonly>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="checkedBy">Checked by</label>
                                        <input class="form-control" type="text" name="checkedBy" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>
                                    </div>
                                </div>


                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="checkedByI">Reviewed and Approved by</label>
                                        <input type="text" class="form-control select" name="checkedByI" id="checkedByI" value="{{ \Auth::user()->name }}" readonly>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label for="approval" class="active">This Batch is approved/not approved</label>
                                        <select class="form-control select" name="approval"  id="approval">
                                            <option>-- Select Option --</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Not Approved">Not Approved</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="Remark" class="active">Note / Remark</label>
                                        <textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="billOfRawMaterial" class="tab-pane fade">
                        <form id="add_batch_manufacturing_bill" method="post" action="{{ route('add_batch_manufacturing_recorde_insert') }}">
                            @csrf

                            <div class="form-row">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="proName" class="active">Product Name</label>
                                        <!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)">
                                   -->
                                        {{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","placeholder"=>"Choose Product Name")) }}

                                        @if ($errors->has('proName'))
                                        <span class="text-danger">{{ $errors->first('proName') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="bmrNo" class="active">BMR No.</label>
                                        <input type="text" class="form-control" name="bmrNo" id="bmrNo" placeholder="BMR No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="batchNoI">Batch No.</label>
                                        <input type="text" class="form-control" name="batchNoI" id="batchNoI" placeholder="Batch No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="refMfrNo">Ref. MFR No.</label>
                                        <input type="text" class="form-control" name="refMfrNo" id="refMfrNo" placeholder="Ref. MFR No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group input_fields_wrap" id="MaterialReceived">
                                        <label class="control-label d-flex">Bill of Raw Material Details and Weighing Record
                                            <div class="input-group-btn">
                                                <button class="btn btn-dark add-more add_field_button waves-effect waves-light" type="button">Add More +</button>
                                            </div>
                                        </label>
                                        <div class="row add-more-wrap after-add-more m-0 mb-4">
                                            <!-- <span class="add-count">1</span> -->
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="rawMaterialName" class="active">Raw Material</label>
                                                    <select class="form-control select" name="rawMaterialName[]" id="rawMaterialName">
                                                        <option>Select</option>
                                                        <option>Material Name</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="batchNo" class="active">Batch No.</label>
                                                    <select class="form-control select" name="batchNo[]" id="batchNo">
                                                        <option>Select</option>
                                                        <option>RFLX</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="Quantity" class="active">Quantity (Kg.)</label>
                                                    <input type="text" class="form-control" name="Quantity[]" id="Quantity" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="arNo" class="active">AR No.</label>
                                                    <input type="text" class="form-control" name="arNo[]" id="arNo" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="date" class="active">Date</label>
                                                    <input type="date" class="form-control calendar" name="date[]" id="date" value={{ date("Y-m-d") }}>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="doneBy">Weighed by</label>
                                        <input type="text" class="form-control select" name="doneBy" value="{{ \Auth::user()->name }}" id="doneBy" readonly>
                                        <!-- <option>Select</option>
                                            <option>Employee Name</option>
                                        </select> -->
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="checkedBy">Checked by</label>
                                        <input type="text" class="form-control select" name="checkedBy" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="Remark" class="active">Note / Remark</label>
                                        <textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="listOfEquipment" class="tab-pane fade">
                        <form id="add_batch_equipment_vali" method="post" action="{{ route('add_batch_equipment_insert') }}">
                            @csrf

                            <div class="form-row">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="proName" class="active">Product Name</label>
                                        <!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)">
                                   -->
                                        {{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","placeholder"=>"Choose Product Name")) }}
                                        @if ($errors->has('proName'))
                                        <span class="text-danger">{{ $errors->first('proName') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="bmrNo" class="active">BMR No.</label>
                                        <input type="text" class="form-control" name="bmrNo" id="bmrNo" placeholder="BMR No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="batchNo">Batch No.</label>
                                        <input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Batch No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="refMfrNo">Ref. MFR No.</label>
                                        <input type="text" class="form-control" name="refMfrNo" id="refMfrNo" placeholder="Ref. MFR No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="Remark" class="active">Note / Remark</label>
                                        <textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group input_fields_wrap_1" id="MaterialReceived">
                                        <label class="control-label d-flex">List of Equipment in Manufacturing Process
                                            <div class="input-group-btn">
                                                <button class="btn btn-dark add-more add_field_button_1 waves-effect waves-light" type="button">Add More +</button>
                                            </div>
                                        </label>
                                        <div class="row add-more-wrap after-add-more m-0 mb-4">
                                            <!-- <span class="add-count">1</span> -->
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="EquipmentName" class="active">Equipment Name</label>
                                                    <select class="form-control select" name="EquipmentName[]" id="EquipmentName">
                                                        <option>Select</option>
                                                        <option>SS Reactor</option>
                                                        <option>SS Homogenising Tank</option>
                                                        <option>Filling Station</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="EquipmentCode" class="active">Equipment Code</label>
                                                    <select class="form-control select" name="EquipmentCode[]" id="EquipmentCode">
                                                        <option>Select</option>
                                                        <option>PR/RC/001</option>
                                                        <option>PR/RC/002</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="lineClearance" class="tab-pane fade">
                        <form id="add_manufacturing_line" method="post" action="{{ route('add_line_clearance_insert') }}">
                            @csrf

                            <div class="form-row">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="proName" class="active">Product Name</label>
                                        <!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)"> -->
                                        {{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","placeholder"=>"Choose Product Name")) }}
                                        @if ($errors->has('proName'))
                                        <span class="text-danger">{{ $errors->first('proName') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">

                                    <div class="form-group">
                                        <label for="bmrNo" class="active">BMR No.</label>
                                        <input type="text" class="form-control" name="bmrNo" id="bmrNo" placeholder="BMR No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="batchNo">Batch No.</label>
                                        <input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Batch No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="refMfrNo">Ref. MFR No.</label>
                                        <input type="text" class="form-control" name="refMfrNo" id="refMfrNo" placeholder="Ref. MFR No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="Date">Date</label>
                                        <input type="date" class="form-control" name="Date" id="Date" placeholder="" value={{ date("Y-m-d") }}>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group input_fields_wrap_3" id="MaterialReceived">
                                        <label class="control-label d-flex">Line Clearance Record
                                            <div class="input-group-btn">
                                                <button class="btn btn-dark add-more add_field_button_3 waves-effect waves-light" type="button">Add More +</button>
                                            </div>
                                        </label>
                                        <div class="row add-more-wrap after-add-more m-0 mb-4">
                                            <!-- <span class="add-count">1</span> -->
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="EquipmentName" class="active">Particulars</label>
                                                    <select class="form-control select" name="EquipmentName[]" id="EquipmentName">
                                                        <option>Select</option>
                                                        <option>Area Cleanliness Checked</option>
                                                        <option>Temperature(<sup>o</sup>C)</option>
                                                        <option>Humidity (%RH)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="Observation" class="active">Observation</label>
                                                    <input type="text" class="form-control" name="Observation[]" id="Observation" placeholder="" value="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="time" class="active">Time (Hrs)</label>
                                                    <input type="text" class="form-control" name="time[]" id="time" placeholder="" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="addLots" class="tab-pane fade">
                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="proName" class="active">Product Name</label>
                                    <!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)"> -->
                                    {{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","placeholder"=>"Choose Product Name")) }}
                                    @if ($errors->has('proName'))
                                    <span class="text-danger">{{ $errors->first('proName') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="bmrNo" class="active">BMR No.</label>
                                    <input type="text" class="form-control" name="bmrNo" id="bmrNo" placeholder="BMR No.">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="batchNo">Batch No.</label>
                                    <input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Batch No.">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="refMfrNo">Ref. MFR No.</label>
                                    <input type="text" class="form-control" name="refMfrNo" id="refMfrNo" placeholder="Ref. MFR No.">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="Date">Date</label>
                                    <input type="date" class="form-control" name="Date" id="Date" placeholder="" value={{ date("Y-m-d") }}>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label d-flex">Process Sheet</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="lotNo" class="active">Lot No.</label>
                                    <input type="text" class="form-control" name="lotNo" id="lotNo" placeholder="Lot No." value="1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="ReactorNo">Reactor No.</label>
                                    <select class="form-control" name="ReactorNo" id="ReactorNo">
                                        <option>Select</option>
                                        <option>PR/RC/001</option>
                                        <option>PR/RC/002</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="Date">Date</label>
                                    <input type="date" class="form-control" name="Process_date" id="Process_date " placeholder="" value={{ date("Y-m-d") }}>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group input_fields_wrap_4" id="MaterialReceived">
                                    <label class="control-label d-flex">Raw Material Detail
                                        <div class="input-group-btn">
                                            <button class="btn btn-dark add-more add_field_button_4 waves-effect waves-light" type="button">Add More +</button>
                                        </div>
                                    </label>
                                    <div class="row add-more-wrap5 after-add-more m-0 mb-4">
                                        <!-- <span class="add-count">1</span> -->
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="EquipmentName" class="active">Raw Material</label>
                                                <select class="form-control select" name="EquipmentName" id="EquipmentName">
                                                    <option>Select</option>
                                                    <option>Raw Material Name</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="rmbatchno" class="active">Batch No.</label>
                                                <input type="text" class="form-control" name="rmbatchno" id="rmbatchno" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="Quantity" class="active">Quantity (Kg.)</label>
                                                <input type="text" class="form-control" name="Quantity" id="Quantity" placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <th>Process</th>
                                            <th>Qty. (Kg.)</th>
                                            <th>Temp (<sup>o</sup>C)</th>
                                            <th>Start Time (Hrs)</th>
                                            <th>End Time (Hrs)</th>
                                            <th>Done by</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Charge Polydimethylsiloxane in reactor.</td>
                                            <td><input type="text" name="qty[1]" id="qty[1]" class="form-control"></td>
                                            <td><input type="text" name="temp[1]" id="temp[1]" class="form-control"></td>
                                            <td><input type="text" name="stratTime[1]" id="stratTime[1]" class="form-control"></td>
                                            <td><input type="text" name="endTime[1]" id="endTime[1]" class="form-control"></td>
                                            <td><select class="form-control select" id="doneby[1]">
                                                    <option>Select</option>
                                                    <option>Employee Name</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td>Start heating the reactor and start stirring</td>
                                            <td><input type="text" name="qty[2]" id="qty[2]" class="form-control"></td>
                                            <td><input type="text" name="temp[2]" id="temp[2]" class="form-control"></td>
                                            <td><input type="text" name="stratTime[2]" id="stratTime[2]" class="form-control"></td>
                                            <td><input type="text" name="endTime[2]" id="endTime[2]" class="form-control"></td>
                                            <td><select class="form-control select" id="doneby[2]">
                                                    <option>Select</option>
                                                    <option>Employee Name</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td>Once the temperature is between 100 - 120<sup>o</sup>C start the Inline mixer and charge ColloidalSilicon Dioxide (Fumed Silica) in reactor simultaneously and increase stirring speed.</td>
                                            <td><input type="text" name="qty[3]" id="qty[3]" class="form-control"></td>
                                            <td><input type="text" name="temp[3]" id="temp[3]" class="form-control"></td>
                                            <td><input type="text" name="stratTime[3]" id="stratTime[3]" class="form-control"></td>
                                            <td><input type="text" name="endTime[3]" id="endTime[3]" class="form-control"></td>
                                            <td><select class="form-control select" id="doneby[3]">
                                                    <option>Select</option>
                                                    <option>Employee Name</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td>When temperature reaches 180 - 190 <sup>o</sup>C stop heating the reactor.</td>
                                            <td><input type="text" name="qty[4]" id="qty[4]" class="form-control"></td>
                                            <td><input type="text" name="temp[4]" id="temp[4]" class="form-control"></td>
                                            <td><input type="text" name="stratTime[4]" id="stratTime[4]" class="form-control"></td>
                                            <td><input type="text" name="endTime[4]" id="endTime[4]" class="form-control"></td>
                                            <td><select class="form-control select" id="doneby[4]">
                                                    <option>Select</option>
                                                    <option>Employee Name</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td>Stop stirrer and transfer the reaction mass to homogenizing tank No.- PR/BT/Come Tank number</td>
                                            <td><input type="text" name="qty[1]" id="qty[1]" class="form-control"></td>
                                            <td><input type="text" name="temp[1]" id="temp[1]" class="form-control"></td>
                                            <td><input type="text" name="stratTime[1]" id="stratTime[1]" class="form-control"></td>
                                            <td><input type="text" name="endTime[1]" id="endTime[1]" class="form-control"></td>
                                            <td><select class="form-control select" id="doneby[1]">
                                                    <option>Select</option>
                                                    <option>Employee Name</option>
                                                </select></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Save &amp; Quite</button><a href="add-batch-manufacturing-record-add-lot2.html" class="btn btn-dark btn-md form-btn waves-effect waves-light">Continue</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="Packing" class="tab-pane fade">
                        <form id="add_manufacturing_packing" method="post" action="{{ route('add_manufacturing_packing_insert') }}">
                            @csrf

                            <div class="form-row">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="proName" class="active">Product Name</label>

                                        <!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)"> -->

                                        {{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","placeholder"=>"Choose Product Name")) }}
                                        @if ($errors->has('proName'))
                                        <span class="text-danger">{{ $errors->first('proName') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="bmrNo" class="active">BMR No.</label>
                                        <input type="text" class="form-control" name="bmrNo" id="bmrNo" placeholder="BMR No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="batchNo">Batch No.</label>
                                        <input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Batch No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="refMfrNo">Ref. MFR No.</label>
                                        <input type="text" class="form-control" name="refMfrNo" id="refMfrNo" placeholder="Ref. MFR No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="ManufacturerDate" class="active">Date</label>
                                        <input type="date" class="form-control calendar" name="ManufacturerDate" id="ManufacturerDate" value={{ date("Y-m-d") }}>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group input_fields_wrap" id="MaterialReceived">
                                        <label class="control-label d-flex">Packing
                                            <!-- <div class="input-group-btn">  -->
                                            <!-- <button class="btn btn-dark add-more add_field_button waves-effect waves-light" type="button">Add More +</button> -->
                                            <!-- </div> -->
                                        </label>
                                        <div class="row add-more-wrap after-add-more m-0 mb-4">
                                            <!-- <span class="add-count">1</span> -->
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="Observation" class="active">Area cleanliness checked by Production Observation</label>
                                                    <input type="text" class="form-control" name="Observation" id="Observation" placeholder="Observation">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="Temperature" class="active">Temperature ( <sup>o</sup>C) of Filling area</label>
                                                    <input type="text" class="form-control" name="Temperature" id="Temperature" placeholder="Observation">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="Humidity" class="active">Humidity (%RH) of Filling area</label>
                                                    <input type="text" class="form-control" name="Humidity" id="Humidity" placeholder="Observation">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="TemperatureP" class="active">Temperature ( <sup>o</sup>C) of Product</label>
                                                    <input type="text" class="form-control" name="TemperatureP" id="TemperatureP" placeholder="Observation">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="50kgDrums" class="active">50 Kg No of Drums filled</label>
                                                    <input type="Number" class="form-control" name="50kgDrums" id="50kgDrums" placeholder="No of Drums">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="200kgDrums" class="active">200 Kg No of Drums filled</label>
                                                    <input type="Number" class="form-control" name="20kgDrums" id="20kgDrums" placeholder="No of Drums">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="startTime" class="active">Start Time (Hrs.)</label>
                                                    <input type="number" class="form-control time" name="startTime" id="startTime" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="EndstartTime" class="active">End Time (Hrs.)</label>
                                                    <input type="number" class="form-control time" name="EndstartTime" id="EndstartTime" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="areaCleanliness">Done By</label>
                                                    <input type="text" class="form-control" name="areaCleanliness" id="areaCleanliness" value="{{ \Auth::user()->name }}" readonly>

                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="CareaCleanliness">Checked By</label>
                                                    <input class="form-control" type="text" name="CareaCleanliness" id="CareaCleanliness" value="{{ \Auth::user()->name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group input_fields_wrap" id="MaterialReceived">
                                        <label class="control-label d-flex">Yield
                                            <!-- <div class="input-group-btn">  -->
                                            <!-- <button class="btn btn-dark add-more add_field_button waves-effect waves-light" type="button">Add More +</button> -->
                                            <!-- </div> -->
                                        </label>
                                        <div class="row add-more-wrap after-add-more m-0 mb-4">
                                            <!-- <span class="add-count">1</span> -->
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="rmInput" class="active">RM Input (Kg.)</label>
                                                    <input type="text" class="form-control" name="rmInput" id="rmInput" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="fgOutput" class="active">FG Output</label>
                                                    <input type="text" class="form-control" name="fgOutput" id="fgOutput" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="filledDrums" class="active">Filled in Drums (Kg)</label>
                                                    <input type="text" class="form-control" name="filledDrums" id="filledDrums" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="excessFilledDrums" class="active">Excess filled in drums</label>
                                                    <input type="text" class="form-control" name="excessFilledDrums" id="excessFilledDrums" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="qcsampling" class="active">QC Sampling (Kg.)</label>
                                                    <input type="text" class="form-control" name="qcsampling" id="qcsampling" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="StabilitySample" class="active">Stability Sample (Kg.)</label>
                                                    <input type="Number" class="form-control" name="StabilitySample" id="StabilitySample" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="WorkingSlandered" class="active">Working Slandered</label>
                                                    <input type="text" class="form-control" name="WorkingSlandered" id="WorkingSlandered" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="ValidationSample" class="active">Validation Sample</label>
                                                    <input type="text" class="form-control" name="ValidationSample" id="ValidationSample" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="CustomerSample" class="active">Filled in Jerry can / Drum (Kg.) (Customer Sample)</label>
                                                    <input type="text" class="form-control" name="CustomerSample" id="CustomerSample" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="ActualYield" class="active">Actual Yield [(Output/Input)*100]</label>
                                                    <input type="text" class="form-control" name="ActualYield" id="ActualYield" placeholder="98.00 / 102.00%">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="checkedBy">Checked By</label>
                                                    <input type="text" class="form-control" name="checkedBy" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>

                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="ApprovedBy">Approved By</label>
                                                    <input type="text" class="form-control" name="ApprovedBy" id="ApprovedBy" value="{{ \Auth::user()->name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="Remark" class="active">Note / Remark</label>
                                        <textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Clear</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="requisition" class="tab-pane fade">
                        <form id="packing_material_requisition_slip" method="post" action="{{ route('packing_material_requisition_slip_insert') }}">
                        @csrf
                        <div class="form-row">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="from" class="active">From</label>
                                        <input type="text" class="form-control" name="from" id="from" placeholder="From" >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="to" class="active">To</label>
                                        <input type="text" class="form-control" name="to" id="to" placeholder="To" >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="batchNo">Batch No.</label>
                                        <input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Batch No." >
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="Date" class="active">Date</label>
                                        <input type="date" class="form-control calendar" name="Date" id="Date" value={{ date("Y-m-d") }}>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group input_fields_wrap_6"  id="MaterialReceived">
                                        <label class="control-label d-flex">Material Detail
                                            <div class="input-group-btn">
                                                <button class="btn btn-dark add-more add_field_button_6 waves-effect waves-light" type="button">Add More +</button>
                                            </div>
                                        </label>
                                        <div class="row add-more-wrap after-add-more m-0 mb-4">
                                            <span class="add-count">1</span>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="PackingMaterialName" class="active">Packing Material Name</label>
                                                    <input type="text" class="form-control" name="PackingMaterialName[]" id="PackingMaterialName" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="Capacity" class="active">Capacity (Kg.)</label>
                                                    <input type="text" class="form-control" name="Capacity[]" id="Capacity" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="Quantity" class="active">Quantity (Kg.)</label>
                                                    <input type="text" class="form-control" name="Quantity[]" id="Quantity" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="checkedBy">Checked By</label>
                                        <input type="text" class="form-control select" name="checkedBy" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>
                                            <!-- <option>Select</option>
                                            <option>Officer Production</option>
                                        </select> -->
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="ApprovedBy">Approved By</label>
                                        <input type="text" class="form-control select" name="ApprovedBy" id="ApprovedBy" value="{{ \Auth::user()->name }}" readonly>
                                            <!-- <option>Select</option>
                                            <option>Manager Store</option>
                                        </select> -->
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="Remark" class="active">Note / Remark</label>
                                        <textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="issualofrequisition" class="tab-pane fade">
                        <form id="packing_material_issuel_vali" method="post" action="{{ route('packing_material_issuel_insert') }}">
                            @csrf

                            <div class="form-row">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="from" class="active">From</label>
                                        <input type="text" class="form-control" name="from" id="from" placeholder="From">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="to" class="active">To</label>
                                        <input type="text" class="form-control" name="to" id="to" placeholder="To">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="batchNo">Batch No.</label>
                                        <input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Batch No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="Date" class="active">Date</label>
                                        <input type="date" class="form-control calendar" name="Date" id="Date" value={{ date("Y-m-d") }}>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group input_fields_wrap_5" id="MaterialReceived">
                                        <label class="control-label d-flex">Material Details
                                            <div class="input-group-btn">
                                                <button class="btn btn-dark add-more add_field_button_5 waves-effect waves-light" type="button">Add More +</button>
                                            </div>
                                        </label>
                                        <div class="row add-more-wrap after-add-more m-0 mb-4">
                                            <span class="add-count">1</span>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="PackingMaterialName" class="active">Packing Material Name</label>
                                                    <input type="text" class="form-control" name="PackingMaterialName[]" id="PackingMaterialName" placeholder="" value="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="Capacity" class="active">Capacity (Kg.)</label>
                                                    <input type="text" class="form-control" name="Capacity[]" id="Capacity" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="Quantity" class="active">Quantity (No)</label>
                                                    <input type="text" class="form-control" name="Quantity[]" id="Quantity" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="arNo" class="active">AR No.</label>
                                                    <input type="text" class="form-control" name="arNo[]" id="arNo" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="ARDate" class="active">Date</label>
                                                    <input type="date" class="form-control" name="ARDate[]" id="ARDate" value={{ date("Y-m-d") }}>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="doneBy">Manager - Store</label>
                                        <select class="form-control select" name="doneBy" id="doneBy">
                                            <option>Select</option>
                                            <option>Employee Name</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="checkedBy">Officer - Production</label>
                                        <select class="form-control select" name="checkedBy" id="checkedBy">
                                            <option>Select</option>
                                            <option>Employee Name</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push("scripts")

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
    feather.replace()
    $(document).ready(function() {
        var max_fields = 15; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="rawMaterialName[' + x + ']" class="active">Raw Material</label><select class="form-control select" name="rawMaterialName[]" id="rawMaterialName[' + x + ']"><option>Select</option><option>Material Name</option></select></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="batchNo[' + x + ']" class="active">Batch No.</label><select class="form-control select" name="batchNo[]" id="batchNo[' + x + ']"><option>Select</option><option>RFLX</option></select></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity[' + x + ']" class="active">Quantity (Kg.)</label><input type="text" class="form-control" name="Quantity[]" id="Quantity[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="arNo[' + x + ']" class="active">AR No.</label><input type="text" class="form-control" name="arNo[]" id="arNo[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="date[' + x + ']" class="active">Date</label><input type="date" class="form-control calendar" name="date[]" id="date[' + x + ']" value={{ date("Y-m-d") }}></div></div>'); //add input box
            }
            feather.replace()
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.row').remove();
            x--;
        })
    });

    feather.replace()
    $(document).ready(function() {
        var max_fields = 15; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_1"); //Fields wrapper
        var add_button = $(".add_field_button_1"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6"><div class="form-group"><label for="EquipmentName[' + x + ']" class="active">Equipment Name</label><select class="form-control select" name=EquipmentName[] id="EquipmentName[' + x + ']"><option>Select</option><option>SS Reactor</option><option>SS Homogenising Tank</option><option>Filling Station</option></select></div></div><div class="col-12 col-md-6"><div class="form-group"><label for="EquipmentCode[' + x + ']" class="active">Equipment Code</label><select class="form-control select" name="EquipmentCode[]" id="EquipmentCode[' + x + ']"><option>Select</option><option>PR/RC/001</option><option>PR/RC/002</option></select></div></div></div>'); //add input box
            }
            feather.replace()
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.row').remove();
            x--;
        })


    });
    feather.replace()
    /*$(document).ready(function() {
    var c = 1;
    $(".add-more").click(function(){
    var html = $(".copy").html();
    $(".after-add-more").after(html);
    });
    $("body").on("click",".remove",function(){
    $(this).parents(".add-more-new").remove();
    });
    });*/
    $(document).ready(function() {
        var max_fields = 15; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_3"); //Fields wrapper
        var add_button = $(".add_field_button_3"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-4"><div class="form-group"><label for="EquipmentName[' + x + ']" class="active">Particulars</label><select class="form-control select" name="EquipmentName[]" id="EquipmentName[' + x + ']"><option>Select</option><option>Area Cleanliness Checked</option><option>Temperature(<sup>o</sup>C)</option><option>Humidity (%RH)</option></select></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="Observation[' + x + ']" class="active">Observation</label><input type="text" class="form-control" name="Observation[]" id="Observation[' + x + ']" placeholder="" value=""></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="time[' + x + ']" class="active">Time (Hrs)</label><input type="text" class="form-control" name="time[]" id="time[' + x + ']" placeholder="" value=""></div></div></div>'); //add input box
            }
            feather.replace()
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.row').remove();
            x--;
        })

    });
    feather.replace()
    /*$(document).ready(function() {
		var c = 1;
      $(".add-more").click(function(){
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){
          $(this).parents(".add-more-new").remove();
      });
    });*/
    $(document).ready(function() {
        var max_fields = 15; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_4"); //Fields wrapper
        var add_button = $(".add_field_button_4"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-4"><div class="form-group"><label for="EquipmentName[' + x + ']" class="active">Raw Material</label><select class="form-control select" id="EquipmentName[' + x + ']"><option>Select</option><option>Raw Material Name</option></select></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="rmbatchno[' + x + ']" class="active">Batch No.</label><input type="text" class="form-control" id="rmbatchno[' + x + ']" placeholder="" value=""></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="Quantity[' + x + ']" class="active">Quantity (Kg.)</label><input type="text" class="form-control" id="Quantity[' + x + ']" placeholder="" value=""></div></div></div>'); //add input box
            }
            feather.replace()
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.row').remove();
            x--;
        })
    });
    $(document).ready(function() {
        var max_fields = 15; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_5"); //Fields wrapper
        var add_button = $(".add_field_button_5"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="PackingMaterialName[' + x + ']" class="active">Packing Material Name</label><input type="text" class="form-control" name="PackingMaterialName[]" id="PackingMaterialName[' + x + ']" placeholder="" value=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Capacity[' + x + ']" class="active">Capacity(Kg.)</label><input type="text" class="form-control" name="Capacity[]" id="Capacity[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity[' + x + ']" class="active">Quantity (No)</label><input type="text" class="form-control" name="Quantity[]" id="Quantity[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="arNo[' + x + ']" class="active">AR No.</label><input type="text" class="form-control" name="arNo[]"id="arNo[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="ARDate[' + x + ']" class="active">Date</label><input type="date" class="form-control" name="ARDate[]" id="ARDate[' + x + ']" value={{ date("Y-m-d") }}></div></div></div>'); //add input box
            }
            feather.replace()
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.row').remove();
            x--;
        })

    });
    feather.replace()
    /*$(document).ready(function() {
		var c = 1;
      $(".add-more").click(function(){
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){
          $(this).parents(".add-more-new").remove();
      });
    });*/
    $(document).ready(function() {
        var max_fields = 15; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_6"); //Fields wrapper
        var add_button = $(".add_field_button_6"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="PackingMaterialName" class="active">Packing Material Name</label><input type="text" class="form-control" name="PackingMaterialName[]" id="PackingMaterialName" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Capacity" class="active">Capacity (Kg.)</label><input type="text" class="form-control" name="Capacity[]" id="Capacity" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity" class="active">Quantity (Kg.)</label><input type="text" class="form-control" name="Quantity[]" id="Quantity" placeholder=""></div></div></div></div>'); //add input box
            }
            feather.replace()
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.row').remove();
            x--;
        })
    });

    $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function(e) {
        $('a[data-toggle="tab"]').removeClass('active');
        $(this).addClass('active');
        //alert("hi")
    })
    $(document).ready(function() {

        $("#add_manufacturing").validate({
            rules: {
                proName: "required",
                bmrNo: "required",
                batchNo: "required",
                refMfrNo: "required",
                grade: "required",
                BatchSize: "required",
                //Viscosity: "required",
                ProductionCommencedon: "required",
                ProductionCompletedon: "required",
                ManufacturingDate: "required",
                RetestDate: "required",
                doneBy: "required",
                checkedBy: "required",
                inlineRadioOptions: "required",
                approval: "required",
                approvalDate: "required",
                checkedByI: "required",

            },
            messages: {
                proName: "Please  Enter The Name proName",
                bmrNo: "Please  Enter The Name bmrNo",
                batchNo: "Please  Enter The Name batchNo",
                refMfrNo: "Please  Enter The Name refMfrNo",
                grade: "Please  Enter The Name grade",
                BatchSize: "Please  Enter The Name BatchSize",
                Viscosity: "Please  Enter The Name Viscosity",
                ProductionCommencedon: "Please  Enter The Name ProductionCommencedon",
                ProductionCompletedon: "Please  Enter The Name ProductionCompletedon",
                ManufacturingDate: "Please  Enter The Name ManufacturingDate",
                RetestDate: "Please  Enter The Name RetestDate",
                doneBy: "Please  Enter The Name doneBy",
                checkedBy: "Please  Enter The Name checkedBy",
                inlineRadioOptions: "Please  Enter The Name inlineRadioOptions",
                approval: "Please  Enter The Name approval",
                approvalDate: "Please  Enter The Name approvalDate",
                checkedByI: "Please  Enter The Name checkedBy",
            },
        });
        $("#add_batch_manufacturing_bill").validate({
            rules: {
                proName: "required",
                bmrNo: "required",
                batchNoI: "required",
                refMfrNo: "required",
                rawMaterialName: "required",
                batchNo: "required",
                Quantity: "required",
                arNo: "required",
                date: "required",
                doneBy: "required",
                checkedBy: "required",

            },
            messages: {
                proName: "Please  Enter The Name proName",
                bmrNo: "Please  Enter The Name bmrNo",
                batchNoI: "Please  Enter The Name batchNo",
                refMfrNo: "Please  Enter The Name refMfrNo",
                rawMaterialName: "Please  Enter The Name rawMaterialName",
                batchNo: "Please  Enter The Name batchNo",
                Quantity: "Please  Enter The Name Quantity",
                arNo: "Please  Enter The Name arNo",
                date: "Please  Enter The Name dateid",
                doneBy: "Please  Enter The Name doneBy",
                checkedBy: "Please  Enter The Name checkedBy",
            },
        });
        $("#add_manufacturing_line").validate({
            rules: {
                proName: "required",
                bmrNo: "required",
                batchNo: "required",
                refMfrNo: "required",
                Date: "required",
                EquipmentName: "required",
                Observation: "required",
                time: "required",
            },
            messages: {
                proName: "Please  Enter The Name proName",
                bmrNo: "Please  Enter The Name bmrNo",
                batchNo: "Please  Enter The Name batchNo",
                refMfrNo: "Please  Enter The Name refMfrNo",
                Date: "Please  Enter The  Date",
                EquipmentName: "Please  Enter The Name EquipmentName",
                Observation: "Please  Enter The Name Observation",
                time: "Please  Enter The Name time",
            },
        });
        $("#add_manufacturing_packing").validate({
            rules: {
                proName: "required",
                bmrNo: "required",
                batchNo: "required",
                refMfrNo: "required",
                ManufacturerDate: "required",
                Observation: "required",
                Temperature: "required",
                Humidity: "required",
                TemperatureP: "required",
                // 50kgDrums: "required",
                // 20kgDrums : "required",
                startTime: "required",
                EndstartTime: "required",
                areaCleanliness: "required",
                CareaCleanliness: "required",
                rmInput: "required",
                fgOutput: "required",
                filledDrums: "required",
                excessFilledDrums: "required",
                qcsampling: "required",
                StabilitySample: "required",
                WorkingSlandered: "required",
                ValidationSample: "required",
                CustomerSample: "required",
                ActualYield: "required",
                checkedBy: "required",
                ApprovedBy: "required",
                Remark: "required",

            },
            messages: {
                proName: "Please  Enter The Name proName",
                bmrNo: "Please  Enter The Name bmrNo",
                batchNo: "Please  Enter The Name batchNo",
                refMfrNo: "Please  Enter The Name refMfrNo",
                ManufacturerDate: "Please  Enter The Name ManufacturerDate",
                Observation: "Please  Enter The Name Observation",
                Temperature: "Please  Enter The Name Temperature",
                Humidity: "Please  Enter The Name Humidity",
                TemperatureP: "Please  Enter The Name TemperatureP",
                // 50kgDrums: "Please  Enter The Name 50kgDrums",
                // 20kgDrums: "Please  Enter The Name 20kgDrums",
                startTime: "Please  Enter The Name startTime",
                EndstartTime: "Please  Enter The Name EndstartTime",
                areaCleanliness: "Please  Enter The Name areaCleanliness",
                CareaCleanliness: "Please  Enter The Name CareaCleanliness",
                rmInput: "Please  Enter The Name rmInput",
                fgOutput: "Please  Enter The Name fgOutput",
                filledDrums: "Please  Enter The Name filledDrums",
                excessFilledDrums: "Please  Enter The Name excessFilledDrums",
                qcsampling: "Please  Enter The Name qcsampling",
                StabilitySample: "Please  Enter The Name StabilitySample",
                WorkingSlandered: "Please  Enter The Name WorkingSlandered",
                ValidationSample: "Please  Enter The Name ValidationSample",
                CustomerSample: "Please  Enter The Name CustomerSample",
                ActualYield: "Please  Enter The Name ActualYield",
                checkedBy: "Please  Enter The Name checkedBy",
                ApprovedBy: "Please  Enter The Name ApprovedBy",
                Remark: "Please  Enter The Name Remark",
            },
        });
        $("#add_batch_equipment_vali").validate({
            rules: {
                proName: "required",
                bmrNo: "required",
                batchNo: "required",
                refMfrNo: "required",
                EquipmentName: "required",
                EquipmentCode: "required",


            },
            messages: {
                proName: "Please  Enter The Name proName",
                bmrNo: "Please  Enter The Name bmrNo",
                batchNo: "Please  Enter The Name batchNo",
                refMfrNo: "Please  Enter The Name refMfrNo",
                EquipmentName: "Please  Enter The Name EquipmentName",
                EquipmentCode: "Please  Enter The Name EquipmentCode",

            },
        });
        $("#packing_material_issuel_vali").validate({
            rules: {

                from: "required",
                to: "required",
                batchNo: "required",
                Date: "required",
                PackingMaterialName: "required",
                Capacity: "required",
                Quantity: "required",
                arNo: "required",
                ARDate: "required",
                doneBy: "required",
                checkedBy: "required",


            },
            messages: {
                from: "Please  Enter The from Name",
                to: "Please  Enter The  To Name",
                batchNo: "Please  Enter The  batch No",
                Date: "Please  Enter The  Date",
                PackingMaterialName: "Please  Enter The  PackingMaterial Name",
                Capacity: "Please  Enter The  Capacity",
                Quantity: "Please  Enter The  Quantity",
                arNo: "Please  Enter The  ar No",
                ARDate: "Please  Enter The  ARDate",
                doneBy: "Please  Enter The  doneBy",
                checkedBy: "Please  Enter The  checkedBy",

            },
        });
        $("#packing_material_requisition_slip").validate({
            rules: {
                 from: "required",
                to: "required",
                batchNo: "required",
                Date: "required",
                PackingMaterialName: "required",
                Capacity: "required",
                Quantity: "required",
                checkedBy: "required",
                ApprovedBy: "required",
                Remark: "required",
             },
            messages: {
                from: "Please  Enter The from Name",
                to: "Please  Enter The to Name",
                batchNo: "Please  Enter The batchNo Name",
                Date: "Please  Enter The Date Name",
                PackingMaterialName: "Please  Enter The PackingMaterialName Name",
                Capacity: "Please  Enter The Capacity Name",
                Quantity: "Please  Enter The Quantity Name",
                checkedBy: "Please  Enter The checkedBy Name",
                ApprovedBy: "Please  Enter The ApprovedBy Name",
                Remark: "Please  Enter The Remark Name",

            },
        });

    });
</script>

@endpush
