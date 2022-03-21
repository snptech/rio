<div id="homogenizing" class="tab-pane fade {{ $sequenceId == '11' ? 'in active show' : '' }}">
    <div class="form-group">
        <input type="hidden" value="9" name="sequenceId">

        <a role="tab" data-toggle="tab"
            class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light "
            href="#addhomogenizing">Add Homogenize</a>
    </div>


    <table class="table table-hover table-bordered datatable" id="examplereq_homogenizing">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Product Name</th>
                <th>Bmr.No</th>
                <th>Main Batch.No</th>
                <th>RefMfr.No</th>
                <th>Date</th>
                <th>Homogenizing Tank No.</th>


            </tr>
        </thead>
        <tbody>

            @if (isset($Homogenizing) && $Homogenizing)
                @foreach ($Homogenizing as $lots)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $lots->material_name }}</td>
                        <td>{{ $lots->bmrNo }}</td>
                        <td>{{ $lots->batchNo }}</td>
                        <td>{{ $lots->refMfrNo }}</td>
                        <td>{{ $lots->created_at ? date('d/m/Y', strtotime($lots->created_at)) : '' }}</td>
                        <td>{{ $lots->homoTank }}</td>

                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>

</div>
<div id="addhomogenizing" class="tab-pane fade">
    <form id="add_homogninge" method="post" action="{{ route('homogenizing_update') }}" onsubmit="return confirm('Do you really want to submit the form?');">
        <input type="hidden" value="11" name="sequenceId">
        <input type="hidden" value="{{ isset($Homogenizing->id) ? $Homogenizing->id : '' }}" name="id">
        <input type="hidden"
            value="{{ isset($edit_batchmanufacturing->id) ? $edit_batchmanufacturing->id : '' }}"
            name="mainid">
        @csrf

        <div class="form-row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="proName" class="active">Product Name</label>

                    {{ Form::select('proName', $product, old('proName') ? old('proName') : (isset($edit_batchmanufacturing->proName) ? $edit_batchmanufacturing->proName : ''), ['class' => 'form-control select', 'id' => 'proName']) }}
                    @if ($errors->has('proName'))
                        <span class="text-danger">{{ $errors->first('proName') }}</span>
                    @endif

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="bmrNo" class="active">BMR No.</label>
                    <input type="text" class="form-control" name="bmrNo" id="bmrNo"
                        value="{{ $edit_batchmanufacturing->bmrNo }}" pattern="\d*" maxlength="120"
                        onkeypress="" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="batchNo">Batch No.</label>
                    <input type="text" class="form-control" name="batchNo" id="batchNo"
                        value="{{ $edit_batchmanufacturing->batchNo }}" pattern="\d*" maxlength="120"
                        onkeypress="" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="refMfrNo">Ref. MFR No.</label>
                    <input type="text" class="form-control" name="refMfrNo" id="refMfrNo"
                        value="{{ $edit_batchmanufacturing->refMfrNo }}" pattern="\d*" maxlength="120"
                        onkeypress="" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="homoTank">Homogenizing tank No.</label>
                    {{ Form::select('homoTank', $selected_crop_tank, old('homoTank') ? old('homoTank') : (isset($Homogenizing->homoTank) ? $Homogenizing->homoTank : ''), ['id' => 'homoTank', 'class' => 'form-control', 'placeholder' => 'Choose Homogenizing tank']) }}
                    <!--<input type="text" class="form-control" name="homoTank" id="homoTank" value="{{ isset($Homogenizing->homoTank) ? $Homogenizing->homoTank : '' }}"> -->
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <button type="button" class="btn-primary add_field_button_20 mb-4 float-right">Add More
                    Lots +</button>
                <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Process</th>
                            <th>Qty (Kg.)</th>
                            <th>Start Time (Hrs)</th>
                            <th>End Time (Hrs)</th>

                        </tr>
                    </thead>
                    <tbody class="input_fields_wrap_20">

                        @if (isset($HomogenizingList) && count($HomogenizingList) > 0)
                            @foreach ($HomogenizingList as $key => $temp)
                                <tr>
                                    <td><input type="date" name="dateProcess[]"
                                            value="{{ $temp->dateProcess }}" id="dateProcess[1]"
                                            class="form-control"></td>
                                    <td><input type="text" name="lot[]" id="lot" class="form-control"
                                            value=""></td>
                                    <td><input type="number" name="qty[]" id="qty"
                                            value="{{ $temp->qty }}" class="form-control"></td>
                                    <td><input type="time" name="stratTime[]" id="stratTime"
                                            value="{{ $temp->stratTime }}" class="form-control time"
                                            data-mask="00:00"></td>
                                    <td><input type="time" name="endTime[]" id="endTime"
                                            value="{{ $temp->endTime }}" class="form-control time"
                                            data-mask="00:00"></td>

                                </tr>

                            @endforeach
                        @else

                            <tr>
                                <td><input type="date" name="dateProcess[]" id="dateProcess[1]"
                                        class="form-control" value="{{ date('Y-m-d') }}"></td>
                                <td><input type="text" name="lot[]" id="lot" class="form-control"
                                        value=""><input type="hidden" name="lotsid[]" value=""></td>
                                <td><input type="number" name="qty[]" id="qty[1]"
                                        class="form-control" value=""></td>
                                <td><input type="time" name="stratTime[]" id="stratTime[1]"
                                        class="form-control time" value="" data-mask="00:00"></td>
                                <td><input type="time" name="endTime[]" id="endTime[1]"
                                        class="form-control time" value="" data-mask="00:00"></td>
                            </tr>

                        @endif

                    </tbody>

                </table>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="d-block">In Process Check (After 4 Lot)</label>
                    Remove sample (approx. 100gm) and check for viscosity at 25 <sup>o</sup>C/ 30 RPM
                    with LV3 spindle using Brookfield Viscometer (ID No.: PR/VM/002).
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="Observedvalue">Observed value (cSt)</label>
                    <input type="text" class="form-control" name="Observedvalue" id="Observedvalue"
                        value="{{ isset($Homogenizing->Observedvalue) ? $Homogenizing->Observedvalue : '' }}"
                        placeholder="" value="">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <button type="submit"
                    class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light" name="submit" value="submit">Submit
                    & Next</button><button type="clear"
                    class="btn btn-light btn-md form-btn waves-effect waves-light" name="save_q" value="save_q">Save &
                    Quit</button>
                </div>
            </div>
        </div>
    </form>
</div>
