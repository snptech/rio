<div id="requisitionpacking" class="tab-pane fade {{ $sequenceId == '5' ? 'in active show' : '' }}">
    <form id="packing_material_requisition_slip" method="post"
        action="{{ route('packing_material_requisition_slip_update_1') }}">
        <input type="hidden" value="6" name="sequenceId">
        <input type="hidden"
            value="{{ isset($edit_batchmanufacturing->id) ? $edit_batchmanufacturing->id : '' }}"
            name="id">
        <input type="hidden" value="{{ isset($requestion_packing->id) ? $requestion_packing->id : 0 }}"
            name="packingid">
        @csrf
        <div class="form-row">

            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="from" class="active">From </label>{{-- "value"=>"$temp->from" --}}
                    {{ Form::select('from', $department, old('from') ? old('from') : 2, ['class' => 'form-control select', 'id' => 'from']) }}
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="to" class="active">To</label>{{-- ,"value"=>"$temp->to" --}}
                    {{ Form::select('to', $department, old('to') ? old('to') : 3, ['class' => 'form-control select', 'id' => 'to']) }}
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="batchNo">Batch No.</label>
                    <input type="text" class="form-control"
                        value="{{ isset($edit_batchmanufacturing->batchNo) ? $edit_batchmanufacturing->batchNo : old('batchNo') }}"
                        name="batchNo" id="batchNo" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="Date" class="active">Date</label>
                    <input type="date" class="form-control calendar"
                        value="{{ isset($requestion_packing->Date) ? $requestion_packing->Date : date('Y-m-d') }}"
                        name="Date" id="Date" value={{ date('Y-m-d') }}>
                </div>
            </div>



            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group input_fields_wrap_6" id="MaterialReceived">
                    <label class="control-label d-flex">Material Detail
                        <div class="input-group-btn">
                            <button
                                class="btn btn-dark add-more add_field_button_6 waves-effect waves-light"
                                type="button">Add More +</button>
                        </div>
                    </label>
                    @php $p = 1; @endphp
                    @if (isset($requestion_details_packing) && count($requestion_details_packing) > 0)
                        @foreach ($requestion_details_packing as $temp)
                            <div class="row add-more-wrap after-add-more m-0 mb-4">
                                <span class="add-count">1</span>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">

                                        <label for="PackingMaterialName" class="active">Packing
                                            Material Name</label>
                                        {{ Form::select('PackingMaterialName[]', $packingmaterials, old($temp->PackingMaterialName), ['class' => 'form-control select', 'id' => 'packing_material_name' . $p, 'placeholder' => 'Choose Material Name', 'onchange' => "getcapacity($(this).val()," . $p . ')']) }}

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="Capacity" class="active">Capacity
                                            (Kg.)</label>
                                        <input type="text" class="form-control" name="Capacity[]"
                                            id="Capacity{{ $p }}"
                                            value="{{ $temp->Capacity }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="Quantity" class="active">Quantity</label>
                                        <input type="number" class="form-control" name="Quantity[]"
                                            id="Quantity" placeholder="" value="{{ $temp->Quantity }}">
                                    </div>
                                </div>
                            </div>
                            @php $p++; @endphp
                        @endforeach
                    @else
                        <div class="row add-more-wrap after-add-more m-0 mb-4">
                            <span class="add-count">1</span>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="PackingMaterialName" class="active">Packing
                                        Material Name</label>
                                    {{ Form::select('PackingMaterialName[]', $packingmaterials, old('PackingMaterialName'), ['class' => 'form-control select capacity_stock', 'id' => 'packing_material_name' . $p, 'placeholder' => 'Choose Material Name', 'onchange' => "getcapacity($(this).val()," . $p . ')']) }}

                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="Capacity" class="active">Capacity (Kg.)</label>
                                    <input type="text" class="form-control" name="Capacity[]"
                                        id="Capacity{{ $p }}" value="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="Quantity" class="active">Quantity</label>
                                    <input type="number" class="form-control" name="Quantity[]"
                                        id="Quantity" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="checkedBy">Checked By</label>
                    <input type="text" class="form-control select" name="checkedBy" id="checkedBy"
                        value="{{ \Auth::user()->name }}" readonly>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="ApprovedBy">Approved By</label>
                    <input type="text" class="form-control select" name="ApprovedBy" id="ApprovedBy"
                        value="{{ \Auth::user()->name }}" readonly>

                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="Remark" class="active">Note / Remark</label>
                    <textarea class="form-control" name="Remark" id="Remark"
                        placeholder="Note / Remark"> {{ isset($requestion->Remark) ? $requestion->Remark : '' }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit &
                        Next</button><button type="clear"
                        class="btn btn-light btn-md form-btn waves-effect waves-light">Save &
                        Quite</button>
                </div>
            </div>
        </div>
    </form>
</div>