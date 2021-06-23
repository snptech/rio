@extends("layouts.app")
@section("title","life Of Equipment")
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                  <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="tool"></i>Batch Manufacturing Records - List of Equipment</h4>
                </div>
                <div class="col-12 col-lg-2 ml-auto align-self-center align-items-end text-right">
                  <a href="{{route('add-batch-manufacturing-record-list-of-equipment')}}" class="btn btn-md btn-primary">Add New +</a>
                </div>
              </div>
            </div>
          </div>
		  <div class="card main-card">
          <div class="card-body">
                @if (Session::has('error'))
                <div id="" class="alert alert-danger col-md-12">{!! Session::get('error') !!}
                </div>
                @endif
                @if (Session::has('message'))
                    <div id="" class="alert alert-success col-md-12">{!! Session::get('message') !!}
                    </div>
                @endif
                @if (Session::has('danger'))
                    <div id="" class="alert alert-danger col-md-12">{!! Session::get('message') !!}
                    </div>
                @endif

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
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th>Sr.No.</th>
								<th>Product Name</th>
								<th>Batch No.</th>
								<th>BMR No.</th>
								<th>Ref MFR No.</th>
								<!-- <th>Equipment Name</th>
								<th>Equipment Code</th> -->
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                        @if(count($list_equipment))
                        @foreach($list_equipment as $temp)
                        <tr>
                            	<td>{{$loop->index+1}}</td>
								<td>{{$temp->proName}}</td>
								<td>{{$temp->bmrNo}}</td>
								<td>{{$temp->batchNo}}</td>
								<td>{{$temp->refMfrNo}}</td>
								<!-- <td>{{$temp->EquipmentName}}</td>
								<td>{{$temp->EquipmentCode}}</td> -->
								<td class="actions">
                                <a href="#" class="btn action-btn view" id="myModal" data-tooltip="tooltip" value="{{$temp->id}}" data-id="{{$temp->id}}" title="View" data-toggle="modal" data-target="#viewDetail"><i data-feather="eye"></i></a>
                               <a href="{{url('list_of_equipment_edit',[$temp->id])}}" class="btn action-btn" data-tooltip="tooltip" title="Edit"><i data-feather="edit-3"></i></a>
                                <a href="{{url('list_of_equipment_delete',$temp->id)}}" class="btn action-btn" data-tooltip="tooltip" title="Delete"><i data-feather="trash"></i></a></td>
							</tr>

                        @endforeach
                        @endif

						</tbody>
					</table>
				</div>
				<div class="row mt-3"><div class="col-sm-12 col-md-5">
					  <div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
					  </div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li></ul></div></div></div>
			</div>
		  </div>

		</div>
	</div>
    <div class="modal fade" id="viewDetail" tabindex="-1" aria-labelledby="checkQuntityLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkQuntityLabel">View Batch Manufacturing Records - List of Equipment</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body data_push">

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
@endsection
@push("scripts")

 <script>
$(document).ready(function() {

$('.view').on('click',function(){
        var id =$(this).attr('data-id')
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       $.ajax({
      type: "post",
      url: 'list_of_equipment_view',
      data:  {'_method':'post', _token: CSRF_TOKEN,id:id},
      success: function (data) {
     $('#viewDetail').modal('show');
       var str = '';
        str += '<div class="form-row form-detail">';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>PRODUCT NAME</label>';
        str += '<h4>'+data.res_data.proName+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>BMR NO.</label>';
        str += ' <h4>'+data.res_data.bmrNo+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>BATCH NO.</label>';
        str += '<h4>'+data.res_data.batchNo+'</h4>';
        str += '</div></div>';
        str += '<div class="col-12 col-md-6 col-lg-6 col-xl-6">';
        str += '<div class="form-group">';
        str += '<label>REF MFR NO.</label>';
        str += '<h4>'+data.res_data.refMfrNo+'</h4>';
        str += '</div></div>';
        str += '<h4>List of Equipment in Manufacturing Process </h4>';
        str += '<table class="table table-hover table-bordered"><thead><tr><th>Sr.No.</th><th>Equipment Name</th><th>Equipment Code</th></tr></thead>';

        str+='<tbody>';
          $.each( data.res, function( key, value ) {
        str +='<tr><td>'+value.id+'</td><td>'+value.EquipmentName+'</td><td>'+value.EquipmentCode+'</td></tr>';
        });
        str+='</tbody></table></div>';
        $('.data_push').html(str);
      }
    });
});
});
 </script>

@endpush
