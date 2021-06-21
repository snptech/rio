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
								<th>Equipment Name</th>
								<th>Equipment Code</th>
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
								<td>{{$temp->EquipmentName}}</td>
								<td>{{$temp->EquipmentCode}}</td>
								<td class="actions"><a href="#" class="btn action-btn" data-tooltip="tooltip" title="View"><i data-feather="eye"></i></a><a href="#" class="btn action-btn" data-tooltip="tooltip" title="Edit"><i data-feather="edit-3"></i></a><a href="#" class="btn action-btn" data-tooltip="tooltip" title="Delete"><i data-feather="trash"></i></a></td>
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

<div class="modal fade show" id="checkQuntity" tabindex="-1" aria-labelledby="checkQuntityLabel" aria-modal="true">
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
</div>
@endsection
@push("scripts")
<script>
    feather.replace()
	/*$(document).ready(function() {
		var c = 1;
      $(".add-more").click(function(){
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){
          $(this).parents(".add-more-new").remove();
      });
    });*/
	$(document).ready(function() {
		var max_fields      = 15; //maximum input boxes allowed
		var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
		var add_button      = $(".add_field_button"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function(e){ //on add input button click
			e.preventDefault();
			if(x < max_fields){ //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">'+x+'</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6"><div class="form-group"><label for="packingMaterialName['+x+']">Packing Material Name</label><select class="form-control select" id="packingMaterialName['+x+']"><option>Select Material Name</option></select></div></div><div class="col-12 col-md-6"><div class="form-group"><label for="Quantity['+x+']">Total Quantity Received (Nos.)</label><input type="text" class="form-control" id="Quantity['+x+']" placeholder="Quantity"></div></div><div class="col-12 col-md-6"><div class="form-group"><label for="ARNo['+x+']">AR No. / Date</label><input type="text" class="form-control" id="ARNo['+x+']" placeholder="AR No. / Date"></div></div></div>'); //add input box
			}
			feather.replace()
		});

		$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
			e.preventDefault(); $(this).parents('div.row').remove(); x--;
		})
	});
  </script>

@endpush
