<div id="listOfEquipment" class="tab-pane fade {{ $sequenceId == '8' ? 'in active show' : '' }}">
    <form id="add_batch_equipment_vali" method="post"
        action="{{ route('list_of_equipment_update') }}">
        <input type="hidden" value="8" name="sequenceId">
        <input type="hidden" value="{{ isset($res_data_1->id) ? $res_data_1->id : '' }}" name="id">
        <input type="hidden" value="{{ $edit_batchmanufacturing->id }}" name="mainid">
        @csrf
        <div class="form-row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="proName" class="active">Product Name</label>
                    {{ Form::select('proName', $product, old('proName'), ['class' => 'form-control select', 'id' => 'proName', 'value' => 'res_data_1->proName']) }}
                    @if ($errors->has('proName'))
                        <span class="text-danger">{{ $errors->first('proName') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="bmrNo" class="active">BMR No.</label>
                    <input type="text" class="form-control" name="bmrNo" id="bmrNo"
                        value="{{ isset($res_data_1->bmrNo) ? $res_data_1->bmrNo : $edit_batchmanufacturing->bmrNo }}"
                        pattern="\d*" maxlength="12"
                        onkeypress="return /[0-9a-zA-Z\s\\/-]/i.test(event.key)">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="batchNo">Batch No.</label>
                    <input type="text" class="form-control" name="batchNo" id="batchNo"
                        value="{{ $edit_batchmanufacturing->batchNo }}" readonly pattern="\d*"
                        maxlength="12" onkeypress="return /[0-9a-zA-Z\s\\/-]/i.test(event.key)"
                        readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="refMfrNo">Ref. MFR No.</label>
                    <input type="text" class="form-control" name="refMfrNo" id="refMfrNo"
                        value="{{ $edit_batchmanufacturing->refMfrNo }}" pattern="\d*" maxlength="12"
                        onkeypress="return /[0-9a-zA-Z\s\\/-]/i.test(event.key)" pattern="\d*"
                        maxlength="12" onkeypress="return /[0-9a-zA-Z\s\\/-]/i.test(event.key)"
                        readonly>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="Remark" class="active">Note / Remark</label>
                    <textarea class="form-control" name="Remark" id="Remark"
                        placeholder="Note / Remark">{{ isset($res_data->Remark) ? $res_data->Remark : '' }}</textarea>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group input_fields_wrap_1" id="MaterialReceived">
                    <label class="control-label d-flex">List of Equipment in Manufacturing Process
                        <div class="input-group-btn">
                            <button
                                class="btn btn-dark add-more add_field_button_1 waves-effect waves-light"
                                type="button">Add More +</button>
                        </div>
                    </label>
                    @php $c =1; @endphp
                    @if (isset($res_1) && count($res_1) > 0)

                        @foreach ($res_1 as $temp)

                            <div class="row add-more-wrap after-add-more m-0 mb-4">
                                <span class="add-count">1</span>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="EquipmentName" class="active">Equipment
                                            Name</label>
                                        {{ Form::select('EquipmentName[]', $eqipment_name, old('eqipment_name') ? old('eqipment_name') : $temp->EquipmentName, ['class' => 'form-control select', 'id' => 'eqipment_name' . $c, 'Placeholder' => 'Equipment Name', 'onchange' => "getcodes($(this).val()," . $c . ')']) }}

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="EquipmentCode" class="active">Equipment
                                            Code</label>
                                        {{ Form::select('EquipmentCode[]', $eqipment_code, old('EquipmentCode') ? old('EquipmentCode') : $temp->EquipmentCode, ['class' => 'form-control select', 'id' => 'eqipment_code' . $c, 'Placeholder' => 'Equipment Code']) }}


                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row add-more-wrap after-add-more m-0 mb-4">
                            <!-- <span class="add-count">1</span> -->
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="EquipmentName" class="active">Equipment
                                        Name</label>
                                    {{ Form::select('EquipmentName[]', $eqipment_name, old('eqipment_name'), ['class' => 'form-control select', 'id' => 'eqipment_name1', 'Placeholder' => 'Equipment Name', 'onchange' => "getcodes($(this).val()," . $c . ')']) }}

                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="EquipmentCode" class="active">Equipment
                                        Code</label>
                                    {{ Form::select('EquipmentCode[]', $eqipment_code, old('EquipmentCode'), ['class' => 'form-control select', 'id' => 'eqipment_code1', 'Placeholder' => 'Equipment Code']) }}

                                </div>
                            </div>
                        </div>
                    @endif


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