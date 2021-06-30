@extends("layouts.app")
@section("title","Add Manufacturing Record")
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Batch Manufacturing Records - Packing</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <form id="add_manufacturing" method="post" action="{{ route('add_manufacturing_update') }}">
                <input type="hidden" value="{{$edit_batchmanufacturing->id}}" name="id">
                @csrf

                <div class="form-row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="proName" class="active">Product Name</label>
                            <select class="form-control" name="proName" id="proName">
                            <option>{{$edit_batchmanufacturing->material_name}}</option>
                            @foreach ($product as $temp)
                            <option value="{{$temp->id}}">{{$temp->material_name}}</option>

                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="bmrNo" class="active">BMR No.</label>
                            <input type="text" class="form-control" name="bmrNo" value="{{$edit_batchmanufacturing->bmrNo}}" id="bmrNo" placeholder="BMR No.">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="batchNo">Batch No.</label>
                            <input type="text" class="form-control" name="batchNo" value="{{$edit_batchmanufacturing->batchNo}}" id="batchNo" placeholder="Batch No.">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="refMfrNo">Ref. MFR No.</label>
                            <input type="text" class="form-control" name="refMfrNo" value="{{$edit_batchmanufacturing->refMfrNo}}" id="refMfrNo" placeholder="Ref. MFR No.">
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
                                <!-- <option>{{$edit_batchmanufacturing->doneBy}}</option>
                                <option>Employee Name</option>
                            </select> -->
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="checkedBy">Checked by</label>
                                <input type="text" class="form-control select" name="checkedBy" value="{{Auth::user()->name }}" id="checkedBy" readonly>
                                <!-- <option>{{$edit_batchmanufacturing->checkedBy}}</option>
                                <option>Employee Name</option>
                            </select> -->
                            </div>
                        </div>

                        <!-- <div class="col-12">
                        <div class="form-group">
                            <label for="Remark" class="active">This batch has / has not been produced according to instruction given in MFR No. RCIPL/MFR/01/01</label>
                        </div>
                    </div> -->
                        <!-- <div class="col-12">
                        <div class="form-group">
                            <label for="ManufacturingDate" class="active">Deviation Sheet attached</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"  {{($edit_batchmanufacturing->inlineRadioOptions == 'Yes')?'checked':''}}  value="{{$edit_batchmanufacturing->inlineRadioOptions}}" id="inlineRadio1">
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" {{($edit_batchmanufacturing->inlineRadioOptions == 'No')?'checked':''}}  value="{{$edit_batchmanufacturing->inlineRadioOptions}}" id="inlineRadio2">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>

                        </div>
                    </div> -->

                        <!-- <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="approvalDate" class="active">This Batch is approved/not approved on</label>
                            <input type="date" class="form-control" name="approvalDate" value="{{$edit_batchmanufacturing->approvalDate}}" id="approvalDate" >
                        </div>
                    </div> -->

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="checkedByI">Reviewed and Approved by</label>
                                <input type="text" class="form-control select" name="checkedByI" value="{{Auth::user()->name }}" id="checkedByI" readonly>
                                <!-- <option>{{$edit_batchmanufacturing->checkedByI}}</option>
                                <option>Employee Name</option>
                            </select> -->
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="approval" class="active">This Batch is approved/not approved</label>
                                <select class="form-control select" name="approval" value="{{$edit_batchmanufacturing->approval}}" id="approval">
                                    <option>{{$edit_batchmanufacturing->approval}}</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Not Approved">Not Approved</option>
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
                            <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Clear</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>


@endsection
@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
@endpush
