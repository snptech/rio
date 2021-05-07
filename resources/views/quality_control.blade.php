@extends("layouts.app")
@section('content')
<div class="col-md-12">
    @if ($message = Session::get('success'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
</div>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="check-square"></i>Quality Control Approval/Rejection (Annexure -VI)</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Quality<br />(Kg)</th>
                            <th>Name of <br />Manufacturer</th>
                            <th>Name of Supplier</th>
                            <th>Raw Material Name</th>
                            <th>Batch No.</th>
                            <th>GRN</th>
                            <th>AR No.</th>
                            <th>Remark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>16/03/2021</td>
                            <td>100</td>
                            <td>Manufacturer name here</td>
                            <td>Supplier name goes here</td>
                            <td>Raw Material 1</td>
                            <td>ABC1234567</td>
                            <td>ABC123456</td>
                            <td>123456</td>
                            <td><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</small></td>
                            <td><a href="#checkQuntity" data-toggle="modal" data-target="#checkQuntity" class="btn btn-primary btn-sm">Check</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries</label></div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade show" id="checkQuntity" tabindex="-1" aria-labelledby="checkQuntityLabel" aria-modal="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkQuntityLabel">Material Name - Batch no.</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
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
            </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
<script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $("#checkQuantity").validate({
            rules: {
                quantity_approved: "required",
                quantity_rejected: "required",
                quantity_status: "required",
                date_of_approval: "required",
                remark: "required",
            },
            messages: {
                quantity_approved: "Please  Enter The Quantity Approved Name ",
                quantity_rejected: "Please  Enter The Quantity Rejected Name ",
                quantity_status: "Please  Enter The Quantity Status Name ",
                date_of_approval: "Please  Enter The Date Of Approval Name ",
                remark: "Please  Enter The Remark Name ",
            },
        });
    });
</script>
@endpush
