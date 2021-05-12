@extends("layouts.app")
@section('content')

<div class="content-wrapper">
    <div class="row">

        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Quality Control</h4>
                </div>

            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <div class="tbl-sticky">
                <div class="table-responsive">
                    <div class="col-md-12">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-info alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                    </div>

                        <table class="table table-hover table-bordered datatable">
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
                                    <th>Quantity Approved</th>
                                    <th>Quantity Rejected</th>
                                    <th>Date of Approval</th>
                                    <th>Status</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($quality_control))
                                @foreach($quality_control as $temp)
                                <tr>
                                    <td>{{ date('d / m /Y',strtotime($temp->created_at))}}</td>

                                    <td>{{$temp->qty_received_kg}}</td>
                                    <td>{{$temp->name_manufacturer}}</td>
                                    <td>{{$temp->name_supplier}}</td>
                                    <td>{{$temp->raw_material_name}}</td>
                                    <td>{{$temp->batch_no}}</td>
                                    <td>{{$temp->goods_receipt_no}}</td>
                                    <td>{{$temp->ar_no_date}}</td>
                                    <td>{{$temp->quantity_approved}}</td>
                                    <td>{{$temp->quantity_rejected}}</td>
                                    <td>{{$temp->date_of_approval}}</td>
                                    @if($temp->quantity_status=='Approved')
                                    <td><span class="badges text-success">Approved</span></td>
                                    @else($temp->quantity_status=='Rejected')
                                    <td><span class="badges text-danger">Rejected</span></td>
                                    @endif
                                    <td><small>{{$temp->remark}}</small></td>
                                    <td><a href="#checkQuntity" data-toggle="modal" data-target="#checkQuntity" class="btn btn-primary btn-sm">Check</a></td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
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
    </div>>
    @endsection
    @push("scripts")
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('assets/mdbootstrap4/mdb.min.js')  }}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/custom.js')  }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('.datatable').DataTable({});
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
