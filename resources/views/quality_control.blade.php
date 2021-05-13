@extends("layouts.app")
@section('content')

<div class="content-wrapper">
    <div class="row">

        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Quality Control Approval/Rejection (Annexure -VI)</h4>
                </div>

            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <div class="tbl-sticky">
                <div class="table-responsive">
                    <div class="col-md-12">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-info alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                    </div>

                        <table class="table table-hover table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Quality<br />(Kg)</th>
                                    <th>Name of <br />Manufacturer</th>
                                    <th>Name of Supplier</th>
                                    <th>Raw Material Name</th>
                                    <th>Batch No.</th>
                                    <th>GRN</th>
                                    <th>AR No.</th>
                                    <th>Quantity Approved</th>
                                    <th>Quantity Rejected</th>
                                    <th>Date of Approval</th>
                                    <th>Status</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($quality_control))
                                @foreach($quality_control as $temp)
                                <tr>
                                    <td>{{ date('d / m /Y',strtotime($temp->created_at))}}</td>

                                    <td>{{$temp->qty_received_kg}}</td>
                                    <td>{{$temp->manufacturer}}</td>
                                    <td>{{$temp->name}}</td>
                                    <td>{{$temp->material_name}}</td>
                                    <td>{{$temp->batch_no}}</td>
                                    <td>{{$temp->goods_receipt_no}}</td>
                                    <td>{{$temp->ar_no_date}}</td>
                                    <td>{{$temp->quantity_approved}}</td>
                                    <td>{{$temp->quantity_rejected}}</td>
                                    <td>{{$temp->date_of_approval}}</td>
                                    @if($temp->quantity_status=='Approved')
                                    <td><span class="badges text-success">Approved</span></td>
                                    @elseif($temp->quantity_status=='Rejected')
                                    <td><span class="badges text-danger">Rejected</span></td>
                                    @else
                                    <td>&nbsp;</td>
                                    @endif
                                    <td><small>{{$temp->remark}}</small></td>
                                    <td>
                                        @if(!$temp->quality_id)
                                        <a href="#checkQuntity" data-toggle="modal" title="View" data-target="#checkQuntity" id="qty_control" data-id="{{ $temp->quality_id }}"  onclick="qualitycontrol('{{$temp->itemid}}')"class="btn btn-primary btn-sm">&nbsp;&nbsp;&nbsp;Check&nbsp;&nbsp;&nbsp;</a>
                                        @else
                                        <a href="#" class="btn action-btn" data-toggle="modal" data-target="#viewsupplier" title="View" onclick="viewquality({{$temp->itemid}})"><i data-feather="eye"></i></a>
                                        @endif
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
    </div>
    <div class="modal fade show" id="checkQuntity" tabindex="-1" aria-labelledby="checkQuntityLabel" aria-modal="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

            </div>
        </div>
    </div>
    </div>
    @endsection

    @push("models")
  <div class="modal fade show" id="qualitycontrol" tabindex="-1" aria-labelledby="checkQuntityLabel" aria-modal="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="checkQuntityLabel">Quality Check Details</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>
@endpush
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('.datatable').DataTable({});

        });


      function viewquality(quality_id)
        {
        $.ajax({
            url:'{{ route('view_quality') }}',
            data:{
            "_token": "{{ csrf_token() }}",
            "quality_id": quality_id
            },
            datatype:'json',
            method:"POST"
        }).done(function( html ) {

            $(".modal-body").html(html.html);
        });
        }
    </script>

    @endpush
