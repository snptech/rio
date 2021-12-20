<div id="generate_label" class="tab-pane fade {{ $sequenceId == '13' ? 'in active show' : '' }}">
    <form id="add_manufacturing_generate_label" method="post"
        action="{{ route('add_manufacturing_generate_update') }}">
        <input type="hidden" value="13" name="sequenceId">
        <input type="hidden" value="{{ isset($edit_ganerat_lable->id) ? $edit_ganerat_lable->id : '' }}"
            name="id">
        <input type="hidden"
            value="{{ isset($edit_batchmanufacturing->id) ? $edit_batchmanufacturing->id : '' }}"
            name="batch_id">

        @csrf

        <div class="form-row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="proName" class="active">Product Name</label>

                    <!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)"> -->
                    {{ Form::select('proName', $product, old('proName') ? old('proName') : $edit_batchmanufacturing->proName, ['class' => 'form-control select', 'id' => 'proName']) }}
                    @if ($errors->has('proName'))
                        <span class="text-danger">{{ $errors->first('proName') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="bmrNo" class="active">BMR No.</label>
                    <input type="text" class="form-control" name="bmrNo" id="bmrNo"
                        value="{{ isset($edit_batchmanufacturing->bmrNo) ? $batchdetails->bmrNo : old('bmrNo') }}"
                        readonly pattern="\d*" maxlength="12"
                        onkeypress="return /[0-9a-zA-Z\s\\/-]/i.test(event.key)" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="batchNo">Batch No.</label>
                    <input type="text" class="form-control" name="batchNo" id="batchNo"
                        value="{{ isset($edit_batchmanufacturing->batchNo) ? $batchdetails->batchNo : old('batchNo') }}"
                        readonly pattern="\d*" maxlength="12"
                        onkeypress="return /[0-9a-zA-Z\s\\/-]/i.test(event.key)" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="refMfrNo">Ref. MFR No.</label>
                    <input type="text" class="form-control" name="refMfrNo" id="refMfrNo"
                        value="{{ isset($edit_batchmanufacturing->refMfrNo) ? $batchdetails->refMfrNo : old('refMfrNo') }}"
                        readonly pattern="\d*" maxlength="12"
                        onkeypress="return /[0-9a-zA-Z\s\\/-]/i.test(event.key)" readonly>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group input_fields_wrap" id="MaterialReceived">
                    <label class="control-label d-flex">Product Label

                    </label>
                    <div class="row add-more-wrap after-add-more m-0 mb-4">
                        <!-- <span class="add-count">1</span> -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="simethicone" class="active">Simethicone</label>
                                <input type="text" class="form-control" name="simethicone"
                                    id="simethicone"
                                    value="{{ isset($edit_ganerat_lable->simethicone) ? $edit_ganerat_lable->simethicone : '' }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="batch_no_I" class="active">Batch No</label>
                                <input type="text" class="form-control" name="batch_no_I"
                                    value="{{ isset($edit_ganerat_lable->batch_no_I) ? $edit_ganerat_lable->batch_no_I : $edit_batchmanufacturing->batchNo }}"
                                    id="batch_no_I" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="mfg_date" class="active">MFG Date</label>
                                <input type="date" class="form-control" name="mfg_date" id="mfg_date"
                                    value="{{ isset($edit_ganerat_lable->mfg_date) ? $edit_ganerat_lable->mfg_date : $edit_batchmanufacturing->ManufacturingDate }}"
                                    placeholder="">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="retest_date" class="active">Retest Date</label>
                                <input type="date" class="form-control" name="retest_date"
                                    id="retest_date"
                                    value="{{ isset($edit_ganerat_lable->retest_date) ? $edit_ganerat_lable->retest_date : $edit_batchmanufacturing->RetestDate }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="net_wt" class="active">Net Wt</label>
                                <input type="text" class="form-control" name="net_wt" id="net_wt"
                                    value="{{ isset($edit_ganerat_lable->net_wt) ? $edit_ganerat_lable->net_wt : $edit_batchmanufacturing->BatchSize }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="tare_wt" class="active">Tare Wt</label>
                                <input type="text" class="form-control" name="tare_wt"
                                    value="{{ isset($edit_ganerat_lable->tare_wt) ? $edit_ganerat_lable->tare_wt : '' }}"
                                    id="tare_wt" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="Remark" class="active">Note / Remark</label>
                    <textarea class="form-control" name="Remark" id="Remark"
                        placeholder="Note / Remark"> {{ isset($edit_ganerat_lable->Remark) ? $edit_ganerat_lable->Remark : '' }}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <input type="hidden" name="batch_id" id="batch_id"
                        value="{{ isset($batchdetails->id) ? $batchdetails->id : old('batch_id') }}" />
                    <button type="submit"
                        class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit</button><button
                        type="clear"
                        class="btn btn-light btn-md form-btn waves-effect waves-light">Clear</button>
                </div>
            </div>
        </div>
</div>