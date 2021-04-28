@extends('section.app')

@section('content')
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
        <form action=""  id="vali_issue_material"class="form-control">

            <div class="form-row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="Requisition">Requisition No.</label>
                            <input type="text" class="form-control" name="requisition" id="requisition" placeholder="Requisition">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="MaterialName">Raw Material Name</label>
                            <input type="text" class="form-control" name="material_name" id="material_name" placeholder="Material Name">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="OpeningBalance">Opening Balance</label>
                            <input type="text" class="form-control" name="opening_balance" id="opening_balance" placeholder="Balance Stock">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="RawBatchNo">Raw Material Batch No.</label>
                            <input type="text" class="form-control"  name="raw_batch_no"id="raw_batch_no" placeholder="Batch No.">
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
                            <input type="date" class="form-control" name="issued_quantity" id="issued_quantity" placeholder="Quantity">
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
                            <input type="text" class="form-control"  name="wastage"id="wastage" placeholder="Wastage">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="returnDayStore">Returned from Day Store</label>
                            <input type="text" class="form-control"  name="return_day_store"id="return_day_store" placeholder="Returned">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="ClosingBalance">Closing balance Qty.</label>
                            <input type="text" class="form-control"  name="closing_balance"id="closing_balance" placeholder="Closing Balance">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="SupplierName">Dispensed by</label>
                            <select class="form-control select" name="supplier_name" id="supplier_name">
                                <option>Select</option>
                                <option>Employee Name</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="Remark">Note / Remark</label>
                            <textarea class="form-control"  name="remark_note"id="remark_note" placeholder="Note / Remark"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-md ml-0 form-btn data_submit">Submit</button>
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
    <script type="text/javascript" src="{{URL('js/issue-materia-production.js')}}"></script>
    @endpush
