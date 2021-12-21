<div id="generate_label" class="tab-pane fade">
    <form id="add_manufacturing_generate_label" method="post"
        action="{{ route('add_manufacturing_generate_label_insert') }}">
        @csrf

        <div class="form-row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="proName" class="active">Product Name</label>

                    <!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)"> -->
                    <select name="proName" id="proName" readonly class="form-control select">
                        <option value="{{ $proId }}" class="form-control"
                            selected="selected">
                            {{ $proName }}
                        </option>
                    </select>
                    {{-- {{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","placeholder"=>"Choose Product Name")) }} --}}
                    @if ($errors->has('proName'))
                        <span class="text-danger">{{ $errors->first('proName') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="bmrNo" class="active">BMR No.</label>
                    <input type="text" class="form-control" name="bmrNo" id="bmrNo" pattern="\d*"
                        maxlength="12" onkeypress="return /[0-9a-zA-Z\s\\/-]/i.test(event.key)"
                        value="{{ isset($batchdetails->bmrNo) ? $batchdetails->bmrNo : old('bmrNo') }}"
                        readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="batchNo">Batch No.</label>
                    <input type="text" class="form-control" name="batchNo" id="batchNo"
                        pattern="\d*" maxlength="12"
                        onkeypress="return /[0-9a-zA-Z\s\\/-]/i.test(event.key)"
                        value="{{ isset($batchdetails->batchNo) ? $batchdetails->batchNo : old('batchNo') }}"
                        readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="refMfrNo">Ref. MFR No.</label>
                    <input type="text" class="form-control" name="refMfrNo" id="refMfrNo"
                        pattern="\d*" maxlength="12"
                        onkeypress="return /[0-9a-zA-Z\s\\/-]/i.test(event.key)"
                        value="{{ isset($batchdetails->refMfrNo) ? $batchdetails->refMfrNo : old('refMfrNo') }}"
                        readonly>
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
                                    id="simethicone" placeholder="Simethicone">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="batch_no_I" class="active">Batch No</label>
                                <input type="text" class="form-control" name="batch_no_I"
                                    id="batch_no_I" placeholder="Batch No"
                                    value="{{ isset($batchdetails->batchNo) ? $batchdetails->batchNo : old('batchNo') }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="mfg_date" class="active">MFG Date</label>
                                <input type="date" class="form-control" name="mfg_date"
                                    id="mfg_date"
                                    value="{{ isset($batchdetails->ManufacturingDate) ? $batchdetails->ManufacturingDate : date('Y-m-d') }}"
                                    placeholder="MFG Date">
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="retest_date" class="active">Retest Date</label>
                                <input type="date" class="form-control" name="retest_date"
                                    id="retest_date"
                                    value="{{ isset($batchdetails->RetestDate) ? $batchdetails->RetestDate : date('Y-m-d') }}"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="net_wt" class="active">Net Wt</label>
                                <input type="text" class="form-control" name="net_wt" id="net_wt"
                                    placeholder="{{ isset($batchdetails) ? $batchdetails->BatchSize : '' }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="tare_wt" class="active">Tare Wt</label>
                                <input type="text" class="form-control" name="tare_wt"
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
                        placeholder="Note / Remark"></textarea>
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