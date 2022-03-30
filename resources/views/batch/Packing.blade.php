<div id="Packing" class="tab-pane fade {{ $sequenceId == '12' ? 'in active show' : '' }}">
    <form id="add_manufacturing_packing" method="post"
        action="{{ route('add_manufacturing_packing_update') }}">
        <input type="hidden" value="12" name="sequenceId">
        <input type="hidden" value="{{ isset($packingmateria->id) ? $packingmateria->id : '' }}"
            name="id">
        <input type="hidden"
            value="{{ isset($edit_batchmanufacturing->id) ? $edit_batchmanufacturing->id : '' }}"
            name="mainid">
            <input type="hidden"
            value="{{ isset($edit_batchmanufacturing->id) ? $edit_batchmanufacturing->id : '' }}"
            name="mainid">
            <input type="hidden" name="proName" value="{{ $batchproduct->id }}" />
            <input type="hidden" class="form-control" name="bmrNo" id="bmrNo"
                        value="{{ $edit_batchmanufacturing->bmrNo }}" pattern="\d*" maxlength="120"
                        onkeypress="" readonly>
            <input type="hidden" class="form-control" name="batchNo" id="batchNo"
                        value="{{ $edit_batchmanufacturing->batchNo }}" pattern="\d*" maxlength="120"
                        onkeypress="" readonly>
            <input type="hidden" class="form-control" name="refMfrNo" id="refMfrNo"
                        value="{{ $edit_batchmanufacturing->refMfrNo }}" pattern="\d*" maxlength="120"
                        onkeypress="" readonly>
        @csrf

        <div class="form-row">

            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="ManufacturerDate" class="active">Date</label>
                    <input type="date" class="form-control calendar" name="ManufacturerDate"
                        value="{{ isset($packingmateria->ManufacturerDate) ? $packingmateria->ManufacturerDate : date('Y-m-d') }}"
                        id="ManufacturerDate" value={{ date('Y-m-d') }}>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group input_fields_wrap"
                    value="{{ isset($packingmateria->MaterialReceived) ? $packingmateria->MaterialReceived : '' }}"
                    id="MaterialReceived">
                    <label class="control-label d-flex">Packing
                        <!-- <div class="input-group-btn">  -->
                        <!-- <button class="btn btn-dark add-more add_field_button waves-effect waves-light" type="button">Add More +</button> -->
                        <!-- </div> -->
                    </label>
                    <div class="row add-more-wrap after-add-more m-0 mb-4">
                        <!-- <span class="add-count">1</span> -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="startTime" class="active">Observation Time (Hrs.)</label>
                                <input type="time" class="form-control time" name="startTime"
                                    value="{{ isset($packingmateria->startTime) ? $packingmateria->startTime : '' }}"
                                    id="startTime" placeholder="" data-mask="00:00">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="Observation" class="active">Area cleanliness
                                    checked by Production Observation</label>
                                <input type="text" class="form-control" name="Observation"
                                    value="{{ isset($packingmateria->Observation) ? $packingmateria->Observation : '' }}"
                                    id="Observation" placeholder="Observation">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="Temperature" class="active">Temperature (
                                    <sup>o</sup>C) of Filling area</label>
                                <input type="text" class="form-control" name="Temperature"
                                    value="{{ isset($packingmateria->Temperature) ? $packingmateria->Temperature : '' }}"
                                    id="Temperature" placeholder="Observation">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="Humidity" class="active">Humidity (%RH) of Filling
                                    area</label>
                                <input type="text" class="form-control" name="Humidity"
                                    value="{{ isset($packingmateria->Humidity) ? $packingmateria->Humidity : '' }}"
                                    id="Humidity" placeholder="Observation">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="TemperatureP" class="active">Temperature (
                                    <sup>o</sup>C) of Product</label>
                                <input type="text" class="form-control" name="TemperatureP"
                                    value="{{ isset($packingmateria->TemperatureP) ? $packingmateria->TemperatureP : '' }}"
                                    id="TemperatureP" placeholder="Observation">
                            </div>
                        </div>
                        <div class="col-12"></div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="50kgDrums" class="active">50 Kg No of Drums
                                    filled</label>
                                <input type="Number" class="form-control" name="50kgDrums"
                                    value="{{ isset($packingmateria['50kgDrums']) ? $packingmateria['50kgDrums'] : 0 }}"
                                    id="50kgDrums">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="200kgDrums" class="active">200 Kg No of Drums
                                    filled</label>
                                <input type="Number" class="form-control" name="20kgDrums"
                                    id="20kgDrums"
                                    value="{{ isset($packingmateria['20kgDrums']) ? $packingmateria['20kgDrums'] : '' }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="200kgDrums" class="active">30 Kg No of Drums
                                    filled</label>
                                <input type="Number" class="form-control" name="30kgDrums"
                                    id="30kgDrums"
                                    value="{{ isset($packingmateria['30kgDrums']) ? $packingmateria['30kgDrums'] : '' }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="200kgDrums" class="active">5 Kg No of Drums
                                    filled</label>
                                <input type="Number" class="form-control" name="5kgDrums"
                                    id="5kgDrums"
                                    value="{{ isset($packingmateria['5kgDrums']) ? $packingmateria['5kgDrums'] : '' }}">
                            </div>
                        </div>

                        <div class="col-12"></div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="areaCleanliness">Done By</label>
                                <input type="text" class="form-control" name="areaCleanliness"
                                    value="{{ Auth::user()->name }}" id="areaCleanliness"
                                    value="{{ \Auth::user()->name }}" readonly>

                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="CareaCleanliness">Checked By</label>
                                {{ Form::select('CareaCleanliness',$usersworker,old("CareaCleanliness")?old("CareaCleanliness"):\Auth::user()->id,array('class'=>'form-control select',"placeholder"=>"Created by")) }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group input_fields_wrap"
                    value="{{ isset($packingmateria->MaterialReceived) ? $packingmateria->MaterialReceived : '' }}"
                    id="MaterialReceived">
                    <label class="control-label d-flex">Yield
                        <!-- <div class="input-group-btn">  -->
                        <!-- <button class="btn btn-dark add-more add_field_button waves-effect waves-light" type="button">Add More +</button> -->
                        <!-- </div> -->
                    </label>
                    <div class="row add-more-wrap after-add-more m-0 mb-4">
                        <!-- <span class="add-count">1</span> -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="rmInput" class="active">RM Input (Kg.)</label>
                                <input type="text" class="form-control" name="rmInput"
                                    value="{{ isset($packingmateria->rmInput) ? $packingmateria->rmInput : '' }}"
                                    id="rmInput" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="fgOutput" class="active">FG Output</label>
                                <input type="text" class="form-control" name="fgOutput"
                                    value="{{ isset($packingmateria->fgOutput) ? $packingmateria->fgOutput : '' }}"
                                    id="fgOutput" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="filledDrums" class="active">Filled in Drums
                                    (Kg)</label>
                                <input type="text" class="form-control" name="filledDrums"
                                    value="{{ isset($packingmateria->filledDrums) ? $packingmateria->filledDrums : '' }}"
                                    id="filledDrums" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="excessFilledDrums" class="active">Excess filled in
                                    drums</label>
                                <input type="text" class="form-control" name="excessFilledDrums"
                                    value="{{ isset($packingmateria->excessFilledDrums) ? $packingmateria->excessFilledDrums : '' }}"
                                    id="excessFilledDrums" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="qcsampling" class="active">QC Sampling
                                    (Kg.)</label>
                                <input type="text" class="form-control" name="qcsampling"
                                    value="{{ isset($packingmateria->qcsampling) ? $packingmateria->qcsampling : '' }}"
                                    id="qcsampling" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="StabilitySample" class="active">Stability Sample
                                    (Kg.)</label>
                                <input type="Number" class="form-control" name="StabilitySample"
                                    value="{{ isset($packingmateria->StabilitySample) ? $packingmateria->StabilitySample : '' }}"
                                    id="StabilitySample" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="WorkingSlandered" class="active">Working
                                    Slandered</label>
                                <input type="text" class="form-control" name="WorkingSlandered"
                                    value="{{ isset($packingmateria->WorkingSlandered) ? $packingmateria->WorkingSlandered : '' }}"
                                    id="WorkingSlandered" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="ValidationSample" class="active">Validation
                                    Sample</label>
                                <input type="text" class="form-control" name="ValidationSample"
                                    value="{{ isset($packingmateria->ValidationSample) ? $packingmateria->ValidationSample : '' }}"
                                    id="ValidationSample" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="CustomerSample" class="active">Filled in Jerry can
                                    / Drum (Kg.) (Customer Sample)</label>
                                <input type="text" class="form-control" name="CustomerSample"
                                    value="{{ isset($packingmateria->CustomerSample) ? $packingmateria->CustomerSample : '' }}"
                                    id="CustomerSample" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="ActualYield" class="active">Actual Yield
                                    [(Output/Input)*100]</label>
                                <input type="text" class="form-control" name="ActualYield"
                                    value="{{ isset($packingmateria->ActualYield) ? $packingmateria->ActualYield : '' }}"
                                    id="ActualYield" placeholder="98.00 / 102.00%">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="checkedBy">Checked By</label>
                                {{ Form::select('checkedBy',$usersworker,old("checkedBy")?old("checkedBy"):\Auth::user()->id,array('class'=>'form-control select',"placeholder"=>"Created by")) }}


                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="ApprovedBy">Approved By</label>
                                <input type="text" class="form-control" name="ApprovedBy"
                                    value="{{ Auth::user()->name }}" id="ApprovedBy"
                                    value="{{ \Auth::user()->name }}" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="Remark" class="active">Note / Remark</label>
                    <textarea class="form-control" name="Remark" id="Remark"
                        placeholder="Note / Remark">{{ isset($packingmateria->Remark) ? $packingmateria->Remark : '' }}</textarea>
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
