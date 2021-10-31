@extends("layouts.app")
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="truck"></i>Finished Goods Dispatch (Annexure -VII)</h4>
                </div>
                <div class="col-12 col-lg-2 ml-auto align-self-center align-items-end text-right">
                    <a href="{{ route('add_dispatch_finished_goods') }}" class="btn btn-md btn-primary">Add New +</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <div class="tbl-sticky">
                <table class="table table-hover table-bordered datatable" id="example">
                <thead>
                        <tr>
                            <th rowspan="2">Date</th>
                            <th rowspan="2">Party Name</th>
                            <th rowspan="2">Product Name</th>
                            <th rowspan="2">Invoice No.</th>
                            <th rowspan="2">Batch No.</th>
                            <th rowspan="2">Grade</th>
                            <th rowspan="2">Viscosity</th>
                            <th colspan="5">Total Drums</th>
                            <th rowspan="2">Total Quantity (Kg)</th>
                            <th rowspan="2">Seal No.</th>
                            <th rowspan="2">Remark</th>
                            <th rowspan="2">Dispatch By</th>
                        </tr>
                        <tr>
                            <th>200Kg</th>
                            <th>50Kg</th>
                            <th>30Kg</th>
                            <th>5Kg</th>
                            <th>Fiber Board Drums</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($finished_good))
                        @foreach($finished_good as $temp)

                        <tr>
                            <td>{{ date("d/m/Y ",strtotime($temp->created_at)) }}</td>
                            <td>{{$temp->company_name}}</td>
                            <td>{{$temp->material_name}}</td>
                            <td>{{$temp->invoice_no}}</td>
                            <td>{{$temp->batch_no}}</td>
                            <td>{{$temp->grades_name}}</td>
                            <td>{{$temp->viscosity}}</td>
                            <td>{{$temp->total_no_of_200kg_drums}}</td>
                            <td>{{$temp->total_no_of_50kg_drums}}</td>
                            <td>{{$temp->total_no_of_30kg_drums}}</td>
                            <td>{{$temp->total_no_of_5kg_drums}}</td>
                            <td>{{$temp->total_no_of_fiber_board_drums}}</td>
                            <td>{{$temp->total_no_qty}}</td>
                            <td>{{$temp->seal_no}}</td>
                            <td>{{$temp->remark}}</td>
                            <td>{{$temp->name}}</td>
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
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />
<script src="//code.jquery.com/jquery-3.5.1.js"></script>


<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets/mdbootstrap4/mdb.min.js')  }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('assets/js/custom.js')  }}"></script>
<!-- End custom js for this page-->

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>
@endpush
