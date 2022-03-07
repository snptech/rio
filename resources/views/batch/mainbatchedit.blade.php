<div id="batch" class="tab-pane fade {{ $sequenceId == '1' ? 'in active show' : '' }}">
    <form id="add_manufacturing" method="post" action="{{ route('add_manufacturing_update') }}">
        <input type="hidden" value="1" name="sequenceId">
        <input type="hidden" value="{{ $edit_batchmanufacturing->id }}" name="id">
        @csrf

        <div class="form-row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="proName" class="active">Product Name</label>
                    {{ Form::select('proName', $product, old('proName') ? old('proName') : $edit_batchmanufacturing->proName, ['class' => 'form-control select', 'id' => 'material_name']) }}
                    @if ($errors->has('proName'))
                        <span class="text-danger">{{ $errors->first('proName') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="bmrNo" class="active">BMR No.</label>

                        <input type="text" class="form-control" name="bmrNo"
                        value="{{ $edit_batchmanufacturing->bmrNo?$edit_batchmanufacturing->bmrNo:"RCIPL/BMR/" }}" id="bmrNo" pattern="\d*"
                        maxlength="120" onkeypress="">

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">

                <div class="form-group">
                    <label for="batchNo">Batch No.</label>

                        <input type="text" class="form-control" name="batchNo"
                        value="{{ $edit_batchmanufacturing->batchNo }}" id="batchNo" pattern="\d*"
                        maxlength="120" onkeypress="">



                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="refMfrNo">Ref. MFR No.</label>

                    <input type="text" class="form-control" name="refMfrNo"
                        value="{{ $edit_batchmanufacturing->refMfrNo?$edit_batchmanufacturing->refMfrNo:"RCIPL/MFR/" }}" id="refMfrNo"
                        pattern="\d*" maxlength="120"
                        onkeypress="">


                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="grade" class="active">Grade</label>
                    <input type="text" class="form-control" name="grade"
                        value="{{ $edit_batchmanufacturing->grade }}" id="grade" placeholder=""
                        pattern="\d*" maxlength="120"
                        onkeypress="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="BatchSize" class="active">Batch Size</label>
                    <input type="text" class="form-control" name="BatchSize"
                        value="{{ $edit_batchmanufacturing->BatchSize }}" id="BatchSize"
                        placeholder="" pattern="\d*" maxlength="120"
                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="Viscosity" class="active">Viscosity</label>
                    <input type="text" class="form-control" name="Viscosity"
                        value="{{ $edit_batchmanufacturing->Viscosity }}" id="Viscosity"
                        placeholder="" value="2000-2500 cSt" pattern="\d*" maxlength="120"
                        onkeypress="">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="ProductionCommencedon" class="active">Production
                            Commenced on</label>
                        <input type="date" class="form-control" name="ProductionCommencedon"
                            value="{{ $edit_batchmanufacturing->ProductionCommencedon }}"
                            id="ProductionCommencedon" placeholder="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="ProductionCompletedon" class="active">Production
                            Completed on</label>
                        <input type="date" class="form-control" name="ProductionCompletedon"
                            value="{{ $edit_batchmanufacturing->ProductionCompletedon }}"
                            id="ProductionCompletedon" placeholder="" value="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="ManufacturingDate" class="active">Manufacturing
                            Date</label>
                        <input type="date" class="form-control" name="ManufacturingDate"
                            value="{{ $edit_batchmanufacturing->ManufacturingDate }}"
                            id="ManufacturingDate" placeholder="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="RetestDate" class="active">Retest Date</label>
                        <input type="date" class="form-control" name="RetestDate"
                            value="{{ $edit_batchmanufacturing->RetestDate }}" id="RetestDate"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="doneBy">Prepared by</label>
                        <input type="text" class="form-control select" name="doneBy"
                            value="{{ Auth::user()->name }}" id="doneBy">

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="checkedBy">Checked by</label>
                        <input type="text" class="form-control select" name="checkedBy"
                            value="{{ Auth::user()->name }}" id="checkedBy">

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="checkedByI">Reviewed and Approved by</label>
                        <input type="text" class="form-control select" name="checkedByI"
                            value="{{ Auth::user()->name }}" id="checkedByI">

                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="approval" class="active">This Batch is approved/not
                            approved</label>
                        <select class="form-control select" name="approval" id="approval">

                                <option value="1" @if ($edit_batchmanufacturing->approval == 1) selected='selected' @endif>Approved</option>

                                <option value="0" @if ($edit_batchmanufacturing->approval != 1) selected='selected' @endif>Not Approved</option>

                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="Remark" class="active">Note / Remark</label>
                        <textarea class="form-control" name="Remark" id="Remark"
                            value="{{ $edit_batchmanufacturing->Remark }}"
                            placeholder="Note / Remark">{{ $edit_batchmanufacturing->Remark }}</textarea>
                    </div>
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
