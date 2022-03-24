<div id="homogenizing" class="tab-pane fade">

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
                        <td>{{ $lots->created_at ? date('d/m/Y', strtotime($lots->created_at)) : '' }}
                        </td>
                        <td>{{ $lots->homoTank }}</td>

                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>





</div>
<div id="addhomogenizing" class="tab-pane fade">
    <form id="add_homogninge" method="post" action="{{ route('homogenizing_insert') }}">
        @csrf

        <div class="form-row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="proName" class="active">Product Name</label>
                    <input type="text" readonly name="proNameName" id="proNameName" class="form-control" value="{{ isset($batchproduct->material_name)?$batchproduct->material_name:'' }}"/>

                    @if ($errors->has('proName'))
                        <span class="text-danger">{{ $errors->first('proName') }}</span>
                    @endif
                    <input type="hidden" name="proName" value="{{ isset($batchproduct->id)?$batchproduct->id:0 }}" />
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="bmrNo" class="active">BMR No. </label>
                    <input type="text" class="form-control" id="bmrNo" name="bmrNo" pattern="\d*"
                        maxlength="12" onkeypress=""
                        value="{{ isset($batchdetails->bmrNo) ? $batchdetails->bmrNo : old('bmrNo') }}"
                        readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="batchNo">Batch No.</label>
                    <input type="text" class="form-control" id="batchNo" name="batchNo"
                        pattern="\d*" maxlength="12"
                        onkeypress=""
                        value="{{ isset($batchdetails->batchNo) ? $batchdetails->batchNo : old('batchNo') }}"
                        readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="refMfrNo">Ref. MFR No.</label>
                    <input type="text" class="form-control" id="refMfrNo" name="refMfrNo"
                        pattern="\d*" maxlength="12"
                        onkeypress=""
                        value="{{ isset($batchdetails->refMfrNo) ? $batchdetails->refMfrNo : old('refMfrNo') }}"
                        readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="homoTank">Homogenizing tank No.</label>
                    <!--<input type="text" class="form-control" id="homoTank" name="homoTank" placeholder="PR/BT/Come Tank number" value=""> -->
                    {{ Form::select('homoTank', $selected_crop_tank, old('homoTank'), ['id' => 'homoTank', 'class' => 'form-control', 'placeholder' => 'Choose Homogenizing tank']) }}
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <button type="button" class="btn-primary add_field_button_20 mb-4 float-right">Add
                    More Lots +</button>
                @if (isset($processlots))
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
                            {{-- @foreach ($processlots as $p_lots)

                    <tr>@php $lotCount = $loop->index+1  @endphp
                        <td><input type="date" name="dateProcess[]" id="dateProcess[1]" class="form-control" value="{{$p_lots->Date}}"></td>    @php  $index = $p_lots->MaterialName;   @endphp
                        <td>Lot No.: {{ $p_lots->lotNo }} - <span class="text-primary p-2"> {{$lotCount}} {{$rawmaterials[$index]}}</span></td>
                        <td><input type="text" name="qty[]" id="qty[1]" class="form-control" value="{{$p_lots->Quantity}}"></td>
                        <td><input type="time" name="stratTime[]" id="stratTime[1]" class="form-control time" value="{{$p_lots->stratTime}}" data-mask="00:00"></td>
                        <td><input type="time" name="endTime[]" id="endTime[1]" class="form-control time" value="{{$p_lots->endTime}}" data-mask="00:00"></td>
                    </tr>
                    @endforeach

                    <tr>
                        <td><input type="date" name="dateProcess[]" id="dateProcess[15]" class="form-control"></td>
                        <td>Homogenize the product generated.</td>
                        <td><input type="text" name="qty[]" id="qty[15]" class="form-control"  placeholder="" value=""></td>
                        <td><input type="time" name="stratTime[]" id="stratTime[15]" class="form-control time" placeholder=""  value="" data-mask="00:00"></td>
                        <td><input type="time" name="endTime[]" id="endTime[15]" class="form-control time"  placeholder="" value="" data-mask="00:00"></td>
                    </tr> --}}
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
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="d-block">In Process Check (After 4 Lot)</label>
                    <input type="text" class="form-control" id="proecess_check" name="proecess_check" value="Remove sample (approx. 100gm) and check for viscosity at 25 <sup>o</sup>C/ 30
                    RPM with LV3 spindle using Brookfield Viscometer (ID No.: PR/VM/002)." />

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="Observedvalue">Observed value (cSt)</label>
                    <input type="text" class="form-control" id="Observedvalue"
                        name="Observedvalue" placeholder="" value="">
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
                        Quit</button>
                </div>
            </div>
        </div>
    </form>
</div>
