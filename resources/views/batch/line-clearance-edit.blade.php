
<div id="Line-Clearance" class="tab-pane fade">
    <form id="add_manufacturing_line" method="post" action="{{ route('line_clearance_update') }}">
        <input type="hidden" value="7" name="sequenceId">
        <input type="hidden"
            value="{{ isset($edit_batchmanufacturing->id) ? $edit_batchmanufacturing->id : '' }}"
            name="id">

        <input type="hidden" class="form-control" name="batchNo" id="batchNo"
            placeholder="Batch No."
            value="{{ isset($edit_batchmanufacturing->id) ? $edit_batchmanufacturing->id : old('batchNo') }}"
            readonly>

        <input type="hidden" class="form-control" name="clearance_id" id="clearance_id"
            placeholder="Batch No."
            value="{{ isset($lineclearace->id) ? $lineclearace->id : old('clearance_id') }}"
            readonly>

        <input type="hidden" class="form-control" name="proName" id="proName"
            placeholder="proName"
            value="{{ isset($edit_batchmanufacturing->batchNo) ? $edit_batchmanufacturing->batchNo : old('batchNo') }}"
            readonly>
        @csrf
        <div class="form-row">

            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label for="Date">Date </label>
                    <input type="date" class="form-control" name="Date" value="" id="Date" placeholder="" value="{{ isset($lineclearace->Date)?$lineclearace->Date:date('Y-m-d') }}">
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group input_fields_wrap-line" id="MaterialReceived">
                    <label class="control-label d-flex">Line Clearance Record
                        <div class="input-group-btn">
                            <button class="btn btn-dark add-more add_field_button_line waves-effect waves-light" id="add_field_button_line" type="button">Add More +</button>
                        </div>
                    </label>

                    <div class="row add-more-wrap after-add-more m-0 mb-4" id="add-more-wrap-line">
                        <span class="add-count">1</span>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="EquipmentName" class="active">Particulars</label>
                                <select class="form-control select" name="EquipmentName[]" id="EquipmentName">
                                    <option>Area Cleanliness Checked</option>
                                    <option>Temperature(<sup>o</sup>C)</option>
                                    <option>Humidity (%RH)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="Observation" class="active">Observation</label>
                                <input type="text" class="form-control" value="" name="Observation[]" id="Observation" placeholder="" value="">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="time" class="active">Time (Hrs)</label>
                                <input type="text" class="form-control" value="" name="time[]" id="time" placeholder="" value="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-12">
                    <div class="form-group">
                      <label for="Remark" class="active">Note / Remark</label>
                      <textarea class="form-control" name="Remark" value="" id="Remark" placeholder="Note / Remark"></textarea>
                    </div>
                </div>
            <div class="col-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Clear</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="viewDetail" tabindex="-1" aria-labelledby="checkQuntityLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkQuntityLabel">View Line Clearance Record</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body data_push">

           </div>
        </div>
    </div>
</div>

@push("scripts")
<script>
$(document).ready(function() {

        var max_fields = 15; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap-line"); //Fields wrapper
        var add_button = $("#add_field_button_line"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-4"><div class="form-group"><label for="EquipmentName[' + x + ']" class="active">Particulars</label><select class="form-control select" name="EquipmentName[]" id="EquipmentName[' + x + ']"><option>Select</option><option>Area Cleanliness Checked</option><option>Temperature(<sup>o</sup>C)</option><option>Humidity (%RH)</option></select></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="Observation[' + x + ']" class="active">Observation</label><input type="text" class="form-control" name="Observation[]" id="Observation[' + x + ']" placeholder="" value=""></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="time[' + x + ']" class="active">Time (Hrs)</label><input type="text" class="form-control" name="time[]" id="time[' + x + ']" placeholder="" value=""></div></div></div>'); //add input box
            }
            feather.replace()
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.row').remove();
            x--;
        })

});

</script>

@endpush
