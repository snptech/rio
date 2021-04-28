@extends('section.app')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                  <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Goods Receipt Note (Packing Material)</h4>
                </div>
                <div class="col-12 col-lg-2 ml-auto align-self-center align-items-end text-right">
                  <a href="add_inward_packing_material" class="btn btn-md btn-primary">Add New +</a>
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
									<input type="text" class="form-control" id="ReceiptNo" placeholder="Receipt No.">
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="form-group">
									<input type="text" class="form-control" id="MaterialName" placeholder="Material Name">
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="form-group">
									<input type="text" class="form-control" id="Manufacturer" placeholder="Name of Manufacturer">
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="form-group">
									<input type="text" class="form-control" id="Supplier" placeholder="Name of Supplier">
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="form-group">
									<input type="text" class="form-control" id="invoiceNo" placeholder="invoice No.">
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
								<th>Date of Receipt</th>
								<th>Packing Material Name</th>
								<th>Name of Manufacturer</th>
								<th>Name of Supplier</th>
								<th>Invoice No./ Challan</th>
								<th>Pack Size</th>
								<th>Quantity</th>
								<th>GRN</th>
								<th>Checked by</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>16/03/2021</td>
								<td>Material 1</td>
								<td>Manufacturer name here</td>
								<td>Supplier name goes here</td>
								<td>ABC1234567</td>
								<td>5</td>
								<td>500</td>
								<td>ABC2021</td>
								<td>Employee Name</td>
								<td class="actions"><a href="#" class="btn action-btn" data-toggle="tooltip" title="View"><i data-feather="eye"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Edit"><i data-feather="edit-3"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Delete"><i data-feather="trash"></i></a></td>
							</tr>
							<tr>
								<td>16/03/2021</td>
								<td>Material 1</td>
								<td>Manufacturer name here</td>
								<td>Supplier name goes here</td>
								<td>ABC1234567</td>
								<td>5</td>
								<td>500</td>
								<td>ABC2021</td>
								<td>Employee Name</td>
								<td class="actions"><a href="#" class="btn action-btn" data-toggle="tooltip" title="View"><i data-feather="eye"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Edit"><i data-feather="edit-3"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Delete"><i data-feather="trash"></i></a></td>
							</tr>
							<tr>
								<td>16/03/2021</td>
								<td>Material 1</td>
								<td>Manufacturer name here</td>
								<td>Supplier name goes here</td>
								<td>ABC1234567</td>
								<td>5</td>
								<td>500</td>
								<td>ABC2021</td>
								<td>Employee Name</td>
								<td class="actions"><a href="#" class="btn action-btn" data-toggle="tooltip" title="View"><i data-feather="eye"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Edit"><i data-feather="edit-3"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Delete"><i data-feather="trash"></i></a></td>
							</tr>
							<tr>
								<td>16/03/2021</td>
								<td>Material 1</td>
								<td>Manufacturer name here</td>
								<td>Supplier name goes here</td>
								<td>ABC1234567</td>
								<td>5</td>
								<td>500</td>
								<td>ABC2021</td>
								<td>Employee Name</td>
								<td class="actions"><a href="#" class="btn action-btn" data-toggle="tooltip" title="View"><i data-feather="eye"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Edit"><i data-feather="edit-3"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Delete"><i data-feather="trash"></i></a></td>
							</tr>
							<tr>
								<td>16/03/2021</td>
								<td>Material 1</td>
								<td>Manufacturer name here</td>
								<td>Supplier name goes here</td>
								<td>ABC1234567</td>
								<td>5</td>
								<td>500</td>
								<td>ABC2021</td>
								<td>Employee Name</td>
								<td class="actions"><a href="#" class="btn action-btn" data-toggle="tooltip" title="View"><i data-feather="eye"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Edit"><i data-feather="edit-3"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Delete"><i data-feather="trash"></i></a></td>
							</tr>
							<tr>
								<td>16/03/2021</td>
								<td>Material 1</td>
								<td>Manufacturer name here</td>
								<td>Supplier name goes here</td>
								<td>ABC1234567</td>
								<td>5</td>
								<td>500</td>
								<td>ABC2021</td>
								<td>Employee Name</td>
								<td class="actions"><a href="#" class="btn action-btn" data-toggle="tooltip" title="View"><i data-feather="eye"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Edit"><i data-feather="edit-3"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Delete"><i data-feather="trash"></i></a></td>
							</tr>
							<tr>
								<td>16/03/2021</td>
								<td>Material 1</td>
								<td>Manufacturer name here</td>
								<td>Supplier name goes here</td>
								<td>ABC1234567</td>
								<td>5</td>
								<td>500</td>
								<td>ABC2021</td>
								<td>Employee Name</td>
								<td class="actions"><a href="#" class="btn action-btn" data-toggle="tooltip" title="View"><i data-feather="eye"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Edit"><i data-feather="edit-3"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Delete"><i data-feather="trash"></i></a></td>
							</tr>
							<tr>
								<td>16/03/2021</td>
								<td>Material 1</td>
								<td>Manufacturer name here</td>
								<td>Supplier name goes here</td>
								<td>ABC1234567</td>
								<td>5</td>
								<td>500</td>
								<td>ABC2021</td>
								<td>Employee Name</td>
								<td class="actions"><a href="#" class="btn action-btn" data-toggle="tooltip" title="View"><i data-feather="eye"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Edit"><i data-feather="edit-3"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Delete"><i data-feather="trash"></i></a></td>
							</tr>
							<tr>
								<td>16/03/2021</td>
								<td>Material 1</td>
								<td>Manufacturer name here</td>
								<td>Supplier name goes here</td>
								<td>ABC1234567</td>
								<td>5</td>
								<td>500</td>
								<td>ABC2021</td>
								<td>Employee Name</td>
								<td class="actions"><a href="#" class="btn action-btn" data-toggle="tooltip" title="View"><i data-feather="eye"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Edit"><i data-feather="edit-3"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Delete"><i data-feather="trash"></i></a></td>
							</tr>
							<tr>
								<td>16/03/2021</td>
								<td>Material 1</td>
								<td>Manufacturer name here</td>
								<td>Supplier name goes here</td>
								<td>ABC1234567</td>
								<td>5</td>
								<td>500</td>
								<td>ABC2021</td>
								<td>Employee Name</td>
								<td class="actions"><a href="#" class="btn action-btn" data-toggle="tooltip" title="View"><i data-feather="eye"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Edit"><i data-feather="edit-3"></i></a><a href="#" class="btn action-btn" data-toggle="tooltip" title="Delete"><i data-feather="trash"></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row mt-3"><div class="col-sm-12 col-md-5">
					  <div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
					  </div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li></ul></div></div></div>
			</div>
		  </div>

		</div>

@endsection
