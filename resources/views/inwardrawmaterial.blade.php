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
                            <th>Invoice No</th>
                            <th>Remark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($inward_material))
                        @php $i=1; @endphp
                        @foreach($inward_material as $temp)
                        <tr>
                        <td>{{ $i }}</td>
                        <td>{{$temp->inward_no}}</td>
                        <td>{{$temp->fromdepartment}}</td>
                        <td>{{$temp->todepartment}}</td>
                        <td>{{$temp->date_of_receipt}}</td>
                        <td>{{$temp->material_name}}</td>
                        <td>{{$temp->man_name}}</td>
                        <td>{{$temp->name}}</td>

                        <td>{{$temp->invoice_no}}</td>
                        <td>{{$temp->remark}}</td>
                        <td class="actions"><a href="#" class="btn action-btn" data-toggle="modal" data-target="#viewsupplier" title="View" onclick="viewsupp({{$temp->id}})"><i data-feather="eye"></i></a></td>
                        </tr>
                        @php $i++; @endphp
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
    function remove(url) {

@endpush

