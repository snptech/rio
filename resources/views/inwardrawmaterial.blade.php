@extends("layouts.app")
@section("title","Goods Receipt Note")
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Goods Receipt Note</h4>
                </div>
                <div class="col-12 col-lg-2 ml-auto align-self-center align-items-end text-right">
                    <a href="{{ route('inward-rawmaterials_add') }}" class="btn btn-md btn-primary">Add New +</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <div class="tbl-sticky">
            <table class="table table-hover table-bordered datatable">
                          <thead>
                        <tr>
                        <th>#</th>
                            <th>Inward No</th>
                            <th>Received From</th>
                            <th>Received To</th>
                            <th>Date Of Receipt</th>
                            <th>Material</th>
                            <th>Manufacturer</th>
                            <th>Supplier</th>
                            <th>Supplier Address</th>
                            <th>Supplier Gst</th>
                            <th>Invoice No</th>
                            <th>Remark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($inward_material))
                        @foreach($inward_material as $temp)3
                        <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$temp->inward_no}}</td>
                        <td>{{$temp->received_from}}</td>
                        <td>{{$temp->received_to}}</td>
                        <td>{{$temp->date_of_receipt}}</td>
                        <td>{{$temp->material}}</td>
                        <td>{{$temp->manufacturer}}</td>
                        <td>{{$temp->supplier}}</td>
                        <td>{{$temp->supplier_address}}</td>
                        <td>{{$temp->supplier_gst}}</td>
                        <td>{{$temp->invoice_no}}</td>
                        <td>{{$temp->remark}}</td>
                        <td>Action</td>
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
     $('.datatable').DataTable({
     });

  </script>
  @endpush



