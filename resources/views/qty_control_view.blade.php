<div class="modal-header">
    <h5 class="modal-title" id="checkQuntityLabel">{{$qty_control_view->material_name}} - {{$qty_control_view->batch_no}}.</h5>
    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
</div>
<div class="modal-body">
  <form method="post" id="checkQuantity" action="{{ route('quality_control_insert') }}" name="checkQuantity">
      {{csrf_field()}}
      <div class="form-row">
          <div class="col-12 col-md-6 col-lg-6 col-xl-6">
              <div class="form-group">
                  <label for="QuantityApproved">Quantity Approved</label>
                  <input type="text" class="form-control" name="quantity_approved" id="quantity_approved" placeholder="Quantity Approved" value="{{ $qty_control_view->qty_received_kg }}">
              </div>
          </div>
          <div class="col-12 col-md-6 col-lg-6 col-xl-6">
              <div class="form-group">
                  <label for="QuantityRejected">Quantity Rejected</label>
                  <input type="text" class="form-control" name="quantity_rejected" id="quantity_rejected" placeholder="Quantity Rejected">
              </div>
          </div>
          <div class="col-12 col-md-6 col-lg-6 col-xl-6">
              <div class="form-group">
                  <label for="Status">Status</label>
                  <select class="form-control select" name="quantity_status" id="quantity_status">
                      <option>Select</option>
                      <option value="Approved">Approved</option>
                      <option Rejected="Rejected">Rejected</option>
                  </select>
              </div>
          </div>
          <div class="col-12 col-md-6 col-lg-6 col-xl-6">
              <div class="form-group">
                  <label for="ApprovalDate">Date of Approval</label>
                  <input type="date" class="form-control calendar" name="date_of_approval" id="date_of_approval" placeholder="DD-MM-YYYY" value="{{ date("Y-m-d") }}">
              </div>
          </div>
          <div class="col-12 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label for="QuantityRejected">Ar Number</label>
                <input type="text" class="form-control" name="ar_number" id="ar_number" placeholder="AR No. / Date">
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label for="QuantityRejected">Ar Number</label>
                <input type="text" class="form-control" name="ar_number" id="ar_number" placeholder="AR No. / Date">
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label for="QuantityRejected">Check By</label>
                <input type="text" class="form-control" name="checkby" id="checkby" placeholder="Check By" value="{{ Auth::user()->name }}">
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            <div class="form-group">
              <label for="dateTime">Date and Time</label>
              <div class="form-row">
                <div class="col-6"><input type="date" name="cdate" class="form-control calendar" id="date" placeholder="Date" value={{ date("Y-m-d") }}></div>
                <div class="col-6"><input type="time"  name="ctime" class="form-control calendar" id="Time" placeholder="Time" value="{{ date("H:i") }}"></div>
                @if ($errors->has('cdate'))
                <span class="text-danger">{{ $errors->first('cdate') }}</span>
              @endif
              </div>
            </div>
        </div>
          <div class="col-12">
              <div class="form-group">
                  <label for="Remark">Remark</label>
                  <textarea class="form-control" id="remark" name="remark" placeholder="remark"></textarea>
              </div>
          </div>
          <div class="col-12">
              <div class="form-group">
                  <input type="hidden" name="inward_id" value="{{ $qty_control_view->inward_id }}" />
                  <input type="hidden" name="inward_item_id" value="{{ $qty_control_view->itemid }}" />
                  <input type="hidden" name="batch_no" value="{{ $qty_control_view->batch_no }}" />

                  <input type="hidden" name="rawmaterial_id" value="{{ $qty_control_view->r_m_id }}" />
                  <input type="hidden" name="total_qty" value="{{ $qty_control_view->qty_received_kg }}" />
                  <button type="submit" class="btn btn-primary btn-md m-0 submit_data">Submit</button>
              </div>
          </div>
      </div>
  </form>
</div>
<script>

    $(document).ready(function() {

        $("#checkQuantity").validate({
            rules: {
                quantity_approved: "required",
                quantity_status: "required",
                date_of_approval: "required",
                ar_number:"required"

            },
            messages: {
                quantity_approved: "Please  Enter quantity approved",
                quantity_status: "Please select check status",
                date_of_approval: "Please  Enter date of approval",
                ar_number:"Please Enter ar number/date"

            },
        });
    });
</script>


