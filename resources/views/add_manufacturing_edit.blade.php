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
            <ul class="nav nav-tabs" role="tablist">
                <li><a role="tab" class="{{($sequenceId=='1')?'active':''}}" area-selected="{{($sequenceId=='1')?'true':'false'}}" data-toggle="tab" href="#batch">Batch</a></li>
                <li class="dropdown"><a role="tab" class="dropdown-toggle" data-toggle="dropdown" href="#">Raw Material<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a role="tab" class="{{($sequenceId=='2')?'active':''}}" area-selected="{{($sequenceId=='2')?'true':'false'}}" data-toggle="tab" href="#requisition">Requisition</a></li>
                        <li><a role="tab" class="{{($sequenceId=='3')?'active':''}}" area-selected="{{($sequenceId=='3')?'true':'false'}}" data-toggle="tab" href="#issualofrequisition">Issual of requisition</a></li>
                        <li><a role="tab" class="{{($sequenceId=='4')?'active':''}}" area-selected="{{($sequenceId=='4')?'true':'false'}}" data-toggle="tab" href="#billOfRawMaterial">Bill of Raw Material</a></li>

                    </ul>
                </li>
                <li class="dropdown"><a role="tab" class="dropdown-toggle" data-toggle="dropdown" href="#">Packing Material<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a role="tab" class="{{($sequenceId=='5')?'active':''}}" area-selected="{{($sequenceId=='5')?'true':'false'}}" data-toggle="tab" href="#requisitionpacking">Requisition</a></li>
                        <li><a role="tab" class="{{($sequenceId=='6')?'active':''}}" area-selected="{{($sequenceId=='6')?'true':'false'}}" data-toggle="tab" href="#issualofrequisitionpacking">Issual of requisition</a></li>
                        <li><a role="tab" class="{{($sequenceId=='7')?'active':''}}" area-selected="{{($sequenceId=='7')?'true':'false'}}" data-toggle="tab" href="#billOfRawMaterialpacking">Bill of Packing Raw Material</a></li>

                    </ul>
                </li>
                <li><a role="tab" class="{{($sequenceId=='8')?'active':''}}" area-selected="{{($sequenceId=='8')?'true':'false'}}" data-toggle="tab" href="#listOfEquipment">List of Equipment</a></li>
                <li><a role="tab" class="{{($sequenceId=='9')?'active':''}}" area-selected="{{($sequenceId=='9')?'true':'false'}}" data-toggle="tab" href="#addLots_listing">Lots</a></li>
                <li><a role="tab" class="{{($sequenceId=='9')?'active':''}}" area-selected="{{($sequenceId=='10')?'true':'false'}}" data-toggle="tab" href="#addLots" hidden="hidden">Lots</a></li>
                <li><a role="tab" class="{{($sequenceId=='10')?'active':''}}" area-selected="{{($sequenceId=='11')?'true':'false'}}" data-toggle="tab" href="#homogenizing">Homogenizing</a></li>
                <li><a data-toggle="tab" class="{{($sequenceId=='11')?'active':''}}" area-selected="{{($sequenceId=='12')?'true':'false'}}" href="#Packing">Packing</a></li>
                <li><a data-toggle="tab" class="{{($sequenceId=='12')?'active':''}}" area-selected="{{($sequenceId=='13')?'true':'false'}}" href="#Packing_1">Generate Label</a></li>
            </ul>
            @if ($message = Session::get('danger'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <div class="tab-content">
            @if(isset($edit_batchmanufacturing))
                <div id="batch" class="tab-pane fade {{($sequenceId=='1')?'in active show':''}}">
                    <form id="add_manufacturing" method="post" action="{{ route('add_manufacturing_update') }}">
                        <input type="hidden" value="1" name="sequenceId">
                        <input type="hidden" value="{{$edit_batchmanufacturing->id}}" name="id">
                        @csrf

                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="proName" class="active">Product Name</label>
                                    {{ Form::select("proName",$product,old($edit_batchmanufacturing->proName),array("class"=>"form-control select","id"=>"material_name")) }}
                                    @if ($errors->has('proName'))
                                    <span class="text-danger">{{ $errors->first('proName') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="bmrNo" class="active">BMR No.</label>
                                    <input type="text" class="form-control" name="bmrNo" value="{{$edit_batchmanufacturing->bmrNo}}" id="bmrNo">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="batchNo">Batch No.</label>
                                    <input type="text" class="form-control" name="batchNo" value="{{$edit_batchmanufacturing->batchNo}}" id="batchNo">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="refMfrNo">Ref. MFR No.</label>
                                    <input type="text" class="form-control" name="refMfrNo" value="{{$edit_batchmanufacturing->refMfrNo}}" id="refMfrNo">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="grade" class="active">Grade</label>
                                    <input type="text" class="form-control" name="grade" value="{{$edit_batchmanufacturing->grade}}" id="grade" placeholder="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="BatchSize" class="active">Batch Size</label>
                                    <input type="text" class="form-control" name="BatchSize" value="{{$edit_batchmanufacturing->BatchSize}}" id="BatchSize" placeholder="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="Viscosity" class="active">Viscosity</label>
                                    <input type="text" class="form-control" name="Viscosity" value="{{$edit_batchmanufacturing->Viscosity}}" id="Viscosity" placeholder="" value="2000-2500 cSt">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="ProductionCommencedon" class="active">Production Commenced on</label>
                                        <input type="date" class="form-control" name="ProductionCommencedon" value="{{$edit_batchmanufacturing->ProductionCommencedon}}" id="ProductionCommencedon" placeholder="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="ProductionCompletedon" class="active">Production Completed on</label>
                                        <input type="date" class="form-control" name="ProductionCompletedon" value="{{$edit_batchmanufacturing->ProductionCompletedon}}" id="ProductionCompletedon" placeholder="" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="ManufacturingDate" class="active">Manufacturing Date</label>
                                        <input type="date" class="form-control" name="ManufacturingDate" value="{{$edit_batchmanufacturing->ManufacturingDate}}" id="ManufacturingDate" placeholder="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="RetestDate" class="active">Retest Date</label>
                                        <input type="date" class="form-control" name="RetestDate" value="{{$edit_batchmanufacturing->RetestDate}}" id="RetestDate" placeholder="" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="doneBy">Prepared by</label>
                                        <input type="text" class="form-control select" name="doneBy" value="{{Auth::user()->name }}" id="doneBy" readonly>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="checkedBy">Checked by</label>
                                        <input type="text" class="form-control select" name="checkedBy" value="{{Auth::user()->name }}" id="checkedBy" readonly>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="checkedByI">Reviewed and Approved by</label>
                                        <input type="text" class="form-control select" name="checkedByI" value="{{Auth::user()->name }}" id="checkedByI" readonly>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="approval" class="active">This Batch is approved/not approved</label>
                                        <select class="form-control select" name="approval" id="approval">
                                            @if($edit_batchmanufacturing->approval=='1')
                                            <option value="1">Approved</option>
                                            @else
                                            <option value="0">Not Approved</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="Remark" class="active">Note / Remark</label>
                                        <textarea class="form-control" name="Remark" id="Remark" value="{{$edit_batchmanufacturing->Remark}}" placeholder="Note / Remark">{{$edit_batchmanufacturing->Remark}}</textarea>
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
                @endif
                @if(isset($requestion))
                <div id="requisition" class="tab-pane fade {{($sequenceId=='2')?'in active show':''}}">
                    <form id="packing_material_requisition_slip" method="post" action="{{ route('packing_material_requisition_slip_update') }}">
                        <input type="hidden" value="2" name="sequenceId">
                        <input type="hidden" value="{{$requestion->id}}" name="id">

                        @csrf
                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="from" class="active">From</label>
                                    {{ Form::select("from",$department,old("from"),array("class"=>"form-control select","id"=>"from","value"=>"$requestion->from")) }}

                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="to" class="active">To</label>
                                    {{ Form::select("to",$department,old("to"),array("class"=>"form-control select","id"=>"to","value"=>"$requestion->to")) }}

                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="batchNo">Batch No.</label>
                                    <input type="text" class="form-control" name="batchNo" id="batchNo" value="{{$requestion->batchNo}}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="Date" class="active">Date</label>
                                    <input type="date" class="form-control calendar" name="Date" id="Date" value="{{$requestion->Date}}">
                                </div>
                            </div>

                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group input_fields_wrap_9" id="MaterialReceived">
                                    <label class="control-label d-flex">Material Detail
                                        <div class="input-group-btn">
                                            <button class="btn btn-dark add-more add_field_button_9 waves-effect waves-light" type="button">Add More +</button>
                                        </div>
                                    </label>
                                    @if(isset($DetailsRequisition))
                                    @foreach($DetailsRequisition as $temp)
                                    <div class="row add-more-wrap after-add-more m-0 mb-4">
                                        <span class="add-count">1</span>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="PackingMaterialName" class="active">Raw Material Name</label>

                                                {{ Form::select("PackingMaterialName[]",$rawmaterials,old($temp->PackingMaterialName),array("class"=>"form-control select","id"=>"material_name")) }}

                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="Quantity" class="active">Quantity (Kg.)</label>
                                                <input type="text" class="form-control" name="Quantity[]" id="Quantity" value="{{$temp->Quantity}}">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="checkedBy">Checked By</label>
                                    <input type="text" class="form-control select" name="checkedBy" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>

                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="ApprovedBy">Approved By</label>
                                    <input type="text" class="form-control select" name="ApprovedBy" id="ApprovedBy" value="{{ \Auth::user()->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Remark" class="active">Note / Remark</label>
                                    <textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark">{{$requestion->Remark}}</textarea>
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
                @endif
                <div id="issualofrequisition" class="tab-pane fade {{($sequenceId=='3')?'in active show':''}}">
                    @if(isset($requestion_1))
                    <table class="table table-hover table-bordered datatable" id="examplereq">
                        <thead>
                            <tr>
                                <th>Requestion No</th>
                                <th>Batch No</th>
                                <th>Date</th>

                                <th>Requestion Raw Material Name</th>
                                <th>Requestion Raw Material Qty</th>
                                <th>Issued Raw Material Qty</th>
                                <th>Status</th>


                            </tr>
                        </thead>
                        <tbody>

                            @if($requestion_details && $requestion_1)
                            @foreach($requestion_details as $temp)
                            <tr>
                                <td>{{$requestion_1->id}}</td>
                                <td>{{$requestion_1->batchNo}}</td>
                                <td>{{$requestion_1->created_at?date("d/m/Y",strtotime($requestion_1->created_at)):""}}</td>
                                <td>{{$temp->material_name}}</td>
                                <td>{{$temp->Quantity}}</td>
                                <td>{{$temp->approved_qty}}</td>
                                <td>{{($temp->status == 1?"Approved":($temp->status == 2?"Reject":""))}}</td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                    @endif

                </div>
                @if(isset($res_data))
                <div id="billOfRawMaterial" class="tab-pane fade {{($sequenceId=='4')?'in active show':''}}">

                    <form id="add_batch_manufacturing_bill" method="post" action="{{ route('bill_of_raw_material_update') }}">
                        <input type="hidden" value="3" name="sequenceId">

                        <input type="hidden" value="{{(isset($res_data->id))?$res_data->id:0}}" name="id">
                        @csrf

                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="PackingMaterialName" class="active">Product Name</label>

                                    {{ Form::select("proName",$product,old("proName"),array(    "class"=>"form-control select","id"=>"proName","value"=>"$res_data->proName")) }}

                                    @if ($errors->has('proName'))
                                    <span class="text-danger">{{ $errors->first('proName') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="bmrNo" class="active">BMR No.</label>
                                    <input type="text" class="form-control" name="bmrNo" id="bmrNo" value="{{$res_data->bmrNo}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="batchNoI">Batch No.</label>
                                    <input type="text" class="form-control valid" name="batchNoI" id="batchNoI" value="{{$res_data->batchNoI}}" readonly="" aria-invalid="false">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="refMfrNo">Ref. MFR No.</label>
                                    <input type="text" class="form-control" name="refMfrNo" id="refMfrNo" value="{{$res_data->refMfrNo}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group input_fields_wrap" id="MaterialReceived">
                                    <label class="control-label d-flex">Bill of Raw Material Details and Weighing Record
                                        <div class="input-group-btn">
                                            <button class="btn btn-dark add-more add_field_button waves-effect waves-light" type="button">Add More +</button>
                                        </div>
                                    </label>
                                    @if(isset($res))
                                    @foreach($res as $temp)
                                    <div class="row add-more-wrap after-add-more m-0 mb-4">
                                        <!-- <span class="add-count">1</span> -->
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="rawMaterialName" class="active">Raw Material</label>
                                                <select class="form-control select" name="rawMaterialName[]" id="rawMaterialName">
                                                    <option>Select</option>
                                                    <option value="Material name" selected>Material Name</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="Quantity" class="active">Quantity (Kg.)</label>
                                                <input type="text" class="form-control" name="Quantity[]" id="Quantity" value="{{$temp->Quantity}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="arNo" class="active">AR No.</label>
                                                <input type="text" class="form-control" name="arNo[]" id="arNo" value="{{$temp->arNo}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="date" class="active">Date</label>
                                                <input type="date" class="form-control calendar" name="date[]" id="date" value="{{$temp->date}}">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="doneBy">Weighed by</label>
                                    <input type="text" class="form-control select" name="doneBy" value="{{ \Auth::user()->name }}" id="doneBy" readonly>

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
                                    <textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark">{{$res_data->Remark}}</textarea>
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
                @endif
                @if(isset($requestion))
                <div id="requisitionpacking" class="tab-pane fade {{($sequenceId=='5')?'in active show':''}}">
                    <form id="packing_material_requisition_slip" method="post" action="{{ route('packing_material_requisition_slip_update_1') }}">
                        <input type="hidden" value="4" name="sequenceId">
                        <input type="hidden" value="{{$requestion->id}}" name="id">
                        @csrf
                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="from" class="active">From </label>
                                    {{ Form::select("from",$department,old("from"),array("class"=>"form-control select","id"=>"from","value"=>"$temp->from")) }}


                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="to" class="active">To</label>
                                    {{ Form::select("to",$department,old("to"),array("class"=>"form-control select","id"=>"to","value"=>"$temp->to")) }}

                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="batchNo">Batch No.</label>
                                    <input type="text" class="form-control" value="{{$requestion->batchNo}}" name="batchNo" id="batchNo" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="Date" class="active">Date</label>
                                    <input type="date" class="form-control calendar" value="{{$requestion->Date}}" name="Date" id="Date" value={{ date("Y-m-d") }}>
                                </div>
                            </div>


                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group input_fields_wrap_6" id="MaterialReceived">
                                    <label class="control-label d-flex">Material Detail
                                        <div class="input-group-btn">
                                            <button class="btn btn-dark add-more add_field_button_6 waves-effect waves-light" type="button">Add More +</button>
                                        </div>
                                    </label>
                                    @if(isset($DetailsRequisition))
                                    @foreach($DetailsRequisition as $temp)
                                    <div class="row add-more-wrap after-add-more m-0 mb-4">
                                        <span class="add-count">1</span>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="PackingMaterialName" class="active">Packing Material Name</label>
                                                {{ Form::select("PackingMaterialName[]",$rawmaterials,old($temp->PackingMaterialName),array("class"=>"form-control select","id"=>"material_name")) }}

                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="Capacity" class="active">Capacity (Kg.)</label>
                                                <input type="text" class="form-control" name="Capacity[]" id="Capacity" value="{{$temp->Capacity}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="Quantity" class="active">Quantity (Kg.)</label>
                                                <input type="text" class="form-control" name="Quantity[]" id="Quantity" placeholder="" value="{{$temp->Quantity}}">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="checkedBy">Checked By</label>
                                    <input type="text" class="form-control select" name="checkedBy" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>

                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="ApprovedBy">Approved By</label>
                                    <input type="text" class="form-control select" name="ApprovedBy" id="ApprovedBy" value="{{ \Auth::user()->name }}" readonly>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Remark" class="active">Note / Remark</label>
                                    <textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"> {{$requestion->Remark}}</textarea>
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
                @endif
                @if(isset($res_data_3))
                <div id="issualofrequisitionpacking" class="tab-pane fade {{($sequenceId=='6')?'in active show':''}}">

                    <form id="packing_material_issuel_vali" method="post" action="{{ route('packing_material_issuel_insert_update') }}">
                        <input type="hidden" value="5" name="sequenceId">
                        <input type="hidden" value="{{$res_data_3->id}}" name="id">
                        @csrf

                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="from" class="active">From </label>
                                    {{ Form::select("from",$department,old("from"),array("class"=>"form-control select","id"=>"from","value"=>"$res_data_3->from")) }}

                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="to" class="active">To</label>
                                    {{ Form::select("to",$department,old("to"),array("class"=>"form-control select","id"=>"to","value"=>"$res_data_3->to")) }}

                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="batchNoI">Batch No.</label>
                                    <input type="text" class="form-control" name="batchNo" id="batchNo" value="{{$res_data_3->batchNo}}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="Date" class="active">Date</label>
                                    <input type="date" class="form-control calendar" name="Date" id="Date" value="{{$res_data_3->Date}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group input_fields_wrap_5" id="MaterialReceived">
                                    <label class="control-label d-flex">Material Details
                                        <div class="input-group-btn">
                                            <button class="btn btn-dark add-more add_field_button_5 waves-effect waves-light" type="button">Add More +</button>
                                        </div>
                                    </label>
                                    @if(count($res_3))
                                    @foreach($res_3 as $temp)
                                    <div class="row add-more-wrap after-add-more m-0 mb-4">
                                        <span class="add-count">1</span>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="PackingMaterialName" class="active">Packing Material Name</label>
                                                <input type="text" class="form-control" name="PackingMaterialName[]" id="PackingMaterialName" value="{{$temp->PackingMaterialName}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="Capacity" class="active">Capacity (Kg.)</label>
                                                <input type="text" class="form-control" name="Capacity[]" id="Capacity" value="{{$temp->Capacity}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="Quantity" class="active">Quantity (No)</label>
                                                <input type="text" class="form-control" name="Quantity[]" id="Quantity" value="{{$temp->Quantity}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="arNo" class="active">AR No.</label>
                                                <input type="text" class="form-control" name="arNo[]" id="arNo" value="{{$temp->arNo}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="ARDate" class="active">Date</label>
                                                <input type="date" class="form-control" name="ARDate[]" id="ARDate" value="{{$temp->ARDate}}">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

                                </div>
                            </div>


                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="doneBy">Manager - Store</label>
                                    <select class="form-control select" name="doneBy" id="doneBy[]">
                                        <option>{{$res_data_3->doneBy}}</option>
                                        <option value="Employee Name">Employee Name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="checkedBy">Officer - Production</label>
                                    <select class="form-control select" name="checkedBy" id="checkedBy">
                                        <option>{{$res_data_3->checkedBy}}</option>
                                        <option value="Employee Name">Employee Name</option>
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
                @endif
                @if(isset($res_data))
                <div id="billOfRawMaterialpacking" class="tab-pane fade {{($sequenceId=='7')?'in active show':''}}">
                    <form id="add_batch_manufacturing_bill" method="post" action="{{ route('bill_of_raw_material_packing_update') }}">
                        <input type="hidden" value="6" name="sequenceId">
                        <input type="hidden" value="{{$res_data->id}}" name="id">
                        @csrf

                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="proName" class="active">Product Name</label>

                                    {{ Form::select("proName",$product,isset($batchdetails->proName)?$batchdetails->proName:old("proName"),array("class"=>"form-control select","id"=>"proName","value"=>"res_data->proName")) }}

                                    @if ($errors->has('proName'))
                                    <span class="text-danger">{{ $errors->first('proName') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="bmrNo" class="active">BMR No.</label>
                                    <input type="text" class="form-control" name="bmrNo" id="bmrNo" value="{{$res_data->bmrNo}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="batchNoI">Batch No.</label>
                                    <input type="text" class="form-control" name="batchNoI" id="batchNoI" value="{{$res_data->batchNoI}}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="refMfrNo">Ref. MFR No.</label>
                                    <input type="text" class="form-control" name="refMfrNo" id="refMfrNo" value="{{$res_data->refMfrNo}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group input_fields_wrap" id="MaterialReceived">
                                    <label class="control-label d-flex">Bill of Raw Material Details and Weighing Record
                                        <div class="input-group-btn">
                                            <button class="btn btn-dark add-more add_field_button waves-effect waves-light" type="button">Add More +</button>
                                        </div>
                                    </label>
                                    @if(isset($res))
                                    @foreach($res as $temp)
                                    <div class="row add-more-wrap after-add-more m-0 mb-4">
                                        <!-- <span class="add-count">1</span> -->
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="rawMaterialName" class="active">Raw Material</label>
                                                <select class="form-control select" name="rawMaterialName[]" id="rawMaterialName">
                                                    <option>{{$temp->rawMaterialName}}</option>
                                                    <option value="Material Name">Material Name</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="batchNo" class="active">Batch No.</label>
                                                <select class="form-control select" name="batchNo[]" id="batchNo">
                                                    <option>{{$temp->batchNo}}</option>
                                                    <option value="RFLX">RFLX</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="Quantity" class="active">Quantity (Kg.)</label>
                                                <input type="text" class="form-control" name="Quantity[]" id="Quantity" value="{{$temp->Quantity}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="arNo" class="active">AR No.</label>
                                                <input type="text" class="form-control" name="arNo[]" id="arNo" value="{{$temp->arNo}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="date" class="active">Date</label>
                                                <input type="date" class="form-control calendar" name="date[]" id="date" value="{{$temp->date}}">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="doneBy">Weighed by</label>
                                    <input type="text" class="form-control select" name="doneBy" value="{{ \Auth::user()->name }}" id="doneBy" readonly>

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
                                    <textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark">{{$res_data->Remark}}</textarea>
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
                @endif
                @if(isset($res_data_1))
                <div id="listOfEquipment" class="tab-pane fade {{($sequenceId=='8')?'in active show':''}}">
                    <form id="add_batch_equipment_vali" method="post" action="{{ route('list_of_equipment_update') }}">
                        <input type="hidden" value="7" name="sequenceId">
                        <input type="hidden" value="{{$res_data_1->id}}" name="id">
                        @csrf
                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="proName" class="active">Product Name</label>
                                    {{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","value"=>"res_data_1->proName")) }}
                                    @if ($errors->has('proName'))
                                    <span class="text-danger">{{ $errors->first('proName') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="bmrNo" class="active">BMR No.</label>
                                    <input type="text" class="form-control" name="bmrNo" id="bmrNo" value="{{$res_data_1->bmrNo}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="batchNo">Batch No.</label>
                                    <input type="text" class="form-control" name="batchNo" id="batchNo" value="{{$res_data_1->batchNo}}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="refMfrNo">Ref. MFR No.</label>
                                    <input type="text" class="form-control" name="refMfrNo" id="refMfrNo" value="{{$res_data_1->refMfrNo}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="Remark" class="active">Note / Remark</label>
                                    <textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark">{{$res_data->Remark}}</textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group input_fields_wrap_1" id="MaterialReceived">
                                    <label class="control-label d-flex">List of Equipment in Manufacturing Process
                                        <div class="input-group-btn">
                                            <button class="btn btn-dark add-more add_field_button_1 waves-effect waves-light" type="button">Add More +</button>
                                        </div>
                                    </label>
                                    @if(isset($res_1))
                                    @foreach($res_1 as $temp)
                                    <div class="row add-more-wrap after-add-more m-0 mb-4">
                                        <!-- <span class="add-count">1</span> -->
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="EquipmentName" class="active">Equipment Name</label>
                                                <select class="form-control select" name="EquipmentName[]" id="EquipmentName">
                                                    <option>{{$temp->EquipmentName}}</option>
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
                                                    <option>{{$temp->EquipmentCode}}</option>
                                                    <option>PR/RC/001</option>
                                                    <option>PR/RC/002</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif


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
                @endif
                @if(isset($addlots))
                <div id="addLots_listing" class="tab-pane fade {{($sequenceId=='9')?'in active show':''}}">


                <div class="form-group">
                <a role="tab" data-toggle="tab"  class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light "href="#addLots">Open Lots</a>
                     </div>
                @if(isset($lotsdetails))
                    <table class="table table-hover table-bordered datatable" id="examplereq">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Product Name</th>
                                <th>Bmr.No</th>
                                <th>lot.No</th>
                                <th>batch.No</th>
                                <th>RefMfr.No</th>
                                <th>Date</th>
                                <th>Reactor No.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($lotsdetails)
                            @foreach($lotsdetails as $lots)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$lots->material_name}}</td>
                                <td>{{$lots->bmrNo}}</td>
                                <td>{{$lots->lotNo}}</td>
                                <td>{{$lots->batchNo}}</td>
                                <td>{{$lots->refMfrNo}}</td>
                                <td>{{$lots->Date?date("d/m/Y",strtotime($lots->created_at)):""}}</td>
                                <td>{{$lots->ReactorNo}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    @endif

                </div>
                @endif
                @if(isset($addlots))
                <div id="addLots" class="tab-pane fade {{($sequenceId=='10')?'in active show':''}}">

                    <form method="post" action="{{ route('add_lots_update') }}">
                        <div class="form-row">
                            <input type="hidden" value="8" name="sequenceId">
                            <input type="hidden" value="{{$addlots->id}}" name="id">
                            @csrf

                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="proName" class="active">Product Name</label>
                                    {{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","value"=>"addlots->proName")) }}

                                    @if ($errors->has('proName'))
                                    <span class="text-danger">{{ $errors->first('proName') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="bmrNo" class="active">BMR No.</label>
                                    <input type="text" class="form-control" name="bmrNo" id="bmrNo" value="{{$addlots->bmrNo}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="batchNo">Batch No.</label>
                                    <input type="text" class="form-control" name="batchNo" id="batchNo" value="{{$addlots->batchNo}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="refMfrNo">Ref. MFR No.</label>
                                    <input type="text" class="form-control" name="refMfrNo" id="refMfrNo" value="{{$addlots->refMfrNo}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="Date">Date</label>
                                    <input type="date" class="form-control" name="Date" id="Date" value="{{$addlots->Date}}">
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
                                    <input type="text" class="form-control" name="lotNo" id="lotNo" value="{{$addlots->lotNo}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="ReactorNo">Reactor No.</label>
                                    <select class="form-control" name="ReactorNo" id="ReactorNo">
                                        <option>{{$addlots->ReactorNo}}</option>
                                        <option>PR/RC/001</option>
                                        <option>PR/RC/002</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="Date">Date</label>
                                    <input type="date" class="form-control" name="Process_date" id="Process_date " placeholder="" value="{{$addlots->Process_date}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group input_fields_wrap_4" id="MaterialReceived">
                                    <label class="control-label d-flex">Raw Material Detail
                                        <div class="input-group-btn">
                                            <button class="btn btn-dark add-more add_field_button_4 waves-effect waves-light" type="button">Add More +</button>
                                        </div>
                                    </label>
                                    @if(isset($AddLotslRawMaterialDetails))
                                    @foreach($AddLotslRawMaterialDetails as $temp)
                                    <div class="row add-more-wrap5 after-add-more m-0 mb-4">
                                        <!-- <span class="add-count">1</span> -->
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="EquipmentName" class="active">Raw Material</label>
                                                <select class="form-control select" name="EquipmentName[]" id="EquipmentName">
                                                    <option>{{$temp->EquipmentName}}</option>
                                                    <option>Raw Material Name</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="rmbatchno" class="active">Batch No.</label>
                                                <input type="text" class="form-control" name="rmbatchno[]" id="rmbatchno" value="{{$temp->rmbatchno}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="Quantity" class="active">Quantity (Kg.)</label>
                                                <input type="text" class="form-control" name="Quantity[]" id="Quantity" value="{{$temp->Quantity}}">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

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
                    </form>
                </div>
                @endif
                @if(isset($Homogenizing))
                <div id="homogenizing" class="tab-pane fade {{($sequenceId=='11')?'in active show':''}}">
                    <form id="add_manufacturing_line" method="post" action="{{ route('homogenizing_update') }}">
                        <input type="hidden" value="8" name="sequenceId">
                        <input type="hidden" value="{{$Homogenizing->id}}" name="id">
                        @csrf

                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="proName" class="active">Product Name</label>

                                    {{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","value"=>"Homogenizing->proName")) }}
                                    @if ($errors->has('proName'))
                                    <span class="text-danger">{{ $errors->first('proName') }}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="bmrNo" class="active">BMR No.</label>
                                    <input type="text" class="form-control" name="bmrNo" id="bmrNo" value="{{$Homogenizing->bmrNo}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="batchNo">Batch No.</label>
                                    <input type="text" class="form-control" name="batchNo" id="batchNo" value="{{$Homogenizing->batchNo}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="refMfrNo">Ref. MFR No.</label>
                                    <input type="text" class="form-control" name="refMfrNo" id="refMfrNo" value="{{$Homogenizing->refMfrNo}}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="homoTank">Homogenizing tank No.</label>
                                    <input type="text" class="form-control" name="homoTank" id="homoTank" value="{{$Homogenizing->homoTank}}">
                                </div>
                            </div>

                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Process</th>
                                            <th>Qty (Kg.)</th>
                                            <th>Start Time (Hrs)</th>
                                            <th>End Time (Hrs)</th>
                                            <th>Done by</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($HomogenizingList))
                                        @foreach($HomogenizingList as $temp)
                                        <tr>
                                            <td><input type="date" name="dateProcess[]" value="{{$temp->dateProcess}}" id="dateProcess[1]" class="form-control"></td>
                                            <td>{{$temp->Process}}</td>
                                            <td><input type="text" name="qty[]" id="qty" value="{{$temp->qty}}" class="form-control"></td>
                                            <td><input type="text" name="stratTime[]" id="stratTime" value="{{$temp->stratTime}}" class="form-control"></td>
                                            <td><input type="text" name="endTime[]" id="endTime" value="{{$temp->endTime}}" class="form-control"></td>
                                            <td><select class="form-control select" id="doneby" name="doneby[]">
                                                    <option>{{$temp->doneby}}</option>
                                                    <option>Employee Name</option>
                                                </select></td>
                                        </tr>

                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="d-block">In Process Check (After 4 Lot)</label>
                                    Remove sample (approx. 100gm) and check for viscosity at 25 <sup>o</sup>C/ 30 RPM with LV3 spindle using Brookfield Viscometer (ID No.: PR/VM/002).
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="Observedvalue">Observed value (cSt)</label>
                                    <input type="text" class="form-control" name="Observedvalue" id="Observedvalue" value="{{$Homogenizing->Observedvalue}}" placeholder="" value="">
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
                @endif
                @if(isset($packingmateria))

                <div id="Packing" class="tab-pane fade {{($sequenceId=='12')?'in active show':''}}">
                    <form id="add_manufacturing_packing" method="post" action="{{ route('add_manufacturing_packing_update') }}">
                        <input type="hidden" value="9" name="sequenceId">
                        <input type="hidden" value="{{$packingmateria->id}}" name="id">
                        @csrf

                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="proName" class="active">Product Name</label>

                                    <!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)"> -->

                                    {{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","value"=>"$packingmateria->proName")) }}
                                    @if ($errors->has('proName'))
                                    <span class="text-danger">{{ $errors->first('proName') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="bmrNo" class="active">BMR No.</label>
                                    <input type="text" class="form-control" name="bmrNo" value="{{$packingmateria->bmrNo}}" id="bmrNo">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="batchNo">Batch No.</label>
                                    <input type="text" class="form-control" name="batchNo" value="{{$packingmateria->batchNo}}" id="batchNo" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="refMfrNo">Ref. MFR No.</label>
                                    <input type="text" class="form-control" name="refMfrNo" value="{{$packingmateria->refMfrNo}}" id="refMfrNo" placeholder="Ref. MFR No.">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="ManufacturerDate" class="active">Date</label>
                                    <input type="date" class="form-control calendar" name="ManufacturerDate" value="{{$packingmateria->ManufacturerDate}}" id="ManufacturerDate" value={{ date("Y-m-d") }}>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group input_fields_wrap" value="{{$packingmateria->MaterialReceived}}" id="MaterialReceived">
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
                                                <input type="text" class="form-control" name="Observation" value="{{$packingmateria->Observation}}" id="Observation" placeholder="Observation">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="Temperature" class="active">Temperature ( <sup>o</sup>C) of Filling area</label>
                                                <input type="text" class="form-control" name="Temperature" value="{{$packingmateria->Temperature}}" id="Temperature" placeholder="Observation">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="Humidity" class="active">Humidity (%RH) of Filling area</label>
                                                <input type="text" class="form-control" name="Humidity" value="{{$packingmateria->Humidity}}" id="Humidity" placeholder="Observation">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="TemperatureP" class="active">Temperature ( <sup>o</sup>C) of Product</label>
                                                <input type="text" class="form-control" name="TemperatureP" value="{{$packingmateria->TemperatureP}}" id="TemperatureP" placeholder="Observation">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="50kgDrums" class="active">50 Kg No of Drums filled</label>
                                                <input type="Number" class="form-control" name="50kgDrums" value="{{$packingmateria['50kgDrums']}}" id="50kgDrums">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="200kgDrums" class="active">200 Kg No of Drums filled</label>
                                                <input type="Number" class="form-control" name="20kgDrums" id="20kgDrums" value="{{$packingmateria['20kgDrums']}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="startTime" class="active">Start Time (Hrs.)</label>
                                                <input type="number" class="form-control time" name="startTime" value="{{$packingmateria->startTime}}" id="startTime" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="EndstartTime" class="active">End Time (Hrs.)</label>
                                                <input type="number" class="form-control time" name="EndstartTime" value="{{$packingmateria->EndstartTime}}" id="EndstartTime" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="areaCleanliness">Done By</label>
                                                <input type="text" class="form-control" name="areaCleanliness" value="{{Auth::user()->name }}" id="areaCleanliness" value="{{ \Auth::user()->name }}" readonly>

                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="CareaCleanliness">Checked By</label>
                                                <input class="form-control" type="text" name="CareaCleanliness" value="{{Auth::user()->name }}" id="CareaCleanliness" value="{{ \Auth::user()->name }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group input_fields_wrap" value="{{$packingmateria->MaterialReceived}}" id="MaterialReceived">
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
                                                <input type="text" class="form-control" name="rmInput" value="{{$packingmateria->rmInput}}" id="rmInput" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="fgOutput" class="active">FG Output</label>
                                                <input type="text" class="form-control" name="fgOutput" value="{{$packingmateria->fgOutput}}" id="fgOutput" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="filledDrums" class="active">Filled in Drums (Kg)</label>
                                                <input type="text" class="form-control" name="filledDrums" value="{{$packingmateria->filledDrums}}" id="filledDrums" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="excessFilledDrums" class="active">Excess filled in drums</label>
                                                <input type="text" class="form-control" name="excessFilledDrums" value="{{$packingmateria->excessFilledDrums}}" id="excessFilledDrums" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="qcsampling" class="active">QC Sampling (Kg.)</label>
                                                <input type="text" class="form-control" name="qcsampling" value="{{$packingmateria->qcsampling}}" id="qcsampling" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="StabilitySample" class="active">Stability Sample (Kg.)</label>
                                                <input type="Number" class="form-control" name="StabilitySample" value="{{$packingmateria->StabilitySample}}" id="StabilitySample" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="WorkingSlandered" class="active">Working Slandered</label>
                                                <input type="text" class="form-control" name="WorkingSlandered" value="{{$packingmateria->WorkingSlandered}}" id="WorkingSlandered" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="ValidationSample" class="active">Validation Sample</label>
                                                <input type="text" class="form-control" name="ValidationSample" value="{{$packingmateria->ValidationSample}}" id="ValidationSample" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="CustomerSample" class="active">Filled in Jerry can / Drum (Kg.) (Customer Sample)</label>
                                                <input type="text" class="form-control" name="CustomerSample" value="{{$packingmateria->CustomerSample}}" id="CustomerSample" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="ActualYield" class="active">Actual Yield [(Output/Input)*100]</label>
                                                <input type="text" class="form-control" name="ActualYield" value="{{$packingmateria->ActualYield}}" id="ActualYield" placeholder="98.00 / 102.00%">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="checkedBy">Checked By</label>
                                                <input type="text" class="form-control" name="checkedBy" value="{{Auth::user()->name }}" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>

                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="ApprovedBy">Approved By</label>
                                                <input type="text" class="form-control" name="ApprovedBy" value="{{Auth::user()->name }}" id="ApprovedBy" value="{{ \Auth::user()->name }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Remark" class="active">Note / Remark</label>
                                    <textarea class="form-control" name="Remark" value="{{$packingmateria->Remark}}" id="Remark" placeholder="Note / Remark">{{$packingmateria->Remark}}</textarea>
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
                @endif
                @if(isset($packingmateria))

                <div id="Packing_1" class="tab-pane fade {{($sequenceId=='12')?'in active show':''}}">
                    <form id="add_manufacturing_packing" method="post" action="{{ route('add_manufacturing_packing_update') }}">
                        <input type="hidden" value="9" name="sequenceId">
                        <input type="hidden" value="{{$packingmateria->id}}" name="id">
                        @csrf

                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="proName" class="active">Product Name</label>

                                    <!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)"> -->

                                    {{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","value"=>"$packingmateria->proName")) }}
                                    @if ($errors->has('proName'))
                                    <span class="text-danger">{{ $errors->first('proName') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="bmrNo" class="active">BMR No.</label>
                                    <input type="text" class="form-control" name="bmrNo" value="{{$packingmateria->bmrNo}}" id="bmrNo">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="batchNo">Batch No.</label>
                                    <input type="text" class="form-control" name="batchNo" value="{{$packingmateria->batchNo}}" id="batchNo" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="refMfrNo">Ref. MFR No.</label>
                                    <input type="text" class="form-control" name="refMfrNo" value="{{$packingmateria->refMfrNo}}" id="refMfrNo" placeholder="Ref. MFR No.">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="ManufacturerDate" class="active">Date</label>
                                    <input type="date" class="form-control calendar" name="ManufacturerDate" value="{{$packingmateria->ManufacturerDate}}" id="ManufacturerDate" value={{ date("Y-m-d") }}>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group input_fields_wrap" value="{{$packingmateria->MaterialReceived}}" id="MaterialReceived">
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
                                                <input type="text" class="form-control" name="Observation" value="{{$packingmateria->Observation}}" id="Observation" placeholder="Observation">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="Temperature" class="active">Temperature ( <sup>o</sup>C) of Filling area</label>
                                                <input type="text" class="form-control" name="Temperature" value="{{$packingmateria->Temperature}}" id="Temperature" placeholder="Observation">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="Humidity" class="active">Humidity (%RH) of Filling area</label>
                                                <input type="text" class="form-control" name="Humidity" value="{{$packingmateria->Humidity}}" id="Humidity" placeholder="Observation">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="TemperatureP" class="active">Temperature ( <sup>o</sup>C) of Product</label>
                                                <input type="text" class="form-control" name="TemperatureP" value="{{$packingmateria->TemperatureP}}" id="TemperatureP" placeholder="Observation">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="50kgDrums" class="active">50 Kg No of Drums filled</label>
                                                <input type="Number" class="form-control" name="50kgDrums" value="{{$packingmateria['50kgDrums']}}" id="50kgDrums">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="200kgDrums" class="active">200 Kg No of Drums filled</label>
                                                <input type="Number" class="form-control" name="20kgDrums" id="20kgDrums" value="{{$packingmateria['20kgDrums']}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="startTime" class="active">Start Time (Hrs.)</label>
                                                <input type="number" class="form-control time" name="startTime" value="{{$packingmateria->startTime}}" id="startTime" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="EndstartTime" class="active">End Time (Hrs.)</label>
                                                <input type="number" class="form-control time" name="EndstartTime" value="{{$packingmateria->EndstartTime}}" id="EndstartTime" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="areaCleanliness">Done By</label>
                                                <input type="text" class="form-control" name="areaCleanliness" value="{{Auth::user()->name }}" id="areaCleanliness" value="{{ \Auth::user()->name }}" readonly>

                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="CareaCleanliness">Checked By</label>
                                                <input class="form-control" type="text" name="CareaCleanliness" value="{{Auth::user()->name }}" id="CareaCleanliness" value="{{ \Auth::user()->name }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group input_fields_wrap" value="{{$packingmateria->MaterialReceived}}" id="MaterialReceived">
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
                                                <input type="text" class="form-control" name="rmInput" value="{{$packingmateria->rmInput}}" id="rmInput" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="fgOutput" class="active">FG Output</label>
                                                <input type="text" class="form-control" name="fgOutput" value="{{$packingmateria->fgOutput}}" id="fgOutput" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="filledDrums" class="active">Filled in Drums (Kg)</label>
                                                <input type="text" class="form-control" name="filledDrums" value="{{$packingmateria->filledDrums}}" id="filledDrums" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="excessFilledDrums" class="active">Excess filled in drums</label>
                                                <input type="text" class="form-control" name="excessFilledDrums" value="{{$packingmateria->excessFilledDrums}}" id="excessFilledDrums" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="qcsampling" class="active">QC Sampling (Kg.)</label>
                                                <input type="text" class="form-control" name="qcsampling" value="{{$packingmateria->qcsampling}}" id="qcsampling" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="StabilitySample" class="active">Stability Sample (Kg.)</label>
                                                <input type="Number" class="form-control" name="StabilitySample" value="{{$packingmateria->StabilitySample}}" id="StabilitySample" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="WorkingSlandered" class="active">Working Slandered</label>
                                                <input type="text" class="form-control" name="WorkingSlandered" value="{{$packingmateria->WorkingSlandered}}" id="WorkingSlandered" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="ValidationSample" class="active">Validation Sample</label>
                                                <input type="text" class="form-control" name="ValidationSample" value="{{$packingmateria->ValidationSample}}" id="ValidationSample" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="CustomerSample" class="active">Filled in Jerry can / Drum (Kg.) (Customer Sample)</label>
                                                <input type="text" class="form-control" name="CustomerSample" value="{{$packingmateria->CustomerSample}}" id="CustomerSample" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="ActualYield" class="active">Actual Yield [(Output/Input)*100]</label>
                                                <input type="text" class="form-control" name="ActualYield" value="{{$packingmateria->ActualYield}}" id="ActualYield" placeholder="98.00 / 102.00%">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="checkedBy">Checked By</label>
                                                <input type="text" class="form-control" name="checkedBy" value="{{Auth::user()->name }}" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>

                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="ApprovedBy">Approved By</label>
                                                <input type="text" class="form-control" name="ApprovedBy" value="{{Auth::user()->name }}" id="ApprovedBy" value="{{ \Auth::user()->name }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Remark" class="active">Note / Remark</label>
                                    <textarea class="form-control" name="Remark" value="{{$packingmateria->Remark}}" id="Remark" placeholder="Note / Remark">{{$packingmateria->Remark}}</textarea>
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
                @endif
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
                $(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="rawMaterialName[' + x + ']" class="active">Raw Material</label><select class="form-control select" name="rawMaterialName[]" id="rawMaterialName[' + x + ']"><option>Select</option><option>Material Name</option></select></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity[' + x + ']" class="active">Quantity (Kg.)</label><input type="text" class="form-control" name="Quantity[]" id="Quantity[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="arNo[' + x + ']" class="active">AR No.</label><input type="text" class="form-control" name="arNo[]" id="arNo[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="date[' + x + ']" class="active">Date</label><input type="date" class="form-control calendar" name="date[]" id="date[' + x + ']" value={{ date("Y-m-d") }}></div></div>'); //add input box
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
    $(document).ready(function() {
        var max_fields = 15; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_9"); //Fields wrapper
        var add_button = $(".add_field_button_9"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="PackingMaterialName" class="active">Raw Material Name</label><input type="text" class="form-control" name="PackingMaterialName[]" id="PackingMaterialName" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity" class="active">Quantity (Kg.)</label><input type="text" class="form-control" name="Quantity[]" id="Quantity" placeholder=""></div></div></div></div>'); //add input box
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
