  <form method="post" id="checkQuantity" action="quality_control_insert">
      {{csrf_field()}}
      <div class="form-row">
          <div class="col-12 col-md-6 col-lg-6 col-xl-6">
              <div class="form-group">
                  <label for="QuantityApproved">Quantity Approved</label>
                  <input type="text" class="form-control" name="quantity_approved" id="quantity_approved" placeholder="Quantity Approved">
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
                  <input type="date" class="form-control calendar" name="date_of_approval" id="date_of_approval" placeholder="DD-MM-YYYY">
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
                  <button type="submit" class="btn btn-primary btn-md m-0 submit_data">Submit</button>
              </div>
          </div>
      </div>
  </form>
