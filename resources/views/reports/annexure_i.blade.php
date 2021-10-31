@extends("layouts.app")
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="shopping-cart"></i>Finished Goods Inward (Annexure - I)</h4>
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
                            <th rowspan="2">Inward No</th>
                            <th rowspan="2">Date of Receipt</th>
                            <th rowspan="2">Opening Balance</th>
                            <th rowspan="2">Name of Manufacturer</th>
                            <th rowspan="2">Name of Supplier</th>
                            <th rowspan="2">Raw Material Name</th>
                            <th rowspan="2">Invoice Number</th>
                            <th rowspan="2">GRN</th>
                            <th rowspan="2">Viscosity</th>

                            <th rowspan="2">Total Quantity (Kg.)</th>
                            <th rowspan="2">Pack Size</th>
                            <th rowspan="2">Batch No.</th>
                            <th colspan="2">Manufacturer’s</th>
                            <th rowspan="2">RioCars’s Expiry / Retest Date</th>
                        </tr>
                        <tr>
                            <th>Mfg. Date</th>
                            <th>Expiry / Retest Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($inward_material))
                        @php $i=1; @endphp
                        @foreach($inward_material as $temp)
                        <tr>

                            <td>{{$temp->inward_no}}</td>
                            <td>{{isset($temp->date_of_receipt)?date("d/m/Y",$temp->date_of_receipt):""}}</td>
                            <td>{{$temp->opening_stock}}</td>
                            <td>{{$temp->man_name}}</td>
                            <td>{{$temp->name}}</td>
                            <td>{{$temp->material_name}}</td>
                            <td>{{$temp->invoice_no}}</td>
                            <td>{{$temp->goods_receipt_no}}</td>
                            <td>{{$temp->viscosity}}</td>
                            <td>{{$temp->qty_received_kg}}</td>
                            <td>{{$temp->mesurment}}</td>
                            <td>{{$temp->batch_no}}</td>
                            <td>{{$temp->mfg_date!=""?date("d/m/Y",($temp->mfg_date)):""}}</td>
                            <td>{{$temp->mfg_expiry_date!=""?date("d/m/Y",($temp->mfg_expiry_date)):""}}</td>
                            <td>{{$temp->rio_care_expiry_date!=""?date("d/m/Y",($temp->rio_care_expiry_date)):""}}</td>
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
