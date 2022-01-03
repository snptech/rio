<div id="requisition" class="tab-pane fade {{ $sequenceId == '2' ? 'in active show' : '' }}">
    <form id="material_requisition_slip" method="post"
        action="{{ route('packing_material_requisition_slip_update') }}">
        <input type="hidden" value="2" name="sequenceId">
        <input type="hidden" value="{{ isset($requestion->id) ? $requestion->id : '' }}" name="id">
        <input type="hidden" value="{{ $edit_batchmanufacturing->id ? $edit_batchmanufacturing->id : '' }}"
            name="mainid">

        @csrf
        <div class="form-row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="from" class="active">From</label>
                    {{ Form::select('from', $department, old('from') ? old('from') : (isset($requestion->from) ? $requestion->from : 2), ['class' => 'form-control select', 'id' => 'from']) }}

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="to" class="active">To</label>
                    {{ Form::select('to', $department, old('from') ? old('from') : (isset($requestion->to) ? $requestion->to : 3), ['class' => 'form-control select', 'id' => 'to']) }}

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="batchNo">Batch No.</label>
                    <input type="text" class="form-control" name="batchNo" id="batchNo"
                        value="{{ isset($edit_batchmanufacturing->batchNo) ? $edit_batchmanufacturing->batchNo : '' }}"
                        readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="Date" class="active">Date</label>
                    <input type="date" class="form-control calendar" name="Date" id="Date"
                        value="{{ isset($requestion->Date) ? $requestion->Date : date('Y-m-d') }}">
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group input_fields_wrap_9" id="MaterialReceived">
                    <label class="control-label d-flex">Material Detail
                        <div class="input-group-btn">
                            <button
                                class="btn btn-dark add-more add_field_button_9 waves-effect waves-light"
                                type="button">Add More +</button>
                        </div>
                    </label>
                    @if (isset($requestion_details))
                        @foreach ($requestion_details as $temp)
                            <div class="row add-more-wrap after-add-more m-0 mb-4">
                                <span class="add-count">1</span>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="PackingMaterialName" class="active">Raw
                                            Material Name</label>

                                        {{ Form::select('PackingMaterialName[]', $rawmaterials, old($temp->PackingMaterialName), ['class' => 'form-control select', 'id' => 'material_name']) }}

                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="Quantity" class="active">Quantity
                                            (Kg.)</label>
                                        <input type="number" class="form-control" name="Quantity[]"
                                            id="Quantity" value="{{ $temp->Quantity }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row add-more-wrap after-add-more m-0 mb-4">
                            <span class="add-count">1</span>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="PackingMaterialName" class="active">Raw
                                        Material Name</label>

                                    {{ Form::select('PackingMaterialName[]', $rawmaterials, old(), ['class' => 'form-control select', 'id' => 'material_name',"placeholder"=>"Raw Material"]) }}

                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="Quantity" class="active">Quantity (Kg.)</label>
                                    <input type="number" class="form-control" name="Quantity[]"
                                        id="Quantity" value="">
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
                        placeholder="Note / Remark">{{ isset($requestion->Remark) ? $requestion->Remark : '' }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light" name="submit" value="submit">Submit
                        & Next</button><button type="clear"
                        class="btn btn-light btn-md form-btn waves-effect waves-light" name="save_q" value="save_q">Save &
                        Quite</button>
                </div>
            </div>
        </div>
    </form>
</div>