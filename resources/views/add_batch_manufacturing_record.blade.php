@extends("layouts.app")
@section('title', 'Add batch Manufacture')
@section('content')


    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row page-heading">
                    <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                        <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Add Batch
                            Manufacturing Records</h4>
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

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> {{ $message }}</strong>
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
                        @if (isset($batch) && $batch)
                            <li class="dropdown"><a role="tab" class="dropdown-toggle" data-toggle="dropdown"
                                    href="#">Raw Material<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a role="tab" data-toggle="tab" href="#requisition">Requisition</a></li>
                                    <li><a role="tab" data-toggle="tab" href="#issualofrequisition">Issual of
                                            requisition</a></li>
                                    <!--<li><a role="tab" data-toggle="tab" href="#billOfRawMaterial">Bill of Raw Material</a></li>-->
                                </ul>
                            </li>

                            <li class="dropdown"><a role="tab" class="dropdown-toggle" data-toggle="dropdown"
                                    href="#">Packing Material<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a role="tab" data-toggle="tab" href="#requisitionpacking">Requisition</a></li>
                                    <li><a role="tab" data-toggle="tab" href="#issualofrequisitionpacking">Issual of
                                            requisition</a></li>
                                    <!--<li><a role="tab" data-toggle="tab" href="#billOfRawMaterialpacking">Bill of Packing Raw Material</a></li>-->
                                </ul>
                            </li>

                            <li><a role="tab" data-toggle="tab" href="#listOfEquipment">List of Equipment</a></li>
                            <li><a role="tab" data-toggle="tab" href="#addLots_listing">Lots </a></li>

                            <li><a role="tab" data-toggle="tab" href="#homogenizing">Homogenizing</a></li>
                            <li><a data-toggle="tab" href="#Packing">Packing</a></li>
                            <li><a data-toggle="tab" href="#generate_label">Generate Label</a></li>
                        @endif
                    </ul>
                    <div class="tab-content">
						<?php
						$proId = isset($batchdetails['proName']) ? $batchdetails['proName'] : '';
						$proName = isset($product[$proId]) ? $product[$proId] : 'Choose Product Name';
						?>

						@include("batch.addbatch")
                        @include("batch.addrequisition")
                        @include("batch.addrequisitionpacking")
						@include("batch.addlistOfEquipment")
						@include("batch.addhomogenizing")
						@include("batch.addaddLots_listing")
						@include("batch.addPacking")
						@include("batch.addgenerate_label")

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')

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
                    $(wrapper).append(
                        '<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' +
                        x +
                        '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="rawMaterialName[' +
                        x +
                        ']" class="active">Raw Material</label><select class="form-control select" name="rawMaterialName[]" id="rawMaterialName[' +
                        x +
                        ']"><option>Select</option><option>Material Name</option></select></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="batchNo[' +
                        x +
                        ']" class="active">Batch No.</label><select class="form-control select" name="batchNo[]" id="batchNo[' +
                        x +
                        ']"><option>Select</option><option>RFLX</option></select></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity[' +
                        x +
                        ']" class="active">Quantity (Kg.)</label><input type="number" class="form-control" name="Quantity[]" id="Quantity[' +
                        x +
                        ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="arNo[' +
                        x +
                        ']" class="active">AR No.</label><input type="text" class="form-control" name="arNo[]" id="arNo[' +
                        x +
                        ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="date[' +
                        x +
                        ']" class="active">Date</label><input type="date" class="form-control calendar" name="date[]" id="date[' +
                        x + ']" value={{ date('Y-m-d') }}></div></div>'); //add input box
                }
                feather.replace()
            });

            $(document).ready(function() {
                var max_fields = 15; //maximum input boxes allowed
                var wrapper = $(".input_fields_wrap"); //Fields wrapper
                var add_button = $(".add_field_button_packing"); //Add button ID

                var x = 1; //initlal text box count
                $(add_button).click(function(e) { //on add input button click
                    e.preventDefault();
                    if (x < max_fields) { //max input box allowed
                        x++; //text box increment
                        $(wrapper).append(
                            '<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' +
                            x +
                            '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="PackingMaterialName[' +
                            x +
                            ']" class="active">Raw Material</label><select class="form-control select" name="PackingMaterialName[]" id="packingmaterials[' +
                            x +
                            ']"><option>Select</option><option>Material Name</option></select></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="batchNo[' +
                            x +
                            ']" class="active">Batch No.</label><select class="form-control select" name="batchNo[]" id="batchNo[' +
                            x +
                            ']"><option>Select</option><option>RFLX</option></select></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity[' +
                            x +
                            ']" class="active">Quantity (Kg.)</label><input type="number" class="form-control" name="Quantity[]" id="Quantity[' +
                            x +
                            ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="arNo[' +
                            x +
                            ']" class="active">AR No.</label><input type="text" class="form-control" name="arNo[]" id="arNo[' +
                            x +
                            ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="date[' +
                            x +
                            ']" class="active">Date</label><input type="date" class="form-control calendar" name="date[]" id="date[' +
                            x + ']" value={{ date('Y-m-d') }}></div></div>'); //add input box
                    }
                    feather.replace()
                });

                $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                    e.preventDefault();
                    $(this).parents('div.row').remove();
                    x--;
                })
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
                    $(wrapper).append(
                        '<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' +
                        x +
                        '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6"><div class="form-group"><label for="EquipmentName[' +
                        x +
                        ']" class="active">Equipment Name</label><select class="form-control select" name=EquipmentName[] id="eqipment_name' +
                        x + '" onchange="getcodes($(this).val(),' + x +
                        ')"><option>Select</option>@foreach ($eqipment_name as $key => $eq) <option value="{{ $key }}">{{ $eq }}</option>@endforeach<select></div></div><div class="col-12 col-md-6"><div class="form-group"><label for="EquipmentCode[' + x + ']" class="active">Equipment Code</label><select class="form-control select" name="EquipmentCode[]" id="eqipment_code' + x + '"><option>Select</option>@foreach ($eqipment_code as $key => $eq) <option value="{{ $key }}">{{ $eq }}</option>@endforeach</select></div></div></div>'
                        ); //add input box
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
                    $(wrapper).append(
                        '<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' +
                        x +
                        '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-4"><div class="form-group"><label for="EquipmentName[' +
                        x +
                        ']" class="active">Particulars</label><select class="form-control select" name="EquipmentName[]" id="EquipmentName[' +
                        x +
                        ']"><option>Select</option><option>Area Cleanliness Checked</option><option>Temperature(<sup>o</sup>C)</option><option>Humidity (%RH)</option></select></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="Observation[' +
                        x +
                        ']" class="active">Observation</label><input type="text" class="form-control" name="Observation[]" id="Observation[' +
                        x +
                        ']" placeholder="" value=""></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="time[' +
                        x +
                        ']" class="active">Time (Hrs)</label><input type="text" class="form-control" name="time[]" id="time[' +
                        x + ']" placeholder="" value=""></div></div></div>'); //add input box
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

            var x =
                '{{ isset($raw_material_bills) && count($raw_material_bills) > 0 ? count($raw_material_bills) : 1 }}'; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append(
                        '<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' +
                        x +
                        '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-4"><div class="form-group"><label for="MaterialName' +
                        x +
                        '" class="active">Raw Material</label><select class="form-control select" id="MaterialName' +
                        x + '" onchange="getbatchlot($(this).val(),' + x +
                        ')"><option>Select Raw Material</option>@if (isset($stock)) @foreach ($stock as $key => $value) <option value="{{ $key }}">{{ $value }}</option> @endforeach @endif</select></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="rmbatchno' +
                        x +
                        '" class="active">Batch No.</label><select name="rmbatchno[]" class="form-control" id="rmbatchno' +
                        x +
                        '" placeholder="Choose Batch"><option>Choose Batch No</option></select></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="Quantity' +
                        x +
                        '" class="active">Quantity (Kg.)</label><input type="number" class="form-control" id="Quantity' +
                        x + '" placeholder="" value="" name="Quantity[]"></div></div></div>'
                        ); //add input box
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
                    $(wrapper).append(
                        '<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' +
                        x +
                        '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="PackingMaterialName[' +
                        x +
                        ']" class="active">Packing Material Name</label><input type="text" class="form-control" name="PackingMaterialName[]" id="PackingMaterialName[' +
                        x +
                        ']" placeholder="" value=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Capacity[' +
                        x +
                        ']" class="active">Capacity(Kg.)</label><input type="text" class="form-control" name="Capacity[]" id="Capacity[' +
                        x +
                        ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity[' +
                        x +
                        ']" class="active">Quantity (No)</label><input type="text" class="form-control" name="Quantity[]" id="Quantity[' +
                        x +
                        ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="arNo[' +
                        x +
                        ']" class="active">AR No.</label><input type="text" class="form-control" name="arNo[]"id="arNo[' +
                        x +
                        ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="ARDate[' +
                        x +
                        ']" class="active">Date</label><input type="date" class="form-control" name="ARDate[]" id="ARDate[' +
                        x + ']" value={{ date('Y-m-d') }}></div></div></div>'); //add input box
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
                    $(wrapper).append(
                        '<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' +
                        x +
                        '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="PackingMaterialName" class="active">Raw Material Name</label> {{ Form::select('rawMaterialName[]', $rawmaterials, old('rawMaterialName'), ['id' => 'rawMaterialName', 'class' => 'form-control', 'placeholder' => 'Raw Material Name']) }}</div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity" class="active">Quantity (Kg.)</label><input type="number" class="form-control" name="Quantity[]" id="Quantity' +
                        x + '" placeholder=""></div></div></div></div>'); //add input box
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
                    // checkedByI: "required",

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
                    //checkedByI: "Please  Enter The Name checkedBy",
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
                    /*Observation: "required",
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
                    ActualYield: "required",*/
                    checkedBy: "required",
                    ApprovedBy: "required",

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
            $("#material_requisition_slip").validate({
                rules: {
                    from: "required",
                    to: "required",
                    batchNo: "required",
                    Date: "required",
                    "rawMaterialName[]": "required",
                    "Quantity[]": "required",
                    checkedBy: "required",
                    ApprovedBy: "required",
                    batch_id: "required",

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

                },
            });
            $("#packing_material_requisition_slip").validate({
                rules: {
                    from: "required",
                    to: "required",
                    batchNo: "required",
                    Date: "required",
                    "rawMaterialName[]": "required",
                    "Quantity[]": "required",
                    checkedBy: "required",
                    ApprovedBy: "required",
                    batch_id: "required",

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

                },
            });

            $("#add_homogninge").validate({
                rules: {
                    proName: "required",
                    bmrNo: "required",
                    batchNo: "required",
                    refMfrNo: "required",
                    homoTank: "required",
                    "dateProcess[]": "required",
                    "lot[]": "required",
                    "qty[]": "required",
                    "stratTime[]": "required",
                    "endTime[]": "required",
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
            })

        });
        window.onload = function() {

            var url = document.location.toString();
            if (url.match('#')) {
                $('.nav-tabs li a').removeClass('active');
                $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show')
                $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').parent('li').addClass('active');
                current_page_URL = url;
                $("a").each(function() {
                    if ($(this).attr("href") !== "#") {
                        var target_URL = $(this).prop("href");
                        if (target_URL == current_page_URL) {
                            $('.nav-tabs a').parents('li, ul').removeClass('active');
                            if (url.split('#')[1] == "billOfRawMaterial" || url.split('#')[1] ==
                                "requisition" || url.split('#')[1] == "issualofrequisition")
                                $(this).parent().parent("a").addClass('active');
                            else
                                $(this).addClass('active');
                            return false;
                        }
                    }
                });


            }

            //Change hash for page-reload
            $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').on('shown', function(e) {
                window.location.hash = e.target.hash;

            });

        }

        function getbatchlot(val, pos) {
            $.ajax({
                url: '{{ route('getbatchofmaterial') }}',
                method: 'POST',
                data: {
                    "id": val,
                    "_token": '{{ csrf_token() }}'
                }
            }).success(function(data) {
                $("#rmbatchno" + pos).empty();
                var option = "<option value=''>Choose Batch No.</option>";
                $("#rmbatchno" + pos).append(option);

                $.each(data.batch, function(key, val) {

                    var option = "<option value='" + key + "'>" + val + "</option>";
                    $("#rmbatchno" + pos).append(option);
                });
            });
        }

        $("#batchNo").change(function(){


            $.ajax({
                url: '{{ route('checkbatchnoexits') }}',
                method: 'POST',
                data: {
                    "batch":$(this).val(),
                    "_token": '{{ csrf_token() }}'
                }
            }).success(function(data) {
                if(data.status == 0)
                {
                    $("#batchNo").val("");
                    $("#batchNo").focus();
                    swal("Exits !","This batch number already exists. Please check","warning");

                }
            });
        });

        function getcodes(val, pos) {
            $.ajax({
                url: '{{ route('getequipmentcode') }}',
                method: 'POST',
                data: {
                    "id": val,
                    "_token": '{{ csrf_token() }}'
                }
            }).success(function(data) {
                $("#eqipment_code" + pos).empty();
                var option = "<option value=''>Choose Equipment Code</option>";
                $("#eqipment_code" + pos).append(option);
                $.each(data.code, function(key, val) {
                    var option = "<option value='" + key + "'>" + val + "</option>";
                    $("#eqipment_code" + pos).append(option);
                });
            });
        }

        function getmatarialqtyandbatch(raw, index) {

            $.ajax({
                url: '{{ route('getmatarialqtyandbatch') }}',
                method: 'POST',
                data: {
                    "id": raw,
                    "_token": '{{ csrf_token() }}'
                }
            }).success(function(data) {
                $("#batchName" + index).empty()
                    .append('<option value="">Choose Batch...</option>')
                $.each(data.batch, function(key, val) {
                    var option = "<option value='" + key + "'>" + val + "</option>";

                    $("#batchName" + index).append(option);
                });
            })
        }
        $(document).ready(function() {
            var wrapper = $(".input_fields_wrap_16"); //Fields wrapper
            var max_fields =
            15; //maximum input boxes allowedvar add_button = $(".add_field_button_20"); //Add button ID
            var add_button = $(".add_field_button_16"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append(
                        '<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' +
                        x +
                        '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="PackingMaterialName" class="active">Packing Material Name</label><select name="PackingMaterialName[]" class="form-control select" id="material_name" onchange="getcapacity($(this).val(),'+x+')"><option value="">Packing Material Name</option>@foreach($packingmaterialsarr as $val)<option value="{{$val->id}}">{{$val->material_name}}</option>@endforeach</select></div></div><div class="col-12 col-md-6 col-lg-4"> <div class="form-group">  <label for="Capacity" class="active">Capacity (Kg.)</label> <input type="text" class="form-control" name="Capacity[]" id="Capacity'+x+'" placeholder=""> </div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity" class="active">Quantity (Kg.)</label><input type="number" class="form-control" name="Quantity[]" id="Quantity' +
                        x + '" placeholder=""></div></div></div></div>'); //add input box
                }
                feather.replace()
            });

            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parents('div.row').remove();
                x--;
            })
        });
    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#examplereq').DataTable();
            $('#examplereq_packing').DataTable();
            $('#examplereq_lots').DataTable();
            $("#examplereq_homogenizing").DataTable();
        });

        function getEquipementCode(val, id) {
            var id2 = id;
            if (val.value == 3) {
                $(".ct option[value='1']").remove();
                $(".ct option[value='2']").remove();
                $(id2).find('.ct').append(`<option value="3"> PR/FS/001 </option><option value="3"> PR/FS/002 </option>`);
            } else if (val.value == 2) {
                $(".ct option[value='3']").remove();
                $(".ct option[value='1']").remove();
                $('.ct').append(`<option value="2"> PR/BT/001 </option><option value="2"> PR/BT/002 </option>`);
            } else if (val.value == 1) {
                $(".ct option[value='2']").remove();
                $(".ct option[value='3']").remove();
                $(".ct option[value='1']").remove();
                $('.ct').append(`<option value="1"> PR/RC/001 </option><option value="1"> PR/RC/002 </option>`);
            }
        }
        $(document).ready(function() {
            var max_fields_20 = 15; //maximum input boxes allowed
            var wrapper_20 = $(".input_fields_wrap_20"); //Fields wrapper
            var add_button_20 = $(".add_field_button_20"); //Add button ID
            var x = 2; //initlal text box count
            $(add_button_20).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields_20) { //max input box allowed
                    x++; //text box increment
                    $(wrapper_20).append(
                        '<tr><td><input type="date" name="dateProcess[]" id="dateProcess[' + x +
                        ']" class="form-control" value="{{ date('Y-m-d') }}"></td>' +
                        '<td><input type="text" name="lot[]" id="lot' + x +
                        '" class="form-control" value=""></td>' +
                        '<td><input type="text" name="qty[]" id="qty[' + x +
                        ']" class="form-control" placeholder=""></td>' +
                        '<td><input type="time" name="stratTime[]" id="stratTime[' + x +
                        ']" class="form-control time" placeholder="" data-mask="00:00"></td>' +
                        '<td><input type="time" name="endTime[]" id="endTime[' + x +
                        ']" class="form-control itme" placeholder="" data-mask="00:00"></td>' +
                        'div class="input-group-btn"><button class="btn btn-danger remove_field_20" type="button"><i class="icon-remove" data-feather="x"></i></button></div>' +
                        '</tr>'); //add input box
                }
                feather.replace()
            });
            $(wrapper_20).on("click", ".remove_field_20", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parents('div.row').remove();
                x--;
            });
            //    setTimeout(function () {
            //     $('.alert').alert('close');
            // }, 5000);
        });

        function getcapacity(value, pos) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "POST",
                url: '{{ route('material_name_get') }}',

                data: {
                    _token: CSRF_TOKEN,
                    id: value
                },
                success: function(data) {
                    console.log(data.status);
                    $('#Capacity' + pos).val(data.capacity)


                }
            })
        }
    </script>
    <script src="{{ asset('assets/js/jquery.mask.js?v=2.1.1') }}"></script>
    <script>
        $(document).ready(function() {
            $(".time").mask('00:00');
            $(function() {
                $('input:text').keydown(function(e) {
                    if (e.keyCode == 1)
                        return false;

                });
            });
        });
    </script>

@endpush
