<div id="batch" class="tab-pane fade in active show">
    <form id="add_manufacturing" method="post" action="{{ route('add_manufacturing_insert') }}">
        @csrf
        <div class="form-row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="proName" class="active">Product Name</label>
                    <!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)"> -->
                    {{ Form::select('proName', $product, old('proName'), ['class' => 'form-control select', 'id' => 'proName', 'placeholder' => 'Choose Product Name']) }}

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="bmrNo" class="active">BMR No.</label>

                    <input type="text" class="form-control" name="bmrNo" id="bmrNo"
                        placeholder="BMR No." pattern="\d*" maxlength="50" value="RCIPL/BMR/"
                        >

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="batchNo">Batch No.</label>
                    <input type="text" class="form-control" name="batchNo" id="batchNo"
                        placeholder="Batch No." pattern="\d*" maxlength="50"
                        >
                </div>
                @if ($errors->has('proName'))
                    <span class="text-danger">{{ $errors->first('proName') }}</span>
                @endif
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="refMfrNo">Ref. MFR No.</label>


                        <input type="text" class="form-control" name="refMfrNo" id="refMfrNo"
                            placeholder="Ref. MFR No." pattern="\d*" maxlength="50" value="RCIPL/MFR/">

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="grade" class="active">Grade</label>
                    <input type="text" class="form-control" name="grade" id="grade"
                        placeholder="Grade" pattern="\d*" maxlength="50"
                        >
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="BatchSize" class="active">Batch Size</label>
                    <input type="number" class="form-control" name="BatchSize" id="BatchSize"
                        placeholder="batch size"
                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="Viscosity" class="active">Viscosity</label>
                    <input type="text" class="form-control" name="Viscosity" id="Viscosity"
                        placeholder="Viscosity" pattern="\d*" maxlength="50"
                        >
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6"> &nbsp; </div>

            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="ProductionCommencedon" class="active">Production Commenced
                        on</label>
                    <input type="date" class="form-control" name="ProductionCommencedon"
                        id="ProductionCommencedon" value="{{ date('Y-m-d') }}">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="ProductionCompletedon" class="active">Production Completed
                        on</label>
                    <input type="date" class="form-control" name="ProductionCompletedon"
                        id="ProductionCompletedon" placeholder="" value="{{ date('Y-m-d') }}">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="ManufacturingDate" class="active">Manufacturing Date</label>
                    <input type="date" class="form-control" name="ManufacturingDate"
                        id="ManufacturingDate" placeholder="" value="{{ date('Y-m-d') }}">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="RetestDate" class="active">Retest Date</label>
                    <input type="date" class="form-control" name="RetestDate" id="RetestDate"
                        placeholder="" value="{{ date('Y-m-d') }}">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="doneBy">Prepared by</label>
                    {{ Form::select('doneBy',$users,old("doneBy")?old("doneBy"):\Auth::user()->id,array('class'=>'form-control select',"placeholder"=>"Prepared by","id"=>"doneBy")) }}


                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="checkedBy">Checked by</label>
                    {{ Form::select('checkedBy',$usersworker,old("checkedBy")?old("checkedBy"):\Auth::user()->id,array('class'=>'form-control select',"placeholder"=>"Created by")) }}
                   


                </div>
            </div>


            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="checkedByI">Reviewed and Approved by</label>
                    {{ Form::select('checkedByI',$users,old("checkedByI")?old("checkedByI"):\Auth::user()->id,array('class'=>'form-control select',"placeholder"=>"Reviewed and Approved by","id"=>"checkedByI")) }}


                </div>
            </div>
           {{--  <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="approval" class="active">This Batch is approved/not
                        approved</label>
                    <select class="form-control select" name="approval" id="approval">
                        <option>-- Select Option --</option>
                        <option value="Approved">Approved</option>
                        <option value="Not Approved">Not Approved</option>
                    </select>
                </div>
            </div>--}}
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="Remark" class="active">Note / Remark</label>
                    <textarea class="form-control" name="Remark" id="Remark"
                        placeholder="Note / Remark"></textarea>
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
