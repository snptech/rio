@extends("layouts.app")
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="hard-drive"></i>Issual by stores for production for captive consumption-simethicone (Annexure - II)</h4>
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
                            <th>Requisition No.</th>
                            <th>Opening Balance</th>
                            <th>Issual Date</th>
                            <th>Product Name</th>
                            <th>Batch No.</th>
                            <th>Quantity</th>
                            <th>For FG- Batch No</th>
                            <th>Returned<br />from<br />Day<br />Store</th>
                            <th>Dispensed by</th>
                            <th>Remark</th>


                        </tr>
                    </thead>
                    <tbody>
                        @if(count($issue_stores))
                        @foreach($issue_stores as $temp)
                        <tr>
                            <td>{{$temp->requisition_no}}</td>
                            <td>{{$temp->opening_balance}}</td>
                            <td>{{$temp->issual_date}}</td>
                            <td>{{$temp->material_name}}</td>
                            <td>{{$temp->batch_no}}</td>
                            <td>{{$temp->quantity}}</td>
                            <td>{{$temp->for_fg_batch_no}}</td>
                            <td>{{$temp->returned_from_day_store}}</td>
                            <td>{{$temp->dispensed_by}}</td>
                            <td>{{$temp->remark}}</td>

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
