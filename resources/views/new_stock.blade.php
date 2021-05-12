@extends("layouts.app")
@section('content')
<div class="content-wrapper">
<div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Finished Goods Inward (Annexure - I) - New Stock</h4>
                </div>
                <div class="col-12 col-lg-2 ml-auto align-self-center align-items-end text-right">
                    <a href="{{ route('new_stock_add') }}" class="btn btn-md btn-primary">Add New +</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
        <div class="tbl-sticky">
            <div class="table-responsive">
                <table class="table table-hover table-bordered datatable">
                    <thead>
                        <tr>
                            <th rowspan="2">Date</th>
                            <th rowspan="2">Product Name</th>
                            <th rowspan="2">Batch No</th>
                            <th rowspan="2">Grade</th>
                            <th rowspan="2">Viscosity</th>
                            <th rowspan="2">Mfg. Date</th>
                            <th rowspan="2">Expiry Retest Date</th>
                            <th colspan="5">Total No. of Drumbs</th>
                            <th rowspan="2">Total Quantity (Kg.)</th>
                            <th rowspan="2">AR No.</th>
                            <th rowspan="2">Approval Date</th>
                            <th rowspan="2">Received by</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>200 Kg</th>
                            <th>50 Kg</th>
                            <th>30 Kg</th>
                            <th>5 Kg</th>
                            <th>Fiber board</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($inward_goods))
                    @foreach($inward_goods as $temp)
                    <tr>
                            <td>{{$temp->inward_date}}</td>
                            <td>{{$temp->product_name}}</td>
                            <td>{{$temp->batch_no}}</td>
                            <td>{{$temp->grade}}</td>
                            <td>{{$temp->viscosity}}</td>
                            <td>{{$temp->mfg_date}}</td>
                            <td>{{$temp->expiry_ratest_date}}</td>
                            <td>{{$temp->total_no_of_200kg_drums}}</td>
                            <td>{{$temp->total_no_of_50kg_drums}}</td>
                            <td>{{$temp->total_no_of_30kg_drums}}</td>
                            <td>{{$temp->total_no_of_5kg_drums}}</td>
                            <td>{{$temp->total_no_of_fiber_board_drums}}</td>
                            <td>{{$temp->total_quantity}}</td>
                            <td>{{$temp->ar_no}}</td>
                            <td>{{$temp->approval_data}}</td>
                            <td>{{$temp->received_by}}</td>
                            <td>
                            <a href="{{ route('view_new_stock',['id'=>$temp->id]) }}" class="btn action-btn" data-toggle="tooltip" data-placement="top" title="View"><i data-feather="eye"></i></a>

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
     $('.datatable').DataTable({
     });

  </script>
@endpush
