
@extends('layouts.app')
@section('content')
<div class="col-md-12">
    @if ($message = Session::get('success'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
</div>
<!-- Main Container -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="hard-drive"></i>Issued by Stores for Production (Annexure - III)</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <form id="packing_material_requisition_slip" method="post" action="{{ route('packing_material_requisition_slip_approved',["id"=>$issue_material->id]) }}">
            @csrf
            <div class="form-row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="from" class="active">From</label>
                            <input type="text" name="from" id="from" class="form-control" value="{{ $issue_material->fromdepartmet }}" readonly>


                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="to" class="active">To</label>
                            <input type="text" name="to" id="to" class="form-control" value="{{ $issue_material->todepartmet }}" readonly>

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="batchNo">Batch No.</label>
                            <input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Batch No." value="{{ isset($issue_material->batchNo)?$issue_material->batchNo:old("batchNo") }}" readonly>
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
                            <label class="control-label d-flex">Material Detail <br />
<div class="input-group-btn">&nbsp;</div>
                            </label>
                            @if(isset($material_details) && $material_details)
                            @php $i=1 @endphp
                            @foreach ($material_details as $mat)
                            @php
                                $batch  = "";
                                $batch = App\Models\Rawmaterialitems::where("material",$mat->PackingMaterialName)->pluck("batch_no","id");
                            @endphp
                            <div class="row add-more-wrap after-add-more m-0 mb-4">
                                <!-- <span class="add-count">{{ $i }}</span> -->
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="PackingMaterialName" class="active">Raw Material Name</label>
                                        <input type="text" class="form-control" name="material_name{{ $mat->details_id }}" id="material_name{{ $i }}" value="{{ $mat->material_name }}" readonly>
                                        <input type="hidden" class="form-control" name="material_name_id{{ $mat->details_id }}" id="material_name_id{{ $i }}" value="{{ $mat->PackingMaterialName }}" readonly>

                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="Quantity" class="active">Requestion Quantity (Kg.)</label>
                                        <input type="text" class="form-control" name="Quantity{{ $mat->details_id }}" id="Quantity{{ $i }}" placeholder="" value="{{$mat->Quantity}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <section class="input_fields_wrap_4{{$i}}">
                            <div class="text-right m-0 mb-4">
                                <button type="button" class="btn-primary add_field_button" data-id="input_fields_wrap_4{{$i}}">+ Add More</button>
                            </div>
                            <div class="row add-more-wrap after-add-more m-0 mb-4">
                                <span class="add-count">{{ $i }}</span>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="rBatch" class="active">Raw Material Batch</label>
                                        {{ Form::select("rBatch".$mat->details_id,$batch,old("rBatch".$mat->details_id),array("id" =>"rBatch".$i,"placeholder"=>"Choose Batch number","class"=>"form-control","onchange"=>"getarnoandqty($(this).val(),".$mat->PackingMaterialName.",".$i.")")) }}


                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="arno" class="active">A.R.N. Number/Date</label>
                                        <input type="text" class="form-control" name="arno{{ $mat->details_id }}" id="arno{{ $i }}" placeholder="A.R.N. Number/Date" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="Quantity" class="active">Approved Quantity (Kg.)</label>
                                        <input type="text" class="form-control" name="Quantity_app{{ $mat->details_id }}" id="Quantity_app{{ $i }}" placeholder="Enter Approved Qty" value="">
                                        <input type="hidden" name="details_id{{ $mat->details_id }}" value="{{ $mat->details_id }}">
                                    </div>
                                </div>
                            </div>
                            </section>
                            @php $i++; @endphp
                            @endforeach
                            @endif
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
                            <input type="hidden" name="batch_id" id="batch_id" value="{{ isset($issue_material->id)?$issue_material->id:old("batch_id") }}" />
                            <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Clear</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('custom-scripts')
<script>
    $(document).ready(function() {
        var k=0;
        var max_fields      = 16; //maximum input boxes allowed
        var wrapper         =  '.'+ $(".add_field_button").data('id');// $(".input_fields_wrap_4"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        
        var x = 0; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                k++;
                wrapper         =  '.'+ $(this).data('id');
                $(wrapper).append('<div class="row add-more-wrap add-more-new input_fields_wrap_4{{$i}} m-0 mb-4 extraDiv_'+k+'">'+'<div class="input-group-btn"><button class="btn btn-danger remove_field" onclick="removedIV('+k+')" type="button"><i class="icon-remove" data-feather="x" data-id="input_fields_wrap_4{{$i}}"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity['+x+']" class="active">Raw Material Batch</label> {{Form::select("rBatch".$mat->details_id, $batch, old("rBatch".$mat->details_id), array("id" =>"rBatch['+x+']","placeholder" => "Choose Batch number", "class"=>"form-control","onchange"=>"getarnoandqty($(this).val(), ".$mat->PackingMaterialName.",'+x+')")) }}</div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity" class="active">A.R.N. Number/Date</label><input type="text" class="form-control" name="arno[{{ $mat->details_id }}]" id="arno'+x+'" placeholder="A.R.N. Number/Date" value=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity" class="active">Approved Quantity (Kg.)</label><input type="text" class="form-control" name="Quantity_app[{{ $mat->details_id }}]" id="Quantity_app'+x+'" placeholder="Enter Approved Qty" value=""><input type="hidden" name="details_id[{{ $mat->details_id }}]" value="{{ $mat->details_id }}"></div></div></div>');
            } //add mulptple raw material
            feather.replace()
            wrapper         =  '.'+ $(this).data('id');
        });
        // $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            
        //     e.preventDefault(); $(this).parents('div.row').remove(); x--;
        // });
    });
    function removedIV(did){
        $('.extraDiv_'+did).remove();
    }

    function getarnoandqty(batch,material,postion) {
        var material = material;
        var batch = batch;
        var postion = postion;
        $.ajax({
             url:'{{ route('getmatarialqtyofbatchwitharno') }}',
             method:'POST',
             data:{
                 "id":batch,
                 "rawmaterial":material,
                 "_token":'{{ csrf_token() }}'
             }
         }).success(function(data){

            $("#Quantity_app"+postion).val(data.qty);
            $("#arno"+postion).val(data.arno);

         })
    }
    $("#packing_material_requisition_slip").validate({
            rules: {
                from:"required",
                to:"required",
                batchNo:"required",
                Date:"required",
                @if(isset($material_details) && $material_details)
                @foreach ($material_details as $mat)
                "material_name{{ $mat->details_id }}":"required",
                "rBatch{{ $mat->details_id }}":"required",
                "arno{{ $mat->details_id }}":"required",
                "Quantity_app{{ $mat->details_id }}": "required",
                "details_id{{ $mat->details_id }}":"required",
                @endforeach
                @endif
                checkedBy: "required",
                ApprovedBy:"required"

            },
            messages: {
                from: "Please select from option",
                to: "Please select to option",
                batchNo: "Please enter the batch number",
                Date: "Please enter the date",
                @if(isset($material_details) && $material_details)
                @foreach ($material_details as $mat)
                "material_name{{ $mat->details_id }}": "Please  Enter material name",
                "rBatch{{ $mat->details_id }}": "Please select a batch number",
                "arno{{ $mat->details_id }}": "Please  Enter The Ar Number/Date ",
                "Quantity_app{{ $mat->details_id }}": "Please  Enter The approved Quantity ",
                "details_id{{ $mat->details_id }}": "Please  Enter details id",
                @endforeach
                @endif
                checkedBy: "Please  Enter The checked by",
                ApprovedBy: "Please  Enter The approved by",

            },
        });
</script>
@endpush
