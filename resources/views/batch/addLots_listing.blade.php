<div id="addLots_listing" class="tab-pane fade {{ $sequenceId == '9' ? 'in active show' : '' }}">
    @php $doneBy = [\Auth::user()->id => \Auth::user()->name];
    @endphp
    <div class="form-group">
        <input type="hidden" value="9" name="sequenceId">

        <a role="tab" data-toggle="tab"
            class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light " href="#addLots">Add
            Lot</a>
    </div>


    <table class="table table-hover table-bordered datatable" id="examplereq_lots">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Product Name</th>
                <th>Bmr.No</th>
                <th>lot.No</th>
                <th>Main Batch.No</th>
                <th>RefMfr.No</th>
                <th>Date</th>



            </tr>
        </thead>
        <tbody>

            @if ($lotsdetails)
                @foreach ($lotsdetails as $lots)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $lots->material_name }}</td>
                        <td>{{ $lots->bmrNo }}</td>
                        <td>{{ $lots->lotNo }}</td>
                        <td>{{ $lots->batchNo }}</td>
                        <td>{{ $lots->refMfrNo }}</td>
                        <td>{{ $lots->Date ? date('d/m/Y', strtotime($lots->created_at)) : '' }}</td>

                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>


</div>

<div id="addLots" class="tab-pane fade {{ $sequenceId == '10' ? 'in active show' : '' }}">

    <form method="post" action="{{ route('add_lots_update') }}" id="add_lots_process"
        name="add_lots_process">
        <div class="form-row">
            <input type="hidden" value="10" name="sequenceId">
            <input type="hidden" value="{{ isset($addlots->id) ? $addlots->id : '' }}" name="id">
            <input type="hidden"
                value="{{ isset($edit_batchmanufacturing->id) ? $edit_batchmanufacturing->id : '' }}"
                name="mainid">
            @csrf

            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="proName" class="active">Product Name</label>
                    {{ Form::select('proName', $product, old('proName'), ['class' => 'form-control select', 'id' => 'proName', 'value' => 'addlots->proName']) }}

                    @if ($errors->has('proName'))
                        <span class="text-danger">{{ $errors->first('proName') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="bmrNo" class="active">BMR No.</label>
                    <input type="text" class="form-control" name="bmrNo" id="bmrNo"
                        value="{{ $edit_batchmanufacturing->bmrNo }}" pattern="\d*" maxlength="12"
                        onkeypress="return /[0-9a-zA-Z\s\\/-]/i.test(event.key)" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="batchNo">Batch No.</label>
                    <input type="text" class="form-control" name="batchNo" id="batchNo"
                        value="{{ $edit_batchmanufacturing->batchNo }}" pattern="\d*" maxlength="12"
                        onkeypress="return /[0-9a-zA-Z\s\\/-]/i.test(event.key)" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="refMfrNo">Ref. MFR No.</label>
                    <input type="text" class="form-control" name="refMfrNo" id="refMfrNo"
                        value="{{ $edit_batchmanufacturing->refMfrNo }}" pattern="\d*" maxlength="12"
                        onkeypress="return /[0-9a-zA-Z\s\\/-]/i.test(event.key)" readonly>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="Date">Date</label>
                    <input type="date" class="form-control" name="Date" id="Date"
                        value="{{ isset($addlots->Date) ? $addlots->Date : date('Y-m-d') }}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label class="control-label d-flex">Process Sheet</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="lotNo" class="active">Lot No.</label>
                    <input type="text" class="form-control" name="lotNo" id="lotNo"
                        value="{{ isset($addlots->lotNo) ? $addlots->lotNo : $lotno }}">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="ReactorNo">Reactor No.</label>
                    {{ Form::select('ReactorNo', $selected_crop, old('ReactorNo') ? old('ReactorNo') : (isset($addlots->ReactorNo) ? $addlots->ReactorNo : ''), ['class' => 'form-control select', 'id' => 'ReactorNo', 'placeholder' => 'Reactor No.']) }}

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="Date">Date</label>
                    <input type="date" class="form-control" name="Process_date" id="Process_date "
                        placeholder=""
                        value="{{ isset($addlots->Process_date) ? $addlots->Process_date : date('Y-m-d') }}">
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group input_fields_wrap_4" id="MaterialReceived">

                    <label class="control-label d-flex">Raw Material Detail
                        <div class="input-group-btn">
                            <button
                                class="btn btn-dark add-more add_field_button_4 waves-effect waves-light"
                                type="button">Add More +</button>
                        </div>
                    </label>

                    @if (isset($raw_material_bills))
                        @php $lm =1; @endphp
                        @foreach ($raw_material_bills as $index => $rd)
                            @foreach ($rd as $in => $mat)
                                @php
                                    $batchstock = App\Models\Stock::select('inward_raw_materials_items.batch_no', 'inward_raw_materials_items.id')
                                        ->where('department', 3)
                                        ->where(DB::raw('qty-stock.used_qty'), '>', 0)
                                        ->join('raw_materials', 'raw_materials.id', 'stock.matarial_id')
                                        ->join('inward_raw_materials_items', 'inward_raw_materials_items.id', 'stock.batch_no')
                                        ->where('stock.material_type', 'R')
                                        ->where('stock.matarial_id', $mat->material_id)
                                        ->pluck('batch_no', 'id');
                                @endphp
                                <div class="row add-more-wrap5 after-add-more m-0 mb-4">
                                    <span class="add-count">{{ $lm }}</span>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">

                                            <label for="MaterialName[]" class="active">Raw
                                                Material</label>
                                            {{ Form::select('MaterialName[]', $stock, old('MaterialName[]') ? old('MaterialName[]') : $mat->material_id, ['id' => 'MaterialName[]', 'class' => 'form-control select', 'selected' => 'selected', 'onchange' => "getbatchlot($(this).val()," . $lm . ')']) }}
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="rmbatchno" class="active">Batch
                                                No.</label>
                                            {{ Form::select('rmbatchno[]', $batchstock, old('rmbatchno[]') ? old('rmbatchno[]') : $mat->batch_id, ['id' => 'rmbatchno' . $lm, 'class' => 'form-control select', 'selected' => 'selected', 'placeholder' => 'Batch No.']) }}

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="Quantity"
                                                class="active">Quantity</label>
                                            <input type="text" class="form-control" name="Quantity[]"
                                                id="Quantity{{ $lm }}" placeholder=""
                                                value="{{ isset($mat->requesist_qty) ? $mat->requesist_qty : old('Quantity[]') }}">
                                        </div>
                                    </div>
                                </div>
                                @php $lm++; @endphp
                            @endforeach
                        @endforeach
                    @endif

                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>Process</th>
                            <th>Qty. (Kg.)</th>
                            <th>Temp (<sup>o</sup>C)</th>
                            <th>Start Time (Hrs)</th>
                            <th>End Time (Hrs)</th>
                            <th>Done by</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if (isset($Processlots) && count($Processlots) > 0)
                            @foreach ($Processlots as $key => $v)

                                <tr>
                                    <td>{{ $key == 0 ? 'Charge Polydimethylsiloxane in reactor.' : ($key == 1 ? 'Start heating the reactor and start stirring' : ($key == 2 ? 'Once the temperature is between 100 - 120oC start the Inline mixer and charge ColloidalSilicon Dioxide (Fumed Silica) in reactor simultaneously and increase stirring speed.' : ($key == 3 ? 'When temperature reaches 180 - 190 oC stop heating the reactor.' : 'Stop stirrer and transfer the reaction mass to homogenizing tank No.- PR/BT/Come Tank number'))) }}
                                    </td>
                                    <td><input type="number" value="{{ $v->qty }}" name="qty[]"
                                            id="qty" class="form-control"></td>
                                    <td><input type="text" value="{{ $v->temp }}" name="temp[]"
                                            id="temp" class="form-control"></td>
                                    <td><input type="time" value="{{ $v->stratTime }}"
                                            name="stratTime[]" id="stratTime" class="form-control time"
                                            data-mask="00:00"></td>
                                    <td><input type="time" value="{{ $v->endTime }}"
                                            name="endTime[]" id="endTime[1]" class="form-control time"
                                            data-mask="00:00"></td>
                                    <td>{{ Form::select('doneby[]', $doneBy, old('doneby') ? old('doneby') : $v->doneby, ['id' => 'doneby[5]', 'class' => 'form-control select']) }}
                                    </td>
                                </tr>
                            @endforeach
                        @else



                            <tr>
                                <td>Charge Polydimethylsiloxane in reactor.</td>
                                <td><input type="number" name="qty[]" id="qty[1]"
                                        class="form-control"></td>
                                <td><input type="text" name="temp[]" id="temp[1]"
                                        class="form-control"></td>
                                <td><input type="time" name="stratTime[]" id="stratTime[1]"
                                        class="form-control time" data-mask="00:00"></td>
                                <td><input type="time" name="endTime[]" id="endTime[1]"
                                        class="form-control time" data-mask="00:00"></td>
                                <td>{{ Form::select('doneby[]', $doneBy, old('doneby'), ['id' => 'doneby[1]', 'class' => 'form-control select']) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Start heating the reactor and start stirring</td>
                                <td><input type="number" name="qty[]" id="qty[2]"
                                        class="form-control"></td>
                                <td><input type="text" name="temp[]" id="temp[2]"
                                        class="form-control"></td>
                                <td><input type="time" name="stratTime[]" id="stratTime[2]"
                                        class="form-control time" data-mask="00:00"></td>
                                <td><input type="time" name="endTime[]" id="endTime[2]"
                                        class="form-control time" data-mask="00:00"></td>
                                <td>{{ Form::select('doneby[]', $doneBy, old('doneby'), ['id' => 'doneby[2]', 'class' => 'form-control select']) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Once the temperature is between 100 - 120<sup>o</sup>C start the
                                    Inline mixer and charge ColloidalSilicon Dioxide (Fumed Silica) in
                                    reactor simultaneously and increase stirring speed.</td>
                                <td><input type="number" name="qty[]" id="qty[3]"
                                        class="form-control"></td>
                                <td><input type="text" name="temp[]" id="temp[3]"
                                        class="form-control"></td>
                                <td><input type="time" name="stratTime[]" id="stratTime[3]"
                                        class="form-control time" data-mask="00:00"></td>
                                <td><input type="time" name="endTime[]" id="endTime[3]"
                                        class="form-control time" data-mask="00:00"></td>
                                <td>{{ Form::select('doneby[]', $doneBy, old('doneby'), ['id' => 'doneby[3]', 'class' => 'form-control select']) }}
                                </td>
                            </tr>
                            <tr>
                                <td>When temperature reaches 180 - 190 <sup>o</sup>C stop heating the
                                    reactor.</td>
                                <td><input type="number" name="qty[]" id="qty[4]"
                                        class="form-control"></td>
                                <td><input type="text" name="temp[]" id="temp[4]"
                                        class="form-control"></td>
                                <td><input type="time" name="stratTime[]" id="stratTime4"
                                        class="form-control time" data-mask="00:00"></td>
                                <td><input type="time" name="endTime[]" id="endTime4"
                                        class="form-control time" data-mask="00:00"></td>
                                <td>{{ Form::select('doneby[]', $doneBy, old('doneby'), ['id' => 'doneby[4]', 'class' => 'form-control select']) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Stop stirrer and transfer the reaction mass to homogenizing tank
                                    No.- PR/BT/Come Tank number</td>
                                <td><input type="number" name="qty[]" id="qty[5]"
                                        class="form-control"></td>
                                <td><input type="text" name="temp[]" id="temp[5]"
                                        class="form-control"></td>
                                <td><input type="time" name="stratTime[]" id="stratTime5"
                                        class="form-control time" data-mask="00:00"></td>
                                <td><input type="time" name="endTime[]" id="endTime5"
                                        class="form-control time" data-mask="00:00"></td>
                                <td>{{ Form::select('doneby[]', $doneBy, old('doneby'), ['id' => 'doneby[5]', 'class' => 'form-control select']) }}
                                </td>
                            </tr>

                        @endif


                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Save
                        &amp; Quite</button><a href="add-batch-manufacturing-record-add-lot2.html"
                        class="btn btn-dark btn-md form-btn waves-effect waves-light">Continue</a>
                </div>
            </div>

        </div>
    </form>
</div>