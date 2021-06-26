@extends("layouts.app")
@section("title","New Batch")
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="tool"></i>Batch Manufacturing Records</h4>
                </div>
                <div class="col-12 col-lg-2 ml-auto align-self-center align-items-end text-right">
                    <a href="{{route('add-batch-manufacturing-record')}}" class="btn btn-md btn-primary">Add New +</a>
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
                            <input type="date" class="form-control" id="ReceiptDate" placeholder="Date of Receipt">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="ReceiptNo" placeholder="Batch No.">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="MaterialName" placeholder="Product Name">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <button type="search" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
            <div class="tbl-sticky">
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
                <table class="table table-hover table-bordered datatable" id="example">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Date</th>
                            <th>Product Name</th>
                            <th>Batch No.</th>
                            <th>BMR No.</th>
                            <th>Ref MFR No.</th>
                            <th>Grade</th>
                            <th>Batch Size</th>
                            <th>Viscosity</th>
                            <th>Production Commenced on</th>
                            <th>Production Completed on</th>
                            <th>Manufacturing Date</th>
                            <th>Retest Date</th>
                            <th>Deviation sheet attached</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($manufacture))
                        @foreach($manufacture as $temp)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$temp->ManufacturingDate}}</td>
                            <td>{{$temp->proName}}</td>
                            <td>{{$temp->bmrNo}}</td>
                            <td>{{$temp->batchNo}}</td>
                            <td>{{$temp->refMfrNo}}</td>
                            <td>{{$temp->grade}}</td>
                            <td>{{$temp->BatchSize}}</td>
                            <td>{{$temp->Viscosity}}</td>
                            <td>{{$temp->ProductionCommencedon}}</td>
                            <td>{{$temp->ProductionCompletedon}}</td>
                            <td>{{$temp->ManufacturingDate}}</td>
                            <td>{{$temp->RetestDate}}</td>
                            <td>{{$temp->approvalDate}}</td>
                            <td>{{$temp->inlineRadioOptions}}</td>
                            @if($temp->approval=='Approved')
                             <td><span class="badge badge-success p-2">Approved</span></td>
                            @else
                            <td><span class="badge badge-warning p-2">Not Approved</span></td>
                            @endif


                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- <div class="modal fade show" id="checkQuntity" tabindex="-1" aria-labelledby="checkQuntityLabel" aria-modal="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkQuntityLabel">Material Name - Batch no.</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form action="#" method="_post" id="checkQuantity">
                    <div class="form-row">
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="QuantityApproved">Quantity Approved</label>
                                <input type="text" class="form-control" id="QuantityApproved" placeholder="Quantity Approved">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="QuantityRejected">Quantity Rejected</label>
                                <input type="text" class="form-control" id="QuantityRejected" placeholder="Quantity Rejected">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="Status">Status</label>
                                <select class="form-control select" id="Status">
                                    <option>Select</option>
                                    <option>Approved</option>
                                    <option>Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="ApprovalDate">Date of Approval</label>
                                <input type="date" class="form-control calendar" id="ApprovalDate" placeholder="DD-MM-YYYY">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="Remark">Remark</label>
                                <textarea class="form-control" id="Remark" placeholder="Remark"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-md m-0">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<div class="modal fade" id="viewDetail" tabindex="-1" aria-labelledby="checkQuntityLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkQuntityLabel">View Batch Manufacturing Records
</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body data_push">

           </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets/mdbootstrap4/mdb.min.js')  }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/js/custom.js')  }}"></script>
    <!-- End custom js for this page-->
  <script>
$(document).ready(function() {


$('.view').on('click',function(){
        var id =$(this).attr('data-id')
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       $.ajax({
      type: "post",
      url: 'add_btch_manufacture_view',
      data:  {'_method':'post', _token: CSRF_TOKEN,id:id},
      success: function (data) {
     $('#viewDetail').modal('show');
       var str = '';
        str += '<div class="form-row form-detail">';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>Product Name</label>';
        str += '<h4>'+data.res.proName+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>BMR NO.</label>';
        str += ' <h4>'+data.res.bmrNo+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>BATCH NO.</label>';
        str += '<h4>'+data.res.batchNo+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>REF MFR NO.</label>';
        str += '<h4>'+data.res.refMfrNo+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>Grade</label>';
        str += '<h4>'+data.res.grade+'</h4>';
        str += '</div></div>';
        str += '</div>';
        str += '<div class="form-row form-detail">';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>Batch Size</label>';
        str += '<h4>'+data.res.BatchSize+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>Viscosity</label>';
        str += ' <h4>'+data.res.Viscosity+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>Production Commenced on</label>';
        str += '<h4>'+data.res.ProductionCommencedon+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>Production Completed on</label>';
        str += '<h4>'+data.res.ProductionCompletedon+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>Manufacturing Date</label>';
        str += '<h4>'+data.res.ManufacturingDate+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>Retest Date</label>';
        str += '<h4>'+data.res.RetestDate+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>Prepared by</label>';
        str += '<h4>'+data.res.doneBy+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>Checked By</label>';
        str += '<h4>'+data.res.checkedBy+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>Deviation Sheet attached</label>';
        str += '<h4>'+data.res.inlineRadioOptions+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>This Batch is approved/not approved</label>';
        str += '<h4>'+data.res.approval+'</h4>';
        str += '</div></div>';
        str += '</div>';
        str += '<div class="form-row form-detail">';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>This Batch is approved/not approved on</label>';
        str += '<h4>'+data.res.approvalDate+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>Reviewed and Approved by</label>';
        str += ' <h4>'+data.res.checkedByI+'</h4>';
        str += '</div></div>';
        str += '</div>';
        str+='</div>';
        $('.data_push').html(str);
      }
    });
});
function deleteConfirmation(id){
    alert(id);

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

swal({
    title: "Are you sure!",
    type: "error",
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes!",
    showCancelButton: true,
},
function() {
        $.ajax({
            type: "POST",
            url: 'add_btch_manufacture_delete',
            data:  {'_method':'DELETE', _token: CSRF_TOKEN,id:id},
            success: function (data) {
                swal(data.status,data.message);
                location.reload();
            }
          });
   });
}
});

   </script>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
   <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

   <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

   <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endpush
