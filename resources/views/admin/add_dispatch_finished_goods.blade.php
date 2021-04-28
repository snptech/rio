@extends("layouts.app")
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="shopping-cart"></i>Finished Goods Dispatch</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <form id="add_dispatch_finished_goods_vali">
            <div class="form-row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="no">No.</label>
						  <input type="text" class="form-control" name="dispath_no" id="dispath_no" placeholder="no"value="077" readonly>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="from">From</label>
						  <input type="text" class="form-control" name="dispatch_form" id="dispatch_form" placeholder="from"value="Dispatch" readonly>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="to">To</label>
						  <input type="text" class="form-control" name="dispatch_to" id="dispatch_to" placeholder="to"value="Store" readonly>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="date">Date</label>
						  <input type="date" class="form-control" name="good_dispatch_date" id="good_dispatch_date" placeholder="Date">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="modeDispatch">Mode of Dispatch</label>
						  <select class="form-control select" name="mode_of_dispatch" id="mode_of_dispatch">
							<option>Select</option>
							<option>Domestic</option>
							<option>Export (Air/Sea)</option>
						  </select>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="PartyName">Party Name</label>
						  <input type="text" class="form-control" name="party_name" id="party_name" placeholder="Party Name">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="productName">Product Name</label>
						  <input type="text" class="form-control" name="product" id="product" placeholder="Product Name">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="invoice">Invoice No.</label>
						  <input type="text" class="form-control" name="invoice_no" id="invoice_no" placeholder="Invoice No.">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="BatchNo">Batch No.</label>
						  <input type="text" class="form-control" name="batch_no" id="batch_no" placeholder="Batch">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="grade">Grade</label>
						  <select class="form-control select" name="grade" id="grade">
							<option>Select</option>
							<option>Grade 1</option>
						  </select>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="Viscosity">Viscosity</label>
						  <input type="text" class="form-control" name="viscosity" id="viscosity" placeholder="Viscosity">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="mfgDate">Mfg. Date</label>
						  <input type="date" class="form-control calendar" name="mfg_date" id="mfg_date" placeholder="Mfg. Date">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="expiryDate">Expiry / Ratest Date</label>
						  <input type="date" class="form-control" name="expiry_ratest_date" id="expiry_ratest_date" placeholder="Expiry / Ratest Date">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="50KgDrums">Total No. of 50Kg Drums</label>
						  <input type="number" class="form-control" name="total_no_of_50kg_drums" id="total_no_of_50kg_drums" placeholder="50Kg Drums">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="30KgDrums">Total No. of 30Kg Drums</label>
						  <input type="number" class="form-control" name="total_no_of_30kg_drums" id="total_no_of_30kg_drums" placeholder="30Kg Drums">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="5KgDrums">Total No. of 5Kg Drums</label>
						  <input type="number" class="form-control" name="total_no_of_5kg_drums" id="total_no_of_5kg_drums" placeholder="5Kg Drums">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="Quantity">Total Quantity (Kg)</label>
						  <input type="text" class="form-control" name="total_no_qty" id="total_no_qty" placeholder="Quantity">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="SealNo">Seal No.</label>
						  <input type="text" class="form-control" name="seal_no" id="seal_no" placeholder="Seal No.">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="approvalDate">Dispatch Date</label>
						  <input type="date" class="form-control calendar" name="dispatch_date" id="dispatch_date" placeholder="Date">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="SupplierName">Dispatch by</label>
						  <select class="form-control select" name="dispatch_by" id="dispatch_by">
							<option>Select</option>
							<option>Employee Name</option>
						  </select>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
						  <label for="Remark">Note / Remark</label>
						  <textarea class="form-control" name="remark" id="remark" placeholder="Note / Remark"></textarea>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
						  <button type="submit" class="btn btn-primary btn-md ml-0 form-btn">Submit</button>
                          <button type="clear" class="btn btn-light btn-md form-btn clear_submit">Clear</button>
						</div>
					</div>
				</div>
        </div>
    </div>
    </form>
</div>
</div>
@endsection
@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#add_dispatch_finished_goods_vali").validate({
            rules: {
            dispath_no:"required",
            dispatch_form:"required",
            dispatch_to:"required",
            good_dispatch_date:"required",
            mode_of_dispatch:"required",
            party_name:"required",
            product:"required",
            invoice_no:"required",
            batch_no:"required",
            grade:"required",
            viscosity:"required",
            mfg_date:"required",
            expiry_ratest_date:"required",
            total_no_of_50kg_drums:"required",
            total_no_of_30kg_drums:"required",
            total_no_of_5kg_drums:"required",
            total_no_qty:"required",
            seal_no:"required",
            dispatch_date:"required",
            dispatch_by:"required",
            remark:"required",
            },
            messages: {
            dispath_no:"Please  Enter The Name dispath_no",
            dispatch_form:"Please  Enter The Name dispatch_form",
            dispatch_to:"Please  Enter The Name dispatch_to",
            good_dispatch_date:"Please  Enter The Name good_dispatch_date",
            mode_of_dispatch:"Please  Enter The Name mode_of_dispatch",
            party_name:"Please  Enter The Name party_name",
            product:"Please  Enter The Name product",
            invoice_no:"Please  Enter The Name invoice_no",
            batch_no:"Please  Enter The Name batch_no",
            grade:"Please  Enter The Name grade",
            viscosity:"Please  Enter The Name viscosity",
            mfg_date:"Please  Enter The Name mfg_date",
            expiry_ratest_date:"Please  Enter The Name expiry_ratest_date",
            total_no_of_50kg_drums:"Please  Enter The Name total_no_of_50kg_drums",
            total_no_of_30kg_drums:"Please  Enter The Name total_no_of_30kg_drums",
            total_no_of_5kg_drums:"Please  Enter The Name total_no_of_5kg_drums",
            total_no_qty:"Please  Enter The Name total_no_qty",
            seal_no:"Please  Enter The Name seal_no",
            dispatch_date:"Please  Enter The Name dispatch_date",
            dispatch_by:"Please  Enter The Name dispatch_by",
            remark:"Please  Enter The Name remark",

            },
        });
        $('.clear_submit').click(function() {
            $('#dispath_no').val('');
            $('#dispatch_form').val('');
            $('#dispatch_to').val('');
            $('#good_dispatch_date').val('');
            $('#mode_of_dispatch').val('');
            $('#party_name').val('');
            $('#product').val('');
            $('#invoice_no').val('');
            $('#batch_no').val('');
            $('#grade').val('');
            $('#viscosity').val('');
            $('#mfg_date').val('');
            $('#expiry_ratest_date').val('');
            $('#total_no_of_50kg_drums').val('');
            $('#total_no_of_30kg_drums').val('');
            $('#total_no_of_5kg_drums').val('');
            $('#total_no_qty').val('');
            $('#seal_no').val('');
            $('#dispatch_date').val('');
            $('#dispatch_by').val('');
            $('#remark').val('');

        });
    });
</script>

@endpush
