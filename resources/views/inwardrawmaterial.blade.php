@extends("layouts.app")
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
            <div class="">
            <table class="table table-hover table-bordered">
                       <thead>
                        <tr>
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
                        @foreach($inward_material as $temp)
                        <tr>
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
        var table = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        drawCallback: function( settings ) {
            feather.replace();
        },
        ajax: {
            "url": "{{route('inwardpackingrawmaterial-listAjax')}}",
            "type": "POST",
            "dataType": "json",
            'data': function(data){
                // Read values
                var rcdate = $('#ReceiptDate').val();
                var ReceiptNo = $('#ReceiptNo').val();
                var manufacturer = $('#manufacturer').val();
                var supplier = $('#supplier').val();
                var invoiceNo = $('#invoiceNo').val();


                // Append to data
                data.rcdate = rcdate;
                data.ReceiptNo = ReceiptNo;
                data.manufacturer = manufacturer;
                data.supplier = supplier;
                data.invoiceNo = invoiceNo;
                data._token = '{{csrf_token()}}';

                feather.replace()
            }

        },
        columns: [
            {
                "data": "id"
            },

            {
                "data": "from",
                "orderable": true
            },
            {
                "data": "to",
                "orderable": true
            },
            {
                "data": "date_of_receipt",
                "orderable": true
            },
            {
                "data": "manufacturer",
                "orderable": false
            },
            {
                "data": "supplier",
                "orderable": false
            },
            {
                "data": "invoice_no",
                "orderable": true
            },
            {
                "data": "goods_receipt_no",
                "orderable": true
            },
            {
                "data": "submited_by",
                "orderable": false
            },
            {
                "data": "action",
                "orderable": false
            }
        ]
        });
        $('#ReceiptDate').change(function(){
        table.draw();
        });

        $('#ReceiptNo').keyup(function(){
        table.draw();
        });

        $('#manufacturer').change(function(){
        table.draw();
        });
        $('#supplier').change(function(){
        table.draw();
        });
        $('#invoiceNo').keyup(function(){
        table.draw();
        });
    } );
    function remove(url) {

        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
            swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your record has been deleted.',
            'success'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
    }
    function viewrawmatrial(id)
    {
       $.ajax({
         url:'{{route("inwardpackingrawmaterial-view")}}',
         data:{
        "_token": "{{ csrf_token() }}",
        "id": id
        },
        datatype:'json',
         method:"POST"
       }).done(function( html ) {

          $(".modal-body").html(html.html);
      });
    }
  </script>
  @endpush
