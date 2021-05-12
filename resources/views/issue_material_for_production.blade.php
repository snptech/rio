@extends("layouts.app")
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin">
        <div class="row page-heading">
            <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Issue Material For Production </h4>
            </div>
            <div class="col-12 col-lg-2 ml-auto align-self-center align-items-end text-right">
                <a href="{{ route('issue_material_for_production_add') }}" class="btn btn-md btn-primary">Add New +</a>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <div class="tbl-sticky">
                <table class="table table-hover table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Requisition No</th>
                            <th>Material</th>
                            <th>Opening Bal</th>
                            <th>Batch No</th>
                            <th>Viscosity</th>
                            <th>Issual Date</th>
                            <th>Issued Quantity</th>
                            <th>Batch Quantity</th>
                            <th>Finished Batch No</th>
                            <th>Excess</th>
                            <th>Wastage</th>
                            <th>Returned From Day Store</th>
                            <th>Closing Bbalance Qty</th>
                            <th>Dispensed By</th>
                            <th>Remark</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($issue_material))
                        @foreach($issue_material as $temp)
                        <tr>
                            <td> {{$temp->requisition_no}}</td>
                            <td> {{$temp->material}}</td>
                            <td> {{$temp->opening_bal}}</td>
                            <td> {{$temp->batch_no}}</td>
                            <td> {{$temp->viscosity}}</td>
                            <td> {{$temp->issual_date}}</td>
                            <td> {{$temp->issued_quantity}}</td>
                            <td> {{$temp->batch_quantity}}</td>
                            <td> {{$temp->finished_batch_no}}</td>
                            <td> {{$temp->excess}}</td>
                            <td> {{$temp->wastage}}</td>
                            <td> {{$temp->returned_from_day_store}}</td>
                            <td> {{$temp->closing_balance_qty}}</td>
                            <td> {{$temp->supplier_name}}</td>
                            <td> {{$temp->remark}}</td>
                            <td>
                            <a href="{{ route('view_issue_material',['id'=>$temp->id]) }}" class="btn action-btn" data-toggle="tooltip" data-placement="top" title="View"><i data-feather="eye"></i></a>

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
  <!-- End custom js for this page-->
  <script>
      feather.replace()
    $(document).ready(function() {
        $('.datatable').DataTable();
    });

@endpush
