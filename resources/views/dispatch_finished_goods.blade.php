@extends("layouts.app")
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="truck"></i>Finished Goods Dispatch</h4>
                </div>
                <div class="col-12 col-lg-2 ml-auto align-self-center align-items-end text-right">
                    <a href="{{ route('add_dispatch_finished_goods') }}" class="btn btn-md btn-primary">Add New +</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <div class="filter">
                <h3>Filter</h3>
                <div class="form-row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                          <input type="date" class="form-control" id="ReceiptDate" placeholder="Date">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="ReceiptNo" placeholder="INVOICE NO.">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="partyName" placeholder="Party Name">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <button type="search" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
            <div class="tbl-sticky">
            <div class="table-responsive">

                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('danger'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('update'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <table class="table table-hover table-bordered datatable">
                    <thead>
                        <tr>
                            <th rowspan="2">Date</th>
                            <th rowspan="2">Party Name</th>
                            <th rowspan="2">Invoice No.</th>
                            <th rowspan="2">Batch No.</th>
                            <th rowspan="2">Grade</th>
                            <th rowspan="2">Viscosity</th>
                            <th colspan="3">Total Drums</th>
                            <th rowspan="2">Total Quantity (Kg)</th>
                            <th rowspan="2">Seal No.</th>
                            <th rowspan="2">Remark</th>
                            <th rowspan="2">Dispatch By</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>50Kg</th>
                            <th>30Kg</th>
                            <th>5Kg</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($finished_good))
                        @foreach($finished_good as $temp)

                        <tr>
                            <td>{{ date("d/m/Y ",strtotime($temp->created_at)) }}</td>
                            <td>{{$temp->party_name}}</td>
                            <td>{{$temp->invoice_no}}</td>
                            <td>{{$temp->batch_no}}</td>
                            <td>{{$temp->grades_name}}</td>
                            <td>{{$temp->viscosity}}</td>
                            <td>{{$temp->total_no_of_50kg_drums}}</td>
                            <td>{{$temp->total_no_of_30kg_drums}}</td>
                            <td>{{$temp->total_no_of_5kg_drums}}</td>
                            <td>{{$temp->total_no_qty}}</td>
                            <td>{{$temp->seal_no}}</td>
                            <td>{{$temp->remark}}</td>
                            <td>{{$temp->suppliers_name}}</td>
                            <td class="actions">
                                <a href="{{ route('view_dispatch_finished',['id'=>$temp->id]) }}" class="btn action-btn" data-toggle="tooltip" data-placement="top" title="View"><i data-feather="eye"></i></a>
                                <a href="{{ route('edit_dispatch_finished',['id'=>$temp->id]) }}" class="btn action-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i data-feather="edit-3"></i></a>
                                <a href="{{ route('delete_dispatch_finished',['id'=>$temp->id]) }}" class="btn action-btn" data-toggle="tooltip" data-placement="top" title="Delete"><i data-feather="trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            </div>

        </div>
    </div>
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
        $(document).ready(function() {
            $('.datatable').DataTable({
     });

            $("#inward_finished_vali").validate({
                rules: {
                    inward_date: "required",
                    product_name: "required",
                    batch_no: "required",
                    grade: "required",
                    grade: "required",
                    viscosity: "required",
                    mfg_date: "required",
                    expiry_ratest_date: "required",
                    total_no_of_200kg_drums: "required",
                    total_no_of_50kg_drums: "required",
                    total_no_of_30kg_drums: "required",
                    total_no_of_5kg_drums: "required",
                    total_no_of_fiber_board_drums: "required",
                    total_quantity: "required",
                    ar_no: "required",
                    approval_data: "required",
                    received_by: "required",
                    remark: "required",
                },
                messages: {
                    inward_date: "Please  Enter The Name Inward No",
                    product_name: "Please  Enter The Product Name",
                    batch_no: "Please  Enter The Name Batch No",
                    grade: "Please  Enter The Name Ggrad",
                    viscosity: "Please  Enter The Name Viscosit",
                    mfg_date: "Please  Enter The Name Mfg Date",
                    expiry_ratest_date: "Please  Enter The Name Expiry Ratest Date",
                    total_no_of_200kg_drums: "Please  Enter The Name Total No Of 200kg Drum",
                    total_no_of_50kg_drums: "Please  Enter The Name total_no_of_50kg Drum",
                    total_no_of_30kg_drums: "Please  Enter The Name total_no_of_30kg Drum",
                    total_no_of_5kg_drums: "Please  Enter The Name total_no_of_5kg Drum",
                    total_no_of_fiber_board_drums: "Please  Enter The Name Total No Of Fiber Board Drum",
                    total_quantity: "Please  Enter The Name Total Quantit",
                    ar_no: "Please  Enter The Name Ar No",
                    approval_data: "Please  Enter The Name Approval Date",
                    received_by: "Please  Enter The Name Received By",
                    remark: "Please  Enter The Name Remark",
                },
            });
            $('.clear_submit').click(function() {
                $('#inward_date').val('');
                $('#product_name').val('');
                $('#batch_no').val('');
                $('#grade').val('');
                $('#grade').val('');
                $('#viscosity').val('');
                $('#mfg_date').val('');
                $('#expiry_ratest_date ').val('');
                $('#total_no_of_200kg_drums').val('');
                $('#total_no_of_50kg_drums').val('');
                $('#total_no_of_30kg_drums').val('');
                $('#total_no_of_5kg_drums').val('');
                $('#total_no_of_fiber_board_drums').val('');
                $('#total_quantity').val('');
                $('#ar_no').val('');
                $('#approval_data').val('');
                $('#received_by').val('');
                $('#remark').val('');
            });
        });
    </script>


@endpush
