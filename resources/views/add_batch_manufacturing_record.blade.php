@extends("layouts.app")
@section("title","Add batch Manufacture")
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Batch Manufacturing Records</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
        <form id="add_manufacturing" method="post" action="{{ route('add_manufacturing_insert') }}">
                @csrf

            <div class="form-row">
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="proName" class="active">Product Name</label>
                        <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="bmrNo" class="active">BMR No.</label>
                        <input type="text" class="form-control" name="bmrNo" id="bmrNo" placeholder="BMR No." value="RCIPL/BMR/Flx-2300/09">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="batchNo">Batch No.</label>
                        <input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Batch No." value="RFLX 20/668">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="refMfrNo">Ref. MFR No.</label>
                        <input type="text" class="form-control" name="refMfrNo" id="refMfrNo" placeholder="Ref. MFR No." value="RCIPL/MFR/01/01">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="grade" class="active">Grade</label>
                        <input type="text" class="form-control" name="grade" id="grade" placeholder="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="BatchSize" class="active">Batch Size</label>
                        <input type="text" class="form-control" name="BatchSize" id="BatchSize" placeholder="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="Viscosity" class="active">Viscosity</label>
                        <input type="text" class="form-control" name="Viscosity" id="Viscosity" placeholder="" value="2000-2500 cSt">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="ProductionCommencedon" class="active">Production Commenced on</label>
                        <input type="date" class="form-control" name="ProductionCommencedon" id="ProductionCommencedon" value={{ date("Y-m-d") }}>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="ProductionCompletedon" class="active">Production Completed on</label>
                        <input type="date" class="form-control" name="ProductionCompletedon" id="ProductionCompletedon" placeholder="" value={{ date("Y-m-d") }}>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="ManufacturingDate" class="active">Manufacturing Date</label>
                        <input type="date" class="form-control" name="ManufacturingDate" id="ManufacturingDate" placeholder="" value={{ date("Y-m-d") }}>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="RetestDate" class="active">Retest Date</label>
                        <input type="date" class="form-control" name="RetestDate" id="RetestDate" placeholder=""  value={{ date("Y-m-d") }}>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="doneBy">Prepared by</label>
                        <select class="form-control select" name="doneBy" id="doneBy">
                            <option>Select</option>
                            <option>Employee Name</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="checkedBy">Checked by</label>
                        <select class="form-control select" name="checkedBy" id="checkedBy">
                            <option>Select</option>
                            <option>Employee Name</option>
                        </select>
                    </div>
                </div>

                <!-- <div class="col-12">
                    <div class="form-group">
                        <label for="Remark" class="active">This batch has / has not been produced according to instruction given in MFR No. RCIPL/MFR/01/01</label>
                    </div>
                </div> -->
                <!-- <div class="col-12">
                    <div class="form-group">
                        <label for="ManufacturingDate" class="active">Deviation Sheet attached</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Yes">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="No">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </div>
                </div> -->
               <!--  <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="approval" class="active">This Batch is approved/not approved</label>
                        <select class="form-control select" name="approval" id="approval">
                            <option>Select</option>
                            <option>Approved</option>
                            <option>Not Approved</option>
                        </select>
                    </div>
                </div> -->
                <!-- <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="approvalDate" class="active">This Batch is approved/not approved on</label>
                        <input type="date" class="form-control" name="approvalDate" id="approvalDate" placeholder="" value="">
                    </div>
                </div> -->

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="checkedByI">Reviewed and Approved by</label>
                        <select class="form-control select" name="checkedByI" id="checkedByI">
                            <option>Select</option>
                            <option>Employee Name</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
						<div class="form-group">
						  <label for="Remark" class="active">Note / Remark</label>
						  <textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
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
    </div>
</div>

<!-- <div class="modal fade show" name="checkQuntity" id="checkQuntity" tabindex="-1" aria-labelledby="checkQuntityLabel" aria-modal="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" name="checkQuntityLabel" id="checkQuntityLabel">Material Name - Batch no.</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
		<form action="#" method="_post" name="checkQuantity" id="checkQuantity">
			<div class="form-row">
				<div class="col-12 col-md-6 col-lg-6 col-xl-6">
					<div class="form-group">
					  <label for="QuantityApproved">Quantity Approved</label>
					  <input type="text" class="form-control" name="QuantityApproved" id="QuantityApproved" placeholder="Quantity Approved">
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-6 col-xl-6">
					<div class="form-group">
					  <label for="QuantityRejected">Quantity Rejected</label>
					  <input type="text" class="form-control" name="QuantityRejected" id="QuantityRejected" placeholder="Quantity Rejected">
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-6 col-xl-6">
					<div class="form-group">
					  <label for="Status">Status</label>
					  <select class="form-control select" name="Status" id="Status">
						<option>Select</option>
						<option>Approved</option>
						<option>Rejected</option>
					  </select>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-6 col-xl-6">
					<div class="form-group">
					  <label for="ApprovalDate">Date of Approval</label>
					  <input type="date" class="form-control calendar" name="ApprovalDate" id="ApprovalDate" placeholder="DD-MM-YYYY">
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
					  <label for="Remark">Remark</label>
					  <textarea class="form-control" name="Remark" id="Remark" placeholder="Remark"></textarea>
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-md m-0">Submit</button>
					</div>
				</div>
			</div>
		</form>
      </div>
    </div>
  </div>
</div> -->
@endsection
@push("scripts")

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $("#add_manufacturing").validate({
            rules: {
                proName: "required",
                bmrNo: "required",
                batchNo: "required",
                refMfrNo: "required",
                grade: "required",
                BatchSize: "required",
                Viscosity: "required",
                ProductionCommencedon: "required",
                ProductionCompletedon: "required",
                ManufacturingDate: "required",
                RetestDate: "required",
                doneBy: "required",
                checkedBy: "required",
                inlineRadioOptions: "required",
                approval: "required",
                approvalDate: "required",
                checkedByI: "required",

            },
            messages: {
                proName: "Please  Enter The Name proName",
                bmrNo: "Please  Enter The Name bmrNo",
                batchNo: "Please  Enter The Name batchNo",
                refMfrNo: "Please  Enter The Name refMfrNo",
                grade: "Please  Enter The Name grade",
                BatchSize: "Please  Enter The Name BatchSize",
                Viscosity: "Please  Enter The Name Viscosity",
                ProductionCommencedon: "Please  Enter The Name ProductionCommencedon",
                ProductionCompletedon: "Please  Enter The Name ProductionCompletedon",
                ManufacturingDate: "Please  Enter The Name ManufacturingDate",
                RetestDate: "Please  Enter The Name RetestDate",
                doneBy: "Please  Enter The Name doneBy",
                checkedBy: "Please  Enter The Name checkedBy",
                inlineRadioOptions: "Please  Enter The Name inlineRadioOptions",
                approval: "Please  Enter The Name approval",
                approvalDate: "Please  Enter The Name approvalDate",
                checkedByI: "Please  Enter The Name checkedBy",
            },
        });

    });
</script>

@endpush
