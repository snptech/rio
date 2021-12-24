<div id="listOfEquipment" class="tab-pane fade">
    <form id="add_batch_equipment_vali" method="post"
        action="{{ route('add_batch_equipment_insert') }}">
        @csrf

        <div class="form-row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="proName" class="active">Product Name</label>
                    <select name="proName" id="proName" readonly class="form-control select">
                        <option value="{{ $proId }}" class="form-control"
                            selected="selected">
                            {{ $proName }}
                        </option>
                    </select>
                    @if ($errors->has('proName'))
                        <span class="text-danger">{{ $errors->first('proName') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="bmrNo" class="active">BMR No.</label>

                    <input type="text" class="form-control" name="bmrNo" pattern="\d*"
                        maxlength="12" onkeypress=""
                        value="{{ isset($batchdetails->bmrNo) ? $batchdetails->bmrNo : old('bmrNo') }}"
                        readonly id="bmrNo" placeholder="BMR No.">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="batchNo">Batch No.</label>
                    <input type="text" class="form-control" name="batchNo" id="batchNo"
                        pattern="\d*" maxlength="12"
                        onkeypress=""
                        value="{{ isset($batchdetails->batchNo) ? $batchdetails->batchNo : old('batchNo') }}"
                        readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="refMfrNo">Ref. MFR No.</label>
                    <input type="text" class="form-control" name="refMfrNo" id="refMfrNo"
                        pattern="\d*" maxlength="12"
                        onkeypress=""
                        value="{{ isset($batchdetails->refMfrNo) ? $batchdetails->refMfrNo : old('refMfrNo') }}"
                        readonly placeholder="Ref. MFR No.">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="Remark" class="active">Note / Remark</label>
                    <textarea class="form-control" name="Remark" id="Remark"
                        placeholder="Note / Remark"></textarea>
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
                    @php $c = 1; @endphp
                    <div class="row add-more-wrap after-add-more m-0 mb-4" id="equipmentCode">
                        <span class="add-count">1</span>
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
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <input type="hidden" name="batch_id" id="batch_id"
                        value="{{ isset($batchdetails->id) ? $batchdetails->id : old('batch_id') }}" />
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