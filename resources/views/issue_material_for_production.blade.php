
@extends('layouts.app')
@section('content')
<div class="col-md-12">
    @if ($message = Session::get('success'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
</div>
<!-- Main Container -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="hard-drive"></i>Issue Material For Production</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <form  id="vali_issue_material" method="post" action="issue_material_insert">
            {{csrf_field()}}
                <div class="form-row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="Requisition">Requisition No.</label>
                            <input type="text" class="form-control" name="requisition_no" id="requisition_no" placeholder="Requisition">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="MaterialName">Raw Material Name</label>
                            {{ Form::select("material",$rawmaterial,old("material"),array("class"=>"form-control select","id"=>"material","placeholder"=>"Material Name")) }}

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="OpeningBalance">Opening Balance</label>
                            <input type="text" class="form-control" name="opening_bal" id="opening_bal" placeholder="Balance Stock" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="RawBatchNo">Raw Material Batch No.</label>
                            <input type="text" class="form-control" name="batch_no" id="batch_no" placeholder="Batch No.">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="Viscosity">Viscosity <span class="text-danger">(Only for certain Products)</span></label>
                            <input type="text" class="form-control" name="viscosity" id="viscosity" placeholder="Viscosity">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="IssualDate">Issual Date</label>
                            <input type="date" class="form-control calendar" name="issual_date" id="issual_date" placeholder="Viscosity">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="IssuedQuantity">Issued Quantity</label>
                            <input type="text" class="form-control" name="issued_quantity" id="issued_quantity" placeholder="Quantity">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="finishedBatchNo">For finished Product Batch No.</label>
                            <input type="text" class="form-control" name="finished_batch_no" id="finished_batch_no" placeholder="Finished Product Batch No.">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="Excess">Excess</label>
                            <input type="text" class="form-control" id="excess" name="excess" placeholder="Excess">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="Wastage">Wastage</label>
                            <input type="text" class="form-control" name="wastage" id="wastage" placeholder="Wastage">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="returnDayStore">Returned from Day Store</label>
                            <input type="text" class="form-control" name="returned_from_day_store" id="returned_from_day_store" placeholder="Returned">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="ClosingBalance">Closing balance Qty.</label>
                            <input type="text" class="form-control" name="closing_balance_qty" id="closing_balance_qty" placeholder="Closing Balance">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="SupplierName">Dispensed by</label>
                            <select class="form-control select" name="dispensed_by" id="dispensed_by">
                                <option value="">Select</option>
                                @if(count($supplier_master))
                                @foreach ($supplier_master as $temp)
                                <option value="{{$temp->id}}">{{$temp->name}}</option>
                                @endforeach
                                @endif
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
                            <button type="submit" class="btn btn-primary btn-md ml-0 form-btn ">Submit</button>
                            <button type="button" class="btn btn-light btn-md form-btn data_clear">Clear</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('custom-scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="//unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
 $(document).ready(function() {
        $("#vali_issue_material").validate({
            rules: {
                requisition_no:"required",
                material:"required",
                opening_bal:"required",
                batch_no:"required",
                viscosity:"required",
                issual_date:"required",
                issued_quantity:"required",
                excess: "required",
                finished_batch_no:"required",
                wastage: "required",
                returned_from_day_store:"required",
                closing_balance_qty:"required",
                dispensed_by:"required",
                remark:"required",
            },
            messages: {
                requisition_no: "Please  Enter The Requisition No",
                material: "Please  Enter The Material Name",
                opening_bal: "Please  Enter The Opening Balance",
                batch_no: "Please  Enter The Batch No ",
                viscosity: "Please  Enter The Viscosity Name",
                issual_date: "Please  Enter The Issual Date ",
                issued_quantity: "Please  Enter The Issued Quantity ",
                finished_batch_no: "Please  Enter The Finished Batch No ",
                excess: "Please  Enter The Excess",
                wastage: "Please  Enter The Wastage",
                returned_from_day_store: "Please  Enter The Returned From Day Store",
                closing_balance_qty: "Please  Enter The Closing Balance qty ",
                dispensed_by: "Please  Enter The Dispensed By Name",
                remark: "Please  Enter The Remark",
            },
        });
        $('.data_clear').click(function() {
            $('#requisition_no').val('');
            $('#material').val('');
            $('#opening_bal').val('');
            $('#batch_no').val('');
            $('#viscosity').val('');
            $('#issual_date').val('');
            $('#issued_quantity').val('');
            $('#finished_batch_no').val('');
            $('#excess').val('');
            $('#wastage').val('');
            $('#returned_from_day_store').val('');
            $('#closing_balance_qty').val('');
            $('#dispensed_by').val('');
            $('#remark').val('');
        });

    });
</script>
@endpush
