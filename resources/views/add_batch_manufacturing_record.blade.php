@extends("layouts.app")
@section("title","Add batch Manufacture")
@section('content')


<div class="content-wrapper">
	<div class="row">
		<div class="col-md-12 grid-margin">
			<div class="row page-heading">
				<div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
					<h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Add Batch Manufacturing Records</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="card main-card">
		<div class="card-body">
			<div class="card-body">
				@if ($message = Session::get('success'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
				</div>
				@endif

				@if ($message = Session::get('error'))
				<div class="alert alert-danger alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong> {{ $message }}</strong>
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

				<ul class="nav nav-tabs" role="tablist">
					<li><a role="tab" data-toggle="tab" href="#batch" class="active">Batch</a></li>
					@if(isset($batch) && $batch)
					<li class="dropdown"><a role="tab" class="dropdown-toggle" data-toggle="dropdown" href="#">Raw Material<span class="caret"></span></a>
						<ul class="dropdown-menu">
						  <li><a role="tab" data-toggle="tab" href="#requisition">Requisition</a></li>
							<li><a role="tab" data-toggle="tab" href="#issualofrequisition">Issual of requisition</a></li>
							<!--<li><a role="tab" data-toggle="tab" href="#billOfRawMaterial">Bill of Raw Material</a></li>-->
						</ul>
					</li>

					<li class="dropdown"><a role="tab" class="dropdown-toggle" data-toggle="dropdown" href="#">Packing Material<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a role="tab" data-toggle="tab" href="#requisitionpacking">Requisition</a></li>
							<li><a role="tab" data-toggle="tab" href="#issualofrequisitionpacking">Issual of requisition</a></li>
							<!--<li><a role="tab" data-toggle="tab" href="#billOfRawMaterialpacking">Bill of Packing Raw Material</a></li>-->
						</ul>
					</li>

					<li><a role="tab" data-toggle="tab" href="#listOfEquipment">List of Equipment</a></li>
					<li><a role="tab" data-toggle="tab" href="#addLots_listing">Lots </a></li>

					<li><a role="tab" data-toggle="tab" href="#homogenizing">Homogenizing</a></li>
					<li><a data-toggle="tab" href="#Packing">Packing</a></li>
					<li><a data-toggle="tab" href="#generate_label">Generate Label</a></li>
					@endif
				</ul>
				<div class="tab-content">
					<div id="batch" class="tab-pane fade in active show">
						<form id="add_manufacturing" method="post" action="{{ route('add_manufacturing_insert') }}">
							@csrf
							<div class="form-row">
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="proName" class="active">Product Name</label>
										<!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)"> -->
										{{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","placeholder"=>"Choose Product Name")) }}

									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="bmrNo" class="active">BMR No.</label>
										<input type="text" class="form-control" name="bmrNo" id="bmrNo" placeholder="BMR No." pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="batchNo">Batch No.</label>
										<input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Batch No." pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)">
									</div>
									@if ($errors->has('proName'))
									   <span class="text-danger">{{ $errors->first('proName') }}</span>
									@endif
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="refMfrNo">Ref. MFR No.</label>
										<input type="text" class="form-control" name="refMfrNo" id="refMfrNo" placeholder="Ref. MFR No." pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="grade" class="active">Grade</label>
										<input type="text" class="form-control" name="grade" id="grade" placeholder="Grade" pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"
>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="BatchSize" class="active">Batch Size</label>
										<input type="number" class="form-control" name="BatchSize" id="BatchSize" placeholder="batch size" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="Viscosity" class="active">Viscosity</label>
										<input type="text" class="form-control" name="Viscosity" id="Viscosity" placeholder="Viscosity" pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6"> &nbsp; </div>

								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="ProductionCommencedon" class="active">Production Commenced on</label>
										<input type="date" class="form-control" name="ProductionCommencedon" id="ProductionCommencedon" value="{{ date('Y-m-d') }}">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="ProductionCompletedon" class="active">Production Completed on</label>
										<input type="date" class="form-control" name="ProductionCompletedon" id="ProductionCompletedon" placeholder="" value="{{ date('Y-m-d') }}">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="ManufacturingDate" class="active">Manufacturing Date</label>
										<input type="date" class="form-control" name="ManufacturingDate" id="ManufacturingDate" placeholder="" value="{{ date('Y-m-d') }}">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="RetestDate" class="active">Retest Date</label>
										<input type="date" class="form-control" name="RetestDate" id="RetestDate" placeholder="" value="{{ date('Y-m-d') }}">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="doneBy">Prepared by</label>
										<input class="form-control" type="text" name="doneBy" id="doneBy" value="{{ \Auth::user()->name }}" readonly>

									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="checkedBy">Checked by</label>
										<input class="form-control" type="text" name="checkedBy" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>
									</div>
								</div>


								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="checkedByI">Reviewed and Approved by</label>
										<input type="text" class="form-control select" name="checkedByI" id="checkedByI" value="{{ \Auth::user()->name }}" readonly>

									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="approval" class="active">This Batch is approved/not approved</label>
										<select class="form-control select" name="approval" id="approval">
											<option>-- Select Option --</option>
											<option value="Approved">Approved</option>
											<option value="Not Approved">Not Approved</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="Remark" class="active">Note / Remark</label>
										<textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div id="billOfRawMaterial" class="tab-pane fade">
						<form id="add_batch_manufacturing_bill" method="post" action="{{ route('add_batch_manufacturing_recorde_insert') }}">
							@csrf
							<div class="form-row">
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="proName" class="active">Product Name</label>
											<?php
												$proId = isset($batchdetails['proName'])?$batchdetails['proName']:'';
												$proName = isset($product[$proId])?$product[$proId]:'Choose Product Name';
											?>
										<select name="proName" id="proName" readonly class="form-control select">
											<option value="{{$proId}}" class="form-control" selected="selected">
											{{$proName}}
											</option>
										</select>

										@if ($errors->has('proName'))
										<span class="text-danger">{{ $errors->first('proName') }}</span>
										@endif
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="bmrNo" class="active">BMR No.</label>
										<input type="text" class="form-control" name="bmrNo" id="bmrNo" placeholder="BMR No." pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->bmrNo)?$batchdetails->bmrNo:old('bmrNo') }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="batchNoI">Batch No.</label>
										<input type="text" class="form-control" name="batchNoI" id="batchNoI" placeholder="Batch No." pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"  value="{{ isset($batchdetails->batchNo)?$batchdetails->batchNo:old('batchNoI') }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="refMfrNo">Ref. MFR No.</label>
										<input type="text" class="form-control" name="refMfrNo" id="refMfrNo" placeholder="Ref. MFR No."  pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->refMfrNo)?$batchdetails->refMfrNo:old('refMfrNo') }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-12 col-lg-12 col-xl-12">
									<div class="form-group input_fields_wrap" id="MaterialReceived">
										<label class="control-label d-flex">Bill of Raw Material Details and Weighing Record</label>
										@if(isset($raw_material_bills))
										
										@foreach( $raw_material_bills as $mat )
										
										@foreach($mat as $index => $rd)
											
											<div class="row add-more-wrap after-add-more m-0 mb-4">
												<div class="col-12 col-md-6 col-lg-4">
													<div class="form-group">
														@php $rw = [$rd->material_id => $rawmaterials[$rd->material_id] ];
														@endphp
														<label for="rawMaterialName" class="active">Raw Material</label>
														{{ Form::select("rawMaterialName[]",$rw,old(),array("class"=>"form-control","readonly")) }}
													</div>
												</div>

												<div class="col-12 col-md-6 col-lg-4">
													<div class="form-group">
														<label for="Quantity" class="active">Quantity (Kg.)</label>
														<input type="number" class="form-control" name="Quantity[]" id="Quantity" placeholder="" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'') value="{{isset($rd->requesist_qty)?$rd->requesist_qty:('Quantity[]')}}" readonly>
													</div>
												</div>
												<div class="col-12 col-md-6 col-lg-4">
													<div class="form-group">
														<label for="arNo" class="active">AR No.</label>
														<input type="text" class="form-control" name="arNo[]" id="arNo" placeholder="" value="{{isset($rd->ar_no_date)?$rd->ar_no_date:old('arNo[]')}}" readonly>
													</div>
												</div>
												<div class="col-12 col-md-6 col-lg-4">
													<div class="form-group">
														<label for="date" class="active">Date</label>
														<input type="date" class="form-control calendar" name="date[]" id="date" value="{{ date('Y-m-d') }}" readonly>
													</div>
												</div>
											</div>
										@endforeach
										@endforeach
										@endif
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="doneBy">Weighed by</label>
										<input type="text" class="form-control select" name="doneBy" value="{{ \Auth::user()->name }}" id="doneBy" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="checkedBy">Checked by</label>
										<input type="text" class="form-control select" name="checkedBy" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="Remark" class="active">Note / Remark</label>
										<textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
                                        <input type="hidden" name="batch_id" id="batch_id" value="{{ isset($batchdetails->id)?$batchdetails->id:old('batch_id') }}" />
										<input type="hidden" name="currentForm" value="#billOfRawMaterial">
										<input type="hidden" name="nextForm" value="#requisitionpacking">
										<button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					 <div id="requisition" class="tab-pane fade">
						<form id="packing_material_requisition_slip" method="post" action="{{ route('packing_material_requisition_slip_insert') }}">
							@csrf
							<input type="hidden" value="issualofrequisition" name="nextForm">
							<div class="form-row">
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="from" class="active">From</label>
										<select name="from" id="from" class="form-control select" readonly>
											 @if(count($department))
												@foreach($department as $temp)
													@if($temp->id==2)
														<option value="{{$temp->id}}">{{$temp->department}} </option>
													@endif
												@endforeach
											@endif
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="to" class="active">To</label>
										<select name="to" id="to" class="form-control select" readonly>
											 @if(count($department))
												@foreach($department as $temp)
													@if($temp->id==3)
														<option value="{{$temp->id}}">{{$temp->department}} </option>
													@endif
												@endforeach
											@endif
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="batchNo">Batch No.</label>
										<input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Batch No." value="{{ isset($batchdetails->batchNo)?$batchdetails->batchNo:old('batchNo') }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="Date" class="active">Date</label>
										<input type="date" class="form-control calendar" name="Date" id="Date" value="{{ date('Y-m-d') }}">
									</div>
								</div>

								<div class="col-12 col-md-12 col-lg-12 col-xl-12">
									<div class="form-group input_fields_wrap_6" id="MaterialReceived">
										<label class="control-label d-flex">Material Detail
											<div class="input-group-btn text-right">
												<button class="btn btn-dark add-more add_field_button_6 waves-effect waves-light" type="button">Add More +</button>
											</div>
										</label>
										<div class="row add-more-wrap after-add-more m-0 mb-4">
											<span class="add-count">1</span>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="rawMaterialName" class="active">Raw Material Name</label>
													{{ Form::select("rawMaterialName[]",$rawmaterials,old("rawMaterialName"),array("id"=>"rawMaterialName","class"=>"form-control","placeholder"=>"Raw Material Name")) }}

												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="Quantity" class="active">Quantity (Kg.)</label>
													<input type="number" class="form-control" name="Quantity[]" id="Quantity1" placeholder="">
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="checkedBy">Checked By</label>
										<input type="text" class="form-control select" name="checkedBy" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>

									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="Remark" class="active">Note / Remark</label>
										<textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="hidden" name="batch_id" id="batch_id" value="{{ isset($batchdetails->id)?$batchdetails->id:old('batch_id') }}" />
										<button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
									</div>
								</div>
							</div>
						</form>
					</div>

					<div id="issualofrequisition" class="tab-pane fade">
						@if(isset($requestion))
						<table class="table table-hover table-bordered datatable" id="examplereq">
							<thead>
								<tr>
									<th>Requestion No</th>
									<th>Batch No</th>
									<th>Date</th>
									<th>Requestion Raw Material Name</th>
									<th>Requestion Raw Material Qty</th>
									<th>Issued Raw Material Qty</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@if($requestion)
								@foreach($requestion as $req)
									@php $requestion_details = \App\Models\DetailsRequisition::select("detail_packing_material_requisition.*", "raw_materials.material_name")->where("requisition_id", $req->id)->join("raw_materials", "raw_materials.id", "detail_packing_material_requisition.PackingMaterialName")->orderBy('id', 'desc')->get();
									@endphp
									@if(isset($requestion_details) && $requestion_details)
										@foreach($requestion_details as $temp)
										<tr>
											<td>{{$req->id}}</td>
											<td>{{$req->batchNo}}</td>
											<td>{{$req->created_at?date("d/m/Y",strtotime($req->created_at)):""}}</td>
											<td>{{$temp->material_name}}</td>
											<td>{{$temp->Quantity}}</td>
											<td>{{$temp->approved_qty}}</td>
											<td>{!! ($temp->approved_qty >= $temp->Quantity?'<span class="badge badge-success p-2">Approved</span>':'<span class="badge badge-warning p-2">Pending</span>')!!}</td>
										</tr>
										@endforeach
									@endif
								@endforeach
								@endif
							</tbody>
						</table>
						@endif
					</div>
				  {{-- Packing materials --}}
					<div id="billOfRawMaterialpacking" class="tab-pane fade">
						<form id="add_batch_manufacturing_bill" method="post" action="{{ route('add_batch_manufacturing_recorde_insert_packing') }}">
							@csrf
							<div class="form-row">
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="proName" class="active">Product Name</label>
										<select name="proName" id="proName" readonly class="form-control select">
											<option value="{{$proId}}" class="form-control" selected="selected">{{$proName}}</option>
										</select>
										@if ($errors->has('proName'))
										<span class="text-danger">{{ $errors->first('proName') }}</span>
										@endif
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="bmrNo" class="active">BMR No.</label>
										<input type="text" class="form-control" name="bmrNo" id="bmrNo" placeholder="BMR No."  pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->bmrNo)?$batchdetails->bmrNo:old('bmrNo') }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="batchNoI">Batch No.</label>
										<input type="text" class="form-control" name="batchNoI" id="batchNoI" placeholder="Batch No." pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->batchNo)?$batchdetails->batchNo:old('batchNoI') }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="refMfrNo">Ref. MFR No.</label>
										<input type="text" class="form-control" name="refMfrNo" id="refMfrNo" placeholder="Ref. MFR No."  pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->refMfrNo)?$batchdetails->refMfrNo:old('refMfrNo') }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-12 col-lg-12 col-xl-12">
									<div class="form-group input_fields_wrap" id="MaterialReceived">
										<label class="control-label d-flex">Bill of Raw Material Details and Weighing Record
										</label>
										@if(isset($packing_material_bills))
										@foreach($packing_material_bills as $index=>$rd)
										<div class="row add-more-wrap after-add-more m-0 mb-4">
											 @php $pm = [$rd->material_id => $packingmaterials[$rd->material_id]];
											 @endphp
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="PackingMaterialName[]" class="active">Packing Material</label>
													{{ Form::select("PackingMaterialName[]",$pm,old(),array("class"=>"form-control select","id"=>"material_name[]")) }}
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="batchNo" class="active">Batch No.</label>
												   <input type="text" class="form-control" name="batchNo[]" id="batchNo" placeholder="Batch No." value="{{isset($rd->batch_id)?$rd->batch_id:old('batchNo[]')}}" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="Quantity" class="active">Quantity (Kg.)</label>
													<input type="number" class="form-control" value="{{isset($rd->requesist_qty)?$rd->requesist_qty:old('Quantity[]')}}" readonly name="Quantity[]" id="Quantity" placeholder="">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="arNo" class="active">AR No.</label>
													<input type="text" class="form-control" name="arNo[]" id="arNo" placeholder="" value="{{isset($rd->ar_no_date)?$rd->ar_no_date:old('arNo[]')}}">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="date" class="active">Date</label>
													<input type="date" class="form-control calendar" name="date[]" id="date" value="{{ date('Y-m-d') }}">
												</div>
											</div>
										</div>
										@endforeach
										@endif
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="doneBy">Weighed by</label>
										<input type="text" class="form-control select" name="doneBy" value="{{ \Auth::user()->name }}" id="doneBy" readonly>

									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="checkedBy">Checked by</label>
										<input type="text" class="form-control select" name="checkedBy" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="Remark" class="active">Note / Remark</label>
										<textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
                                        <input type="hidden" name="batch_id" id="batch_id" value="{{isset($batchdetails->id)?$batchdetails->id:old('batch_id') }}" />
										<input type="hidden" name="currentForm" value="#billOfRawMaterialpacking">
										<input type="hidden" name="nextForm" value="#listOfEquipment">
										<button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div id="requisitionpacking" class="tab-pane fade">
						<form id="packing_material_requisition_slip" method="post" action="{{ route('packing_material_requisition_slip_insert_packing') }}">
						@csrf
						<input type="hidden" value="issualofrequisitionpacking" name="nextForm">
						<div class="form-row">
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="from" class="active">From</label>
										<select name="from" id="from" class="form-control select">
											 @if(count($department))
												@foreach($department as $temp)
													@if($temp->id==2)
														<option value="{{$temp->id}}">{{$temp->department}} </option>
													@endif
												@endforeach
											@endif
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="to" class="active">To</label>
										<select name="to" id="to" class="form-control select">
											 @if(count($department))
												@foreach($department as $temp)
													@if($temp->id==3)
														<option value="{{$temp->id}}">{{$temp->department}} </option>
													@endif
												@endforeach
											@endif
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="batchNo">Batch No.</label>
										<input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Batch No." value="{{ isset($batchdetails->batchNo)?$batchdetails->batchNo:old('batchNo') }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="Date" class="active">Date</label>
										<input type="date" class="form-control calendar" name="Date" id="Date" value="{{ date('Y-m-d') }}">
									</div>
								</div>

								<div class="col-12 col-md-12 col-lg-12 col-xl-12">
									<div class="form-group input_fields_wrap_16" id="MaterialReceived">
										<label class="control-label d-flex">Material Detail &nbsp;&nbsp;&nbsp;
											<div class="input-group-btn">
												<button class="btn btn-dark add-more add_field_button_16 waves-effect waves-light" type="button">Add More +</button>
											</div>
										</label>
										<div class="row add-more-wrap after-add-more m-0 mb-4">
											<span class="add-count">1</span>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="PackingMaterialName" class="active">Packing Material Name</label>
													{{ Form::select("PackingMaterialName[]",$packingmaterials,old(),array("class"=>"form-control select","id"=>"material_name","placeholder"=>"Choose Material Name","onchange"=>"getcapacity($(this).val(),1)")) }}
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="Capacity" class="active">Capacity (Kg.)</label>
													<input type="text" class="form-control" name="Capacity[]" id="Capacity1" placeholder="">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="Quantity" class="active">Quantity</label>
													<input type="number" class="form-control" name="Quantity[]" id="Quantity" placeholder="">
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="checkedBy">Checked By</label>
										<input type="text" class="form-control select" name="checkedBy" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>

									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="Remark" class="active">Note / Remark</label>
										<textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="hidden" name="batch_id" id="batch_id" value="{{isset($batchdetails->id)?$batchdetails->id:old('batch_id') }}" />
										<input type="hidden" name="currentForm" value="#requisitionpacking">
										<input type="hidden" name="nextForm" value="#issualofrequisitionpacking">
										<button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					 <div id="issualofrequisitionpacking" class="tab-pane fade">
						 @if(isset($requestion_packing))
						<table class="table table-hover table-bordered datatable" id="examplereq_packing">
							<thead>
								<tr>
									<th>Requestion No</th>
									<th>Batch No</th>
									<th>Date</th>
									<th>Requestion Packing  Material Name</th>
									<th>Requestion Packing  Material Qty</th>
									<th>Issued Packing  Material Qty</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
							@if(isset($requestion_packing) && $requestion_packing)
                            @foreach($requestion_packing as $req)
                                @php $requestion_details_packing = \App\Models\DetailsRequisition::select("detail_packing_material_requisition.*", "raw_materials.material_name")->where("requisition_id", $req->id)->join("raw_materials", "raw_materials.id", "detail_packing_material_requisition.PackingMaterialName")->get();
                                @endphp
                            @if($requestion_details_packing)
                                @foreach($requestion_details_packing as $temp)
                                <tr>
                                    <td>{{$req->id}}</td>
                                    <td>{{$req->batchNo}}</td>
                                    <td>{{$req->created_at?date("d/m/Y",strtotime($req->created_at)):""}}</td>
                                    <td>{{$temp->material_name}}</td>
                                    <td>{{$temp->Quantity}}</td>
                                    <td>{{$temp->approved_qty}}</td>
                                    <td>{!! ($temp->approved_qty > 0?'<span class="badge badge-success p-2">Approved</span>':'<span class="badge badge-warning p-2">Pending</span>')!!}</td>
                                </tr>
                                @endforeach
                            @endif
                            @endforeach
                            @endif
							</tbody>
						</table>
						@endif
					</div>
					{{-- end of packing materials --}}

					<div id="listOfEquipment" class="tab-pane fade">
						<form id="add_batch_equipment_vali" method="post" action="{{ route('add_batch_equipment_insert') }}">
							@csrf

							<div class="form-row">
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="proName" class="active">Product Name</label>
										<select name="proName" id="proName" readonly class="form-control select">
											<option value="{{$proId}}" class="form-control" selected="selected">
											{{$proName}}
											</option>
										</select>
										@if ($errors->has('proName'))
										<span class="text-danger">{{ $errors->first('proName') }}</span>
										@endif
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="bmrNo" class="active">BMR No.</label>

										<input type="text" class="form-control" name="bmrNo" pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->bmrNo)?$batchdetails->bmrNo:old('bmrNo') }}" readonly id="bmrNo" placeholder="BMR No.">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="batchNo">Batch No.</label>
										<input type="text" class="form-control" name="batchNo" id="batchNo" pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->batchNo)?$batchdetails->batchNo:old('batchNo') }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="refMfrNo">Ref. MFR No.</label>
										<input type="text" class="form-control" name="refMfrNo" id="refMfrNo" pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->refMfrNo)?$batchdetails->refMfrNo:old('refMfrNo') }}" readonly placeholder="Ref. MFR No.">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="Remark" class="active">Note / Remark</label>
										<textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
									</div>
								</div>
								<div class="col-12 col-md-12 col-lg-12 col-xl-12">
									<div class="form-group input_fields_wrap_1" id="MaterialReceived">
										<label class="control-label d-flex">List of Equipment in Manufacturing Process
											<div class="input-group-btn">
												<button class="btn btn-dark add-more add_field_button_1 waves-effect waves-light" type="button">Add More +</button>
											</div>
										</label>
                                        @php $c = 1; @endphp
										<div class="row add-more-wrap after-add-more m-0 mb-4" id="equipmentCode">
											<span class="add-count">1</span>
											<div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="EquipmentName" class="active">Equipment Name</label>
                                                    {{ Form::select("EquipmentName[]",$eqipment_name,old("eqipment_name"),array("class"=>"form-control select","id"=>"eqipment_name1","Placeholder"=>"Equipment Name","onchange"=>"getcodes($(this).val(),".$c.")")) }}

                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="EquipmentCode" class="active">Equipment Code</label>
                                                    {{ Form::select("EquipmentCode[]",$eqipment_code,old("EquipmentCode"),array("class"=>"form-control select","id"=>"eqipment_code1","Placeholder"=>"Equipment Code")) }}

                                                </div>
                                            </div>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
                                        <input type="hidden" name="batch_id" id="batch_id" value="{{isset($batchdetails->id)?$batchdetails->id:old('batch_id') }}" />
										<button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div id="homogenizing" class="tab-pane fade">
						
							<div class="form-group">
							<input type="hidden" value="9" name="sequenceId">
		
							  <a role="tab" data-toggle="tab"  class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light "href="#addhomogenizing">Add Homogenize</a>
							 </div>
		
		
						<table class="table table-hover table-bordered datatable" id="examplereq_homogenizing">
							<thead>
								<tr>
									<th>Sr.No</th>
									<th>Product Name</th>
									<th>Bmr.No</th>
									<th>Main Batch.No</th>
									<th>RefMfr.No</th>
									<th>Date</th>
									<th>Homogenizing Tank No.</th>
		
		
								</tr>
							</thead>
							<tbody>
		
								@if(isset($Homogenizing) && $Homogenizing)
								@foreach($Homogenizing as $lots)
								<tr>
									<td>{{$loop->index +1}}</td>
									<td>{{$lots->material_name}}</td>
									<td>{{$lots->bmrNo}}</td>
									<td>{{$lots->batchNo}}</td>
									<td>{{$lots->refMfrNo}}</td>
									<td>{{$lots->created_at?date("d/m/Y",strtotime($lots->created_at)):""}}</td>
									<td>{{$lots->homoTank}}</td>
		
								</tr>
								@endforeach
								@endif
		
							</tbody>
						</table>
		
		
		
						
						
					</div>
					<div id="addhomogenizing" class="tab-pane fade">
						<form id="add_homogninge" method="post" action="{{ route('homogenizing_insert') }}">
							@csrf

							<div class="form-row">
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="proName" class="active">Product Name</label>
										<select name="proName" id="proName" readonly class="form-control select">
										  <option value="{{$proId}}" class="form-control" selected="selected">
											{{$proName}}
										  </option>
										</select>
									   </div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="bmrNo" class="active">BMR No. </label>
										<input type="text" class="form-control" id="bmrNo" name="bmrNo" pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->bmrNo)?$batchdetails->bmrNo:old("bmrNo") }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="batchNo">Batch No.</label>
										<input type="text" class="form-control" id="batchNo" name="batchNo"  pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"value="{{ isset($batchdetails->batchNo)?$batchdetails->batchNo:old("batchNo") }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="refMfrNo">Ref. MFR No.</label>
										<input type="text" class="form-control" id="refMfrNo" name="refMfrNo"  pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->refMfrNo)?$batchdetails->refMfrNo:old("refMfrNo") }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="homoTank">Homogenizing tank No.</label>
										<!--<input type="text" class="form-control" id="homoTank" name="homoTank" placeholder="PR/BT/Come Tank number" value=""> -->
										{{Form::select("homoTank",$selected_crop_tank,(old("homoTank")),array("id"=>"homoTank","class"=>"form-control","placeholder"=>"Choose Homogenizing tank"))}}
									</div>
								</div>
								<div class="col-12 col-md-12 col-lg-12 col-xl-12">
								<button type="button" class="btn-primary add_field_button_20 mb-4 float-right">Add More Lots +</button>
								@if(isset($processlots))
									<table class="table table-bordered" cellpadding="0" cellspacing="0" border="0">
										<thead>
											<tr>
												<th>Date</th>
												<th>Process</th>
												<th>Qty (Kg.)</th>
												<th>Start Time (Hrs)</th>
												<th>End Time (Hrs)</th>
											</tr>
										</thead>
										<tbody class="input_fields_wrap_20">
											{{--@foreach($processlots as $p_lots)

											<tr>@php $lotCount = $loop->index+1  @endphp
												<td><input type="date" name="dateProcess[]" id="dateProcess[1]" class="form-control" value="{{$p_lots->Date}}"></td>    @php  $index = $p_lots->MaterialName;   @endphp
												<td>Lot No.: {{ $p_lots->lotNo }} - <span class="text-primary p-2"> {{$lotCount}} {{$rawmaterials[$index]}}</span></td>
												<td><input type="text" name="qty[]" id="qty[1]" class="form-control" value="{{$p_lots->Quantity}}"></td>
												<td><input type="time" name="stratTime[]" id="stratTime[1]" class="form-control time" value="{{$p_lots->stratTime}}" data-mask="00:00"></td>
												<td><input type="time" name="endTime[]" id="endTime[1]" class="form-control time" value="{{$p_lots->endTime}}" data-mask="00:00"></td>
											</tr>
											@endforeach
										
											<tr>
												<td><input type="date" name="dateProcess[]" id="dateProcess[15]" class="form-control"></td>
												<td>Homogenize the product generated.</td>
												<td><input type="text" name="qty[]" id="qty[15]" class="form-control"  placeholder="" value=""></td>
												<td><input type="time" name="stratTime[]" id="stratTime[15]" class="form-control time" placeholder=""  value="" data-mask="00:00"></td>
												<td><input type="time" name="endTime[]" id="endTime[15]" class="form-control time"  placeholder="" value="" data-mask="00:00"></td>
											</tr> --}}
											<tr>
                                                <td><input type="date" name="dateProcess[]" id="dateProcess[1]" class="form-control" value="{{date('Y-m-d')}}"></td>   
                                                <td><input type="text" name="lot[]" id="lot" class="form-control" value=""><input type="hidden" name="lotsid[]" value=""></td>
                                                <td><input type="number" name="qty[]" id="qty[1]" class="form-control" value=""></td>
                                                <td><input type="time" name="stratTime[]" id="stratTime[1]" class="form-control time" value="" data-mask="00:00"></td>
                                                <td><input type="time" name="endTime[]" id="endTime[1]" class="form-control time" value="" data-mask="00:00"></td>
                                            </tr>
										</tbody>
									</table>
									@endif
								</div>
								<div class="col-12">
									<div class="form-group">
										<label class="d-block">In Process Check (After 4 Lot)</label>
										Remove sample (approx. 100gm) and check for viscosity at 25 <sup>o</sup>C/ 30 RPM with LV3 spindle using Brookfield Viscometer (ID No.: PR/VM/002).
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="Observedvalue">Observed value (cSt)</label>
										<input type="text" class="form-control" id="Observedvalue" name="Observedvalue" placeholder="" value="">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="hidden" name="batch_id" id="batch_id" value="{{ isset($batchdetails->id)?$batchdetails->id:old('batch_id') }}" />
										<button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Clear</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div id="addLots_listing" class="tab-pane fade">

					<div class="form-group">
					<a role="tab" data-toggle="tab"  class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light "href="#addLots">Add lots</a>
									</div>
					@if(isset($lotsdetails))
						<table class="table table-hover table-bordered datatable" id="examplereq_lots">
							<thead>
								<tr>
									<th>Sr.No</th>
									<th>Product Name</th>
									<th>Bmr.No</th>
									<th>lot.No</th>
									<th>batch.No</th>
									<th>RefMfr.No</th>
									<th>Date</th>
									


								</tr>
							</thead>
							<tbody>

								@if($lotsdetails)
								@foreach($lotsdetails as $lots)
								<tr>
									<td>{{$loop->index +1}}</td>
									<td>{{$lots->material_name}}</td>
									<td>{{$lots->bmrNo}}</td>
									<td>{{$lots->lotNo}}</td>
									<td>{{$lots->batchNo}}</td>
									<td>{{$lots->refMfrNo}}</td>
									<td>{{$lots->Date?date("d/m/Y",strtotime($lots->created_at)):""}}</td>
									
								</tr>
								@endforeach
								@endif

							</tbody>
						</table>
						@endif
					</div>
					<div id="addLots" class="tab-pane fade">
					   <form id="add_batch_equipment_vali" method="post" action="{{ route('add_batch_lots') }}">
							@csrf
						 <div class="form-row">
							<div class="col-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group">
									<label for="proName" class="active">Product Name</label>
									<select name="proName" id="proName" readonly class="form-control select">
										<option value="{{$proId}}" class="form-control" selected="selected">
										  {{$proName}}
										</option>
									  </select>
									@if ($errors->has('proName'))
									<span class="text-danger">{{ $errors->first('proName') }}</span>
									@endif
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group">
									<label for="bmrNo" class="active">BMR No.</label>
									<input type="text" class="form-control" name="bmrNo" id="bmrNo"  pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->bmrNo)?$batchdetails->bmrNo:old("bmrNo") }}" readonly>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group">
									<label for="batchNo">Batch No.</label>
									<input type="text" class="form-control" name="batchNo" id="batchNo" pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->batchNo)?$batchdetails->batchNo:old("batchNo") }}" readonly>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group">
									<label for="refMfrNo">Ref. MFR No.</label>
									<input type="text" class="form-control" name="refMfrNo" id="refMfrNo"  pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->refMfrNo)?$batchdetails->refMfrNo:old("refMfrNo") }}" readonly>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group">
									<label for="Date">Date</label>
									<input type="date" class="form-control" name="Date" id="Date" placeholder="" value="{{ date('Y-m-d') }}">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label class="control-label d-flex">Process Sheet</label>
								</div>
							</div>
							@php   $prvCount = Session::get('prvCount')!==null ? Session::get('prvCount'): Session::get('prvCount') ;    @endphp
							<div class="col-12 col-md-6 col-lg-4">
								<div class="form-group">
									<label for="lotNo" class="active">Lot No.</label>
									<input type="text" class="form-control" name="lotNo" id="lotNo" placeholder="Lot No." value="{{ isset($prvCount)?$prvCount:$lotno}}">
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-4">
								<div class="form-group">
									<label for="ReactorNo">Reactor No.</label>
									{{  Form::select("ReactorNo",$selected_crop,(old("ReactorNo")?old("ReactorNo"):(isset($addlots->ReactorNo)?$addlots->ReactorNo:"")),array("class"=>"form-control select","id"=>"ReactorNo","placeholder"=>"Reactor No.")) }}
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-4">
								<div class="form-group">
									<label for="Date">Date</label>
									<input type="date" class="form-control" name="Process_date" id="Process_date " placeholder="" value="{{ date('Y-m-d') }}">
								</div>
							</div>
							<div class="col-12 col-md-12 col-lg-12 col-xl-12">
								<div class="form-group input_fields_wrap_4" id="MaterialReceived">
									<label class="control-label d-flex">Raw Material Detail
										<div class="input-group-btn">
											<button class="btn btn-dark add-more add_field_button_4 waves-effect waves-light" type="button">Add More +</button>
										</div>
									</label>
									@if(isset($raw_material_bills))
                                    @php $lm =1; @endphp
									@foreach( $raw_material_bills as $mat )
										@foreach( $mat as $index => $rd )
                                            @php
                                                $batchstock = App\Models\Stock::select("inward_raw_materials_items.batch_no","inward_raw_materials_items.id")->where("department",3)->where(DB::raw("qty-stock.used_qty"),">",0)->join("raw_materials","raw_materials.id","stock.matarial_id")->join("inward_raw_materials_items","inward_raw_materials_items.id","stock.batch_no")->where("stock.material_type",'R')->where("stock.matarial_id",$rd->material_id)->pluck("batch_no","id");
                                            @endphp
											<div class="row add-more-wrap5 after-add-more m-0 mb-4">
												<span class="add-count">{{ $lm }}</span>
												<div class="col-12 col-md-4">
													<div class="form-group">

														<label for="MaterialName[]" class="active">Raw Material</label>
														{{ Form::select("MaterialName[]",$stock,old("MaterialName[]")?old("MaterialName[]"):$rd->material_id,array("id"=>"MaterialName[]","class"=>"form-control select","selected"=>"selected","onchange"=>"getbatchlot($(this).val(),".$lm.")")) }}
													</div>
												</div>
												<div class="col-12 col-md-4">
													<div class="form-group">
														<label for="rmbatchno" class="active">Batch No.</label>
														{{ Form::select("rmbatchno[]",$batchstock,old("rmbatchno[]")?old("rmbatchno[]"):$rd->batch_id,array("id"=>"rmbatchno".$lm,"class"=>"form-control select","selected"=>"selected","placeholder"=>"Batch No.")) }}

													</div>
												</div>
												<div class="col-12 col-md-4">
													<div class="form-group">
														<label for="Quantity" class="active">Quantity (Kg.)</label>
														<input type="number" class="form-control" name="Quantity[]" id="Quantity{{ $lm }}" placeholder="" value="{{ isset($rd->requesist_qty)?$rd->requesist_qty:old('Quantity[]') }}">
													</div>
												</div>
											</div>
                                   	 @php $lm++; @endphp
									@endforeach
									@endforeach
									@endif
								</div>
							</div>
							@php $doneBy = [\Auth::user()->id => \Auth::user()->name]
							@endphp
							<div class="col-12 col-md-12 col-lg-12 col-xl-12">
								<table class="table table-bordered" cellpadding="0" cellspacing="0" border="0">
									<thead>
										<tr>
											<th>Process</th>
											<th>Qty. (Kg.)</th>
											<th>Temp (<sup>o</sup>C)</th>
											<th>Start Time (Hrs)</th>
											<th>End Time (Hrs)</th>
											<th>Done by</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Charge Polydimethylsiloxane in reactor.</td>
											<td><input type="number" name="qty[]" id="qty[1]" class="form-control "></td>
											<td><input type="text" name="temp[]" id="temp[1]" class="form-control"></td>
											<td><input type="time" name="stratTime[]" id="stratTime[1]" class="form-control time" data-mask="00:00"></td>
											<td><input type="time" name="endTime[]" id="endTime[1]" class="form-control time" data-mask="00:00"></td>
											<td>{{ Form::select("doneby[]", $doneBy, old("doneby"), array("id"=>"doneby[1]","class"=>"form-control select")) }}</td>
										</tr>
										<tr>
											<td>Start heating the reactor and start stirring</td>
											<td><input type="number" name="qty[]" id="qty[2]" class="form-control"></td>
											<td><input type="text" name="temp[]" id="temp[2]" class="form-control"></td>
											<td><input type="time" name="stratTime[]" id="stratTime[2]" class="form-control time" data-mask="00:00"></td>
											<td><input type="time" name="endTime[]" id="endTime[2]" class="form-control time" data-mask="00:00"></td>
											<td>{{ Form::select("doneby[]", $doneBy, old("doneby"), array("id"=>"doneby[2]","class"=>"form-control select")) }}</td>
										</tr>
										<tr>
											<td>Once the temperature is between 100 - 120<sup>o</sup>C start the Inline mixer and charge ColloidalSilicon Dioxide (Fumed Silica) in reactor simultaneously and increase stirring speed.</td>
											<td><input type="number" name="qty[]" id="qty[3]" class="form-control"></td>
											<td><input type="text" name="temp[]" id="temp[3]" class="form-control"></td>
											<td><input type="time" name="stratTime[]" id="stratTime[3]" class="form-control time" data-mask="00:00"></td>
											<td><input type="time" name="endTime[]" id="endTime[3]" class="form-control time" data-mask="00:00"></td>
											<td>{{ Form::select("doneby[]", $doneBy, old("doneby"), array("id"=>"doneby[3]","class"=>"form-control select")) }}</td>
										</tr>
										<tr>
											<td>When temperature reaches 180 - 190 <sup>o</sup>C stop heating the reactor.</td>
											<td><input type="number" name="qty[]" id="qty[4]" class="form-control"></td>
											<td><input type="text" name="temp[]" id="temp[4]" class="form-control"></td>
											<td><input type="time" name="stratTime[]" id="stratTime[4]" class="form-control time" data-mask="00:00"></td>
											<td><input type="time" name="endTime[]" id="endTime[4]" class="form-control time" data-mask="00:00"></td>
											<td>{{ Form::select("doneby[]", $doneBy, old("doneby"), array("id"=>"doneby[4]","class"=>"form-control select")) }}</td>
										</tr>
										<tr>
											<td>Stop stirrer and transfer the reaction mass to homogenizing tank No.- PR/BT/Come Tank number</td>
											<td><input type="number" name="qty[]" id="qty[5]" class="form-control"></td>
											<td><input type="text" name="temp[]" id="temp[5]" class="form-control"></td>
											<td><input type="time" name="stratTime[]" id="stratTime[5]" class="form-control time" data-mask="00:00"></td>
											<td><input type="time" name="endTime[]" id="endTime[5]" class="form-control time" data-mask="00:00"></td>
											<td>{{ Form::select("doneby[]", $doneBy, old("doneby"), array("id"=>"doneby[5]","class"=>"form-control select")) }}</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-12">
								<div class="form-group">
									<input type="hidden" name="batch_id" id="batch_id" value="{{ isset($batchdetails->id)?$batchdetails->id:old('batch_id') }}" />
									<button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Save &amp; Quite</button><a href="add-batch-manufacturing-record-add-lot2.html" class="btn btn-dark btn-md form-btn waves-effect waves-light">Continue</a>
								</div>
							</div>
						</div>
					   </form>
					</div>
					<div id="Packing" class="tab-pane fade">
						<form id="add_manufacturing_packing" method="post" action="{{ route('add_manufacturing_packing_insert') }}">
							@csrf

							<div class="form-row">
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="proName" class="active">Product Name</label>

										<!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)"> -->
										<select name="proName" id="proName" readonly class="form-control select">
										  <option value="{{$proId}}" class="form-control" selected="selected">
											{{$proName}}
										  </option>
										</select>
										{{-- {{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","placeholder"=>"Choose Product Name")) }} --}}
										@if ($errors->has('proName'))
										<span class="text-danger">{{ $errors->first('proName') }}</span>
										@endif
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="bmrNo" class="active">BMR No.</label>
										<input type="text" class="form-control" name="bmrNo" id="bmrNo" pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->bmrNo)?$batchdetails->bmrNo:old("bmrNo") }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="batchNo">Batch No.</label>
									<input type="text" class="form-control" name="batchNo" id="batchNo" pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->batchNo)?$batchdetails->batchNo:old("batchNo") }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="refMfrNo">Ref. MFR No.</label>
									<input type="text" class="form-control" name="refMfrNo" id="refMfrNo" pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->refMfrNo)?$batchdetails->refMfrNo:old("refMfrNo") }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="ManufacturerDate" class="active">Date</label>
										<input type="date" class="form-control calendar" name="ManufacturerDate" id="ManufacturerDate" value="{{ date('Y-m-d') }}">
									</div>
								</div>
								<div class="col-12 col-md-12 col-lg-12 col-xl-12">
									<div class="form-group input_fields_wrap" id="MaterialReceived">
										<label class="control-label d-flex">Packing
											<!-- <div class="input-group-btn">  -->
											<!-- <button class="btn btn-dark add-more add_field_button waves-effect waves-light" type="button">Add More +</button> -->
											<!-- </div> -->
										</label>
										<div class="row add-more-wrap after-add-more m-0 mb-4">
											<!-- <span class="add-count">1</span> -->
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="Observation" class="active">Area cleanliness checked by Production Observation</label>
													<input type="text" class="form-control" name="Observation" id="Observation" placeholder="Observation">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="Temperature" class="active">Temperature ( <sup>o</sup>C) of Filling area</label>
													<input type="text" class="form-control" name="Temperature" id="Temperature" placeholder="Observation">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="Humidity" class="active">Humidity (%RH) of Filling area</label>
													<input type="text" class="form-control" name="Humidity" id="Humidity" placeholder="Observation">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="TemperatureP" class="active">Temperature ( <sup>o</sup>C) of Product</label>
													<input type="text" class="form-control" name="TemperatureP" id="TemperatureP" placeholder="Observation">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="50kgDrums" class="active">50 Kg No of Drums filled</label>
													<input type="Number" class="form-control" name="50kgDrums" id="50kgDrums" placeholder="No of Drums">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="200kgDrums" class="active">200 Kg No of Drums filled</label>
													<input type="Number" class="form-control" name="20kgDrums" id="20kgDrums" placeholder="No of Drums">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="startTime" class="active">Start Time (Hrs.)</label>
													<input type="time" class="form-control time" name="startTime" id="startTime" placeholder="" data-mask="00:00" data-mask="00:00">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="EndstartTime" class="active">End Time (Hrs.)</label>
													<input type="time" class="form-control time" name="EndstartTime" id="EndstartTime" placeholder="" data-mask="00:00">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="areaCleanliness">Done By</label>
													<input type="text" class="form-control" name="areaCleanliness" id="areaCleanliness" value="{{ \Auth::user()->name }}" readonly>

												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="CareaCleanliness">Checked By</label>
													<input class="form-control" type="text" name="CareaCleanliness" id="CareaCleanliness" value="{{ \Auth::user()->name }}" readonly>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-12 col-lg-12 col-xl-12">
									<div class="form-group input_fields_wrap" id="MaterialReceived">
										<label class="control-label d-flex">Yield
											<!-- <div class="input-group-btn">  -->
											<!-- <button class="btn btn-dark add-more add_field_button waves-effect waves-light" type="button">Add More +</button> -->
											<!-- </div> -->
										</label>
										<div class="row add-more-wrap after-add-more m-0 mb-4">
											<!-- <span class="add-count">1</span> -->
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="rmInput" class="active">RM Input (Kg.)</label>
													<input type="text" class="form-control" name="rmInput" id="rmInput" placeholder="">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="fgOutput" class="active">FG Output</label>
													<input type="text" class="form-control" name="fgOutput" id="fgOutput" placeholder="">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="filledDrums" class="active">Filled in Drums (Kg)</label>
													<input type="text" class="form-control" name="filledDrums" id="filledDrums" placeholder="">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="excessFilledDrums" class="active">Excess filled in drums</label>
													<input type="text" class="form-control" name="excessFilledDrums" id="excessFilledDrums" placeholder="">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="qcsampling" class="active">QC Sampling (Kg.)</label>
													<input type="text" class="form-control" name="qcsampling" id="qcsampling" placeholder="">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="StabilitySample" class="active">Stability Sample (Kg.)</label>
													<input type="Number" class="form-control" name="StabilitySample" id="StabilitySample" placeholder="">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="WorkingSlandered" class="active">Working Slandered</label>
													<input type="text" class="form-control" name="WorkingSlandered" id="WorkingSlandered" placeholder="">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="ValidationSample" class="active">Validation Sample</label>
													<input type="text" class="form-control" name="ValidationSample" id="ValidationSample" placeholder="">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="CustomerSample" class="active">Filled in Jerry can / Drum (Kg.) (Customer Sample)</label>
													<input type="text" class="form-control" name="CustomerSample" id="CustomerSample" placeholder="">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="ActualYield" class="active">Actual Yield [(Output/Input)*100]</label>
													<input type="text" class="form-control" name="ActualYield" id="ActualYield" placeholder="98.00 / 102.00%">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="checkedBy">Checked By</label>
													<input type="text" class="form-control" name="checkedBy" id="checkedBy" value="{{ \Auth::user()->name }}" readonly>

												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="ApprovedBy">Approved By</label>
													<input type="text" class="form-control" name="ApprovedBy" id="ApprovedBy" value="{{ \Auth::user()->name }}" readonly>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="Remark" class="active">Note / Remark</label>
										<textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="hidden" name="batch_id" id="batch_id" value="{{ isset($batchdetails->id)?$batchdetails->id:old('batch_id') }}" />
										<button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Clear</button>
									</div>
								</div>
							</div>
						</form>
					</div>
                    <div id="generate_label" class="tab-pane fade">
						<form id="add_manufacturing_generate_label" method="post" action="{{ route('add_manufacturing_generate_label_insert') }}">
							@csrf

							<div class="form-row">
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="proName" class="active">Product Name</label>

										<!-- <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)"> -->
										<select name="proName" id="proName" readonly class="form-control select">
										  <option value="{{$proId}}" class="form-control" selected="selected">
											{{$proName}}
										  </option>
										</select>
										{{-- {{ Form::select("proName",$product,old("proName"),array("class"=>"form-control select","id"=>"proName","placeholder"=>"Choose Product Name")) }} --}}
										@if ($errors->has('proName'))
										<span class="text-danger">{{ $errors->first('proName') }}</span>
										@endif
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="bmrNo" class="active">BMR No.</label>
										<input type="text" class="form-control" name="bmrNo" id="bmrNo"  pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->bmrNo)?$batchdetails->bmrNo:old("bmrNo") }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="batchNo">Batch No.</label>
									<input type="text" class="form-control" name="batchNo" id="batchNo"  pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" value="{{ isset($batchdetails->batchNo)?$batchdetails->batchNo:old("batchNo") }}" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
										<label for="refMfrNo">Ref. MFR No.</label>
									<input type="text" class="form-control" name="refMfrNo" id="refMfrNo" pattern="\d*" maxlength="12" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"  value="{{ isset($batchdetails->refMfrNo)?$batchdetails->refMfrNo:old("refMfrNo") }}" readonly>
									</div>
								</div>

								<div class="col-12 col-md-12 col-lg-12 col-xl-12">
									<div class="form-group input_fields_wrap" id="MaterialReceived">
										<label class="control-label d-flex">Product Label

										</label>
										<div class="row add-more-wrap after-add-more m-0 mb-4">
											<!-- <span class="add-count">1</span> -->
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="simethicone" class="active">Simethicone</label>
													<input type="text" class="form-control" name="simethicone" id="simethicone" placeholder="Simethicone">
												</div>
											</div>
                                            <div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="batch_no_I" class="active">Batch No</label>
													<input type="text" class="form-control" name="batch_no_I" id="batch_no_I" placeholder="Batch No" value="{{ isset($batchdetails->batchNo)?$batchdetails->batchNo:old("batchNo") }}">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="mfg_date" class="active">MFG Date</label>
													<input type="date" class="form-control" name="mfg_date" id="mfg_date" value="{{ isset($batchdetails->ManufacturingDate)?$batchdetails->ManufacturingDate:date('Y-m-d') }}"placeholder="MFG Date">
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="retest_date" class="active">Retest Date</label>
													<input type="date" class="form-control" name="retest_date" id="retest_date" value="{{ isset($batchdetails->RetestDate)?$batchdetails->RetestDate:date('Y-m-d') }}" placeholder="">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="net_wt" class="active">Net Wt</label>
													<input type="text" class="form-control" name="net_wt" id="net_wt" placeholder="{{isset($batchdetails)?$batchdetails->BatchSize:""}}">
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-4">
												<div class="form-group">
													<label for="tare_wt" class="active">Tare Wt</label>
													<input type="text" class="form-control" name="tare_wt" id="tare_wt" placeholder="">
												</div>
											</div>
                                        </div>
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="Remark" class="active">Note / Remark</label>
										<textarea class="form-control" name="Remark" id="Remark" placeholder="Note / Remark"></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<input type="hidden" name="batch_id" id="batch_id" value="{{ isset($batchdetails->id)?$batchdetails->id:old('batch_id') }}" />
										<button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Clear</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				 </div>
			</div>
		</div>
	</div>
</div>

@endsection
@push("scripts")

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
	feather.replace()
	$(document).ready(function() {
		var max_fields = 15; //maximum input boxes allowed
		var wrapper = $(".input_fields_wrap"); //Fields wrapper
		var add_button = $(".add_field_button"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function(e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="rawMaterialName[' + x + ']" class="active">Raw Material</label><select class="form-control select" name="rawMaterialName[]" id="rawMaterialName[' + x + ']"><option>Select</option><option>Material Name</option></select></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="batchNo[' + x + ']" class="active">Batch No.</label><select class="form-control select" name="batchNo[]" id="batchNo[' + x + ']"><option>Select</option><option>RFLX</option></select></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity[' + x + ']" class="active">Quantity (Kg.)</label><input type="number" class="form-control" name="Quantity[]" id="Quantity[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="arNo[' + x + ']" class="active">AR No.</label><input type="text" class="form-control" name="arNo[]" id="arNo[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="date[' + x + ']" class="active">Date</label><input type="date" class="form-control calendar" name="date[]" id="date[' + x + ']" value={{ date("Y-m-d") }}></div></div>'); //add input box
			}
			feather.replace()
		});

			$(document).ready(function() {
		var max_fields = 15; //maximum input boxes allowed
		var wrapper = $(".input_fields_wrap"); //Fields wrapper
		var add_button = $(".add_field_button_packing"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function(e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="PackingMaterialName[' + x + ']" class="active">Raw Material</label><select class="form-control select" name="PackingMaterialName[]" id="packingmaterials[' + x + ']"><option>Select</option><option>Material Name</option></select></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="batchNo[' + x + ']" class="active">Batch No.</label><select class="form-control select" name="batchNo[]" id="batchNo[' + x + ']"><option>Select</option><option>RFLX</option></select></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity[' + x + ']" class="active">Quantity (Kg.)</label><input type="number" class="form-control" name="Quantity[]" id="Quantity[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="arNo[' + x + ']" class="active">AR No.</label><input type="text" class="form-control" name="arNo[]" id="arNo[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="date[' + x + ']" class="active">Date</label><input type="date" class="form-control calendar" name="date[]" id="date[' + x + ']" value={{ date("Y-m-d") }}></div></div>'); //add input box
			}
			feather.replace()
		});

		$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parents('div.row').remove();
			x--;
		})
	});

		$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parents('div.row').remove();
			x--;
		})
	});

	feather.replace()
	$(document).ready(function() {
		var max_fields = 15; //maximum input boxes allowed
		var wrapper = $(".input_fields_wrap_1"); //Fields wrapper
		var add_button = $(".add_field_button_1"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function(e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6"><div class="form-group"><label for="EquipmentName[' + x + ']" class="active">Equipment Name</label><select class="form-control select" name=EquipmentName[] id="eqipment_name' + x + '" onchange="getcodes($(this).val(),'+x+')"><option>Select</option>@foreach($eqipment_name as $key=>$eq) <option value="{{ $key }}">{{ $eq }}</option>@endforeach<select></div></div><div class="col-12 col-md-6"><div class="form-group"><label for="EquipmentCode[' + x + ']" class="active">Equipment Code</label><select class="form-control select" name="EquipmentCode[]" id="eqipment_code' + x + '"><option>Select</option>@foreach($eqipment_code as $key=>$eq) <option value="{{ $key }}">{{ $eq }}</option>@endforeach</select></div></div></div>'); //add input box
			}
			feather.replace()
		});

		$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parents('div.row').remove();
			x--;
		})


	});
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
		var max_fields = 15; //maximum input boxes allowed
		var wrapper = $(".input_fields_wrap_3"); //Fields wrapper
		var add_button = $(".add_field_button_3"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function(e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-4"><div class="form-group"><label for="EquipmentName[' + x + ']" class="active">Particulars</label><select class="form-control select" name="EquipmentName[]" id="EquipmentName[' + x + ']"><option>Select</option><option>Area Cleanliness Checked</option><option>Temperature(<sup>o</sup>C)</option><option>Humidity (%RH)</option></select></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="Observation[' + x + ']" class="active">Observation</label><input type="text" class="form-control" name="Observation[]" id="Observation[' + x + ']" placeholder="" value=""></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="time[' + x + ']" class="active">Time (Hrs)</label><input type="text" class="form-control" name="time[]" id="time[' + x + ']" placeholder="" value=""></div></div></div>'); //add input box
			}
			feather.replace()
		});

		$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parents('div.row').remove();
			x--;
		})

	});
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
		var max_fields = 15; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_4"); //Fields wrapper
        var add_button = $(".add_field_button_4"); //Add button ID

        var x = '{{ (isset($raw_material_bills) && count($raw_material_bills) >0)?count($raw_material_bills):1  }}' ; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-4"><div class="form-group"><label for="MaterialName' + x + '" class="active">Raw Material</label><select class="form-control select" id="MaterialName' + x + '" onchange="getbatchlot($(this).val(),'+x+')"><option>Select Raw Material</option>@if(isset($stock)) @foreach($stock as $key=>$value) <option value="{{ $key }}">{{ $value }}</option> @endforeach @endif</select></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="rmbatchno' + x + '" class="active">Batch No.</label><select name="rmbatchno[]" class="form-control" id="rmbatchno' + x + '" placeholder="Choose Batch"><option>Choose Batch No</option></select></div></div><div class="col-12 col-md-4"><div class="form-group"><label for="Quantity' + x + '" class="active">Quantity (Kg.)</label><input type="number" class="form-control" id="Quantity' + x + '" placeholder="" value="" name="Quantity[]"></div></div></div>'); //add input box
            }
            feather.replace()
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parents('div.row').remove();
            x--;
        })
	});
	$(document).ready(function() {
		var max_fields = 15; //maximum input boxes allowed
		var wrapper = $(".input_fields_wrap_5"); //Fields wrapper
		var add_button = $(".add_field_button_5"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function(e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="PackingMaterialName[' + x + ']" class="active">Packing Material Name</label><input type="text" class="form-control" name="PackingMaterialName[]" id="PackingMaterialName[' + x + ']" placeholder="" value=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Capacity[' + x + ']" class="active">Capacity(Kg.)</label><input type="text" class="form-control" name="Capacity[]" id="Capacity[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity[' + x + ']" class="active">Quantity (No)</label><input type="text" class="form-control" name="Quantity[]" id="Quantity[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="arNo[' + x + ']" class="active">AR No.</label><input type="text" class="form-control" name="arNo[]"id="arNo[' + x + ']" placeholder=""></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="ARDate[' + x + ']" class="active">Date</label><input type="date" class="form-control" name="ARDate[]" id="ARDate[' + x + ']" value={{ date("Y-m-d") }}></div></div></div>'); //add input box
			}
			feather.replace()
		});

		$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parents('div.row').remove();
			x--;
		})

	});
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
		var max_fields = 15; //maximum input boxes allowed
		var wrapper = $(".input_fields_wrap_6"); //Fields wrapper
		var add_button = $(".add_field_button_6"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function(e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="PackingMaterialName" class="active">Raw Material Name</label> {{ Form::select("rawMaterialName[]",$rawmaterials,old("rawMaterialName"),array("id"=>"rawMaterialName","class"=>"form-control","placeholder"=>"Raw Material Name")) }}</div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity" class="active">Quantity (Kg.)</label><input type="number" class="form-control" name="Quantity[]" id="Quantity' + x + '" placeholder=""></div></div></div></div>'); //add input box
			}
			feather.replace()
		});

		$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parents('div.row').remove();
			x--;
		})
	});

	$(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function(e) {
		$('a[data-toggle="tab"]').removeClass('active');
		$(this).addClass('active');
		//alert("hi")
	})
	$(document).ready(function() {

		$("#add_manufacturing").validate({
			rules: {
				proName: "required",
				bmrNo: "required",
				batchNo: "required",
				refMfrNo: "required",
				grade: "required",
				BatchSize: "required",
				//Viscosity: "required",
				ProductionCommencedon: "required",
				ProductionCompletedon: "required",
				ManufacturingDate: "required",
				RetestDate: "required",
				doneBy: "required",
				checkedBy: "required",
				inlineRadioOptions: "required",
				approval: "required",
				approvalDate: "required",
				// checkedByI: "required",

			},
			messages: {
				proName: "Please  Enter The Name proName",
				bmrNo: "Please  Enter The Name bmrNo",
				batchNo: "Please  Enter The Name batchNo",
				refMfrNo: "Please  Enter The Name refMfrNo",
				grade: "Please  Enter The Name grade",
				BatchSize: "Please  Enter The Name BatchSize",
				Viscosity: "Please  Enter The Name Viscosity",
				ProductionCommencedon: "Please  Enter The Name ProductionCommencedon",
				ProductionCompletedon: "Please  Enter The Name ProductionCompletedon",
				ManufacturingDate: "Please  Enter The Name ManufacturingDate",
				RetestDate: "Please  Enter The Name RetestDate",
				doneBy: "Please  Enter The Name doneBy",
				checkedBy: "Please  Enter The Name checkedBy",
				inlineRadioOptions: "Please  Enter The Name inlineRadioOptions",
				approval: "Please  Enter The Name approval",
				approvalDate: "Please  Enter The Name approvalDate",
				//checkedByI: "Please  Enter The Name checkedBy",
			},

		});
		$("#add_batch_manufacturing_bill").validate({
			rules: {
				proName: "required",
				bmrNo: "required",
				batchNoI: "required",
				refMfrNo: "required",
				rawMaterialName: "required",
				batchNo: "required",
				Quantity: "required",
				arNo: "required",
				date: "required",
				doneBy: "required",
				checkedBy: "required",

			},
			messages: {
				proName: "Please  Enter The Name proName",
				bmrNo: "Please  Enter The Name bmrNo",
				batchNoI: "Please  Enter The Name batchNo",
				refMfrNo: "Please  Enter The Name refMfrNo",
				rawMaterialName: "Please  Enter The Name rawMaterialName",
				batchNo: "Please  Enter The Name batchNo",
				Quantity: "Please  Enter The Name Quantity",
				arNo: "Please  Enter The Name arNo",
				date: "Please  Enter The Name dateid",
				doneBy: "Please  Enter The Name doneBy",
				checkedBy: "Please  Enter The Name checkedBy",
			},
		});
		$("#add_manufacturing_line").validate({
			rules: {
				proName: "required",
				bmrNo: "required",
				batchNo: "required",
				refMfrNo: "required",
				Date: "required",
				EquipmentName: "required",
				Observation: "required",
				time: "required",
			},
			messages: {
				proName: "Please  Enter The Name proName",
				bmrNo: "Please  Enter The Name bmrNo",
				batchNo: "Please  Enter The Name batchNo",
				refMfrNo: "Please  Enter The Name refMfrNo",
				Date: "Please  Enter The  Date",
				EquipmentName: "Please  Enter The Name EquipmentName",
				Observation: "Please  Enter The Name Observation",
				time: "Please  Enter The Name time",
			},
		});
		$("#add_manufacturing_packing").validate({
			rules: {
				proName: "required",
				bmrNo: "required",
				batchNo: "required",
				refMfrNo: "required",
				ManufacturerDate: "required",
				Observation: "required",
				Temperature: "required",
				Humidity: "required",
				TemperatureP: "required",
				// 50kgDrums: "required",
				// 20kgDrums : "required",
				startTime: "required",
				EndstartTime: "required",
				areaCleanliness: "required",
				CareaCleanliness: "required",
				rmInput: "required",
				fgOutput: "required",
				filledDrums: "required",
				excessFilledDrums: "required",
				qcsampling: "required",
				StabilitySample: "required",
				WorkingSlandered: "required",
				ValidationSample: "required",
				CustomerSample: "required",
				ActualYield: "required",
				checkedBy: "required",
				ApprovedBy: "required",

			},
			messages: {
				proName: "Please  Enter The Name proName",
				bmrNo: "Please  Enter The Name bmrNo",
				batchNo: "Please  Enter The Name batchNo",
				refMfrNo: "Please  Enter The Name refMfrNo",
				ManufacturerDate: "Please  Enter The Name ManufacturerDate",
				Observation: "Please  Enter The Name Observation",
				Temperature: "Please  Enter The Name Temperature",
				Humidity: "Please  Enter The Name Humidity",
				TemperatureP: "Please  Enter The Name TemperatureP",
				// 50kgDrums: "Please  Enter The Name 50kgDrums",
				// 20kgDrums: "Please  Enter The Name 20kgDrums",
				startTime: "Please  Enter The Name startTime",
				EndstartTime: "Please  Enter The Name EndstartTime",
				areaCleanliness: "Please  Enter The Name areaCleanliness",
				CareaCleanliness: "Please  Enter The Name CareaCleanliness",
				rmInput: "Please  Enter The Name rmInput",
				fgOutput: "Please  Enter The Name fgOutput",
				filledDrums: "Please  Enter The Name filledDrums",
				excessFilledDrums: "Please  Enter The Name excessFilledDrums",
				qcsampling: "Please  Enter The Name qcsampling",
				StabilitySample: "Please  Enter The Name StabilitySample",
				WorkingSlandered: "Please  Enter The Name WorkingSlandered",
				ValidationSample: "Please  Enter The Name ValidationSample",
				CustomerSample: "Please  Enter The Name CustomerSample",
				ActualYield: "Please  Enter The Name ActualYield",
				checkedBy: "Please  Enter The Name checkedBy",
				ApprovedBy: "Please  Enter The Name ApprovedBy",
			},
		});
		$("#add_batch_equipment_vali").validate({
			rules: {
				proName: "required",
				bmrNo: "required",
				batchNo: "required",
				refMfrNo: "required",
				EquipmentName: "required",
				EquipmentCode: "required",


			},
			messages: {
				proName: "Please  Enter The Name proName",
				bmrNo: "Please  Enter The Name bmrNo",
				batchNo: "Please  Enter The Name batchNo",
				refMfrNo: "Please  Enter The Name refMfrNo",
				EquipmentName: "Please  Enter The Name EquipmentName",
				EquipmentCode: "Please  Enter The Name EquipmentCode",

			},
		});
		$("#packing_material_issuel_vali").validate({
			rules: {

				from: "required",
				to: "required",
				batchNo: "required",
				Date: "required",
				PackingMaterialName: "required",
				Capacity: "required",
				Quantity: "required",
				arNo: "required",
				ARDate: "required",
				doneBy: "required",
				checkedBy: "required",


			},
			messages: {
				from: "Please  Enter The from Name",
				to: "Please  Enter The  To Name",
				batchNo: "Please  Enter The  batch No",
				Date: "Please  Enter The  Date",
				PackingMaterialName: "Please  Enter The  PackingMaterial Name",
				Capacity: "Please  Enter The  Capacity",
				Quantity: "Please  Enter The  Quantity",
				arNo: "Please  Enter The  ar No",
				ARDate: "Please  Enter The  ARDate",
				doneBy: "Please  Enter The  doneBy",
				checkedBy: "Please  Enter The  checkedBy",

			},
		});
		$("#packing_material_requisition_slip").validate({
			rules: {
				from: "required",
				to: "required",
				batchNo: "required",
				Date: "required",
				"rawMaterialName[]": "required",

				"Quantity[]": "required",
				checkedBy: "required",
				ApprovedBy: "required",
				batch_id: "required",

			},
			messages: {
				from: "Please  Enter The from Name",
				to: "Please  Enter The to Name",
				batchNo: "Please  Enter The batchNo Name",
				Date: "Please  Enter The Date Name",
				PackingMaterialName: "Please  Enter The PackingMaterialName Name",
				Capacity: "Please  Enter The Capacity Name",
				Quantity: "Please  Enter The Quantity Name",
				checkedBy: "Please  Enter The checkedBy Name",
				ApprovedBy: "Please  Enter The ApprovedBy Name",

			},
		});

		$("#add_homogninge").validate({
            rules: {
                proName: "required",
                bmrNo: "required",
                batchNo: "required",
                refMfrNo: "required",
                homoTank: "required",
                "dateProcess[]": "required",
                "lot[]": "required",
                "qty[]": "required",
                "stratTime[]": "required",
                "endTime[]": "required",
            },
            messages: {
                proName: "Please  Enter The Name proName",
                bmrNo: "Please  Enter The Name bmrNo",
                batchNo: "Please  Enter The Name batchNo",
                refMfrNo: "Please  Enter The Name refMfrNo",
                Date: "Please  Enter The  Date",
                EquipmentName: "Please  Enter The Name EquipmentName",
                Observation: "Please  Enter The Name Observation",
                time: "Please  Enter The Name time",
            },  
        })

	});
	window.onload = function() {

		var url = document.location.toString();
		if (url.match('#')) {
			$('.nav-tabs li a').removeClass('active');
			$('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show')
			$('.nav-tabs a[href="#' + url.split('#')[1] + '"]').parent('li').addClass('active');
			current_page_URL = url;
			$("a").each(function() {
				if ($(this).attr("href") !== "#") {
					var target_URL = $(this).prop("href");
					if (target_URL == current_page_URL) {
						$('.nav-tabs a').parents('li, ul').removeClass('active');
						if (url.split('#')[1] == "billOfRawMaterial" || url.split('#')[1] == "requisition" || url.split('#')[1] == "issualofrequisition")
							$(this).parent().parent("a").addClass('active');
						else
							$(this).addClass('active');
						return false;
					}
				}
			});


		}

		//Change hash for page-reload
		$('.nav-tabs a[href="#' + url.split('#')[1] + '"]').on('shown', function(e) {
			window.location.hash = e.target.hash;

		});

	}
    function getbatchlot(val,pos)
    {
        $.ajax({
             url:'{{ route('getbatchofmaterial') }}',
             method:'POST',
             data:{
                 "id":val,
                 "_token":'{{ csrf_token() }}'
             }
         }).success(function(data){
            $("#rmbatchno"+pos).empty();
            var option ="<option value=''>Choose Batch No.</option>";
            $("#rmbatchno"+pos).append(option);

            $.each(data.batch, function (key, val) {

                var option ="<option value='"+key+"'>"+val+"</option>";
                $("#rmbatchno"+pos).append(option);
            });
        });
    }
    function getcodes(val,pos)
    {
        $.ajax({
             url:'{{ route('getequipmentcode') }}',
             method:'POST',
             data:{
                 "id":val,
                 "_token":'{{ csrf_token() }}'
             }
         }).success(function(data){
            $("#eqipment_code"+pos).empty();
            var option ="<option value=''>Choose Equipment Code</option>";
            $("#eqipment_code"+pos).append(option);
            $.each(data.code, function (key, val) {
                var option ="<option value='"+key+"'>"+val+"</option>";
                $("#eqipment_code"+pos).append(option);
            });
        });
    }
	function getmatarialqtyandbatch(raw, index) {

		$.ajax({
			url: '{{ route("getmatarialqtyandbatch") }}',
			method: 'POST',
			data: {
				"id": raw,
				"_token": '{{ csrf_token() }}'
			}
		}).success(function(data) {
			$("#batchName" + index).empty()
				.append('<option value="">Choose Batch...</option>')
			$.each(data.batch, function(key, val) {
				var option = "<option value='" + key + "'>" + val + "</option>";

				$("#batchName" + index).append(option);
			});
		})
	}
	$(document).ready(function() {
		var wrapper = $(".input_fields_wrap_16"); //Fields wrapper
										var max_fields = 15; //maximum input boxes allowedvar add_button = $(".add_field_button_20"); //Add button ID
		var add_button = $(".add_field_button_16"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function(e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">' + x + '</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="PackingMaterialName" class="active">Packing Material Name</label>{{ Form::select("PackingMaterialName[]",$packingmaterials,old(),array("class"=>"form-control select","id"=>"material_name")) }}</div></div><div class="col-12 col-md-6 col-lg-4"> <div class="form-group">  <label for="Capacity" class="active">Capacity (Kg.)</label> <input type="text" class="form-control" name="Capacity[]" id="Capacity" placeholder=""> </div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label for="Quantity" class="active">Quantity (Kg.)</label><input type="number" class="form-control" name="Quantity[]" id="Quantity' + x + '" placeholder=""></div></div></div></div>'); //add input box
			}
			feather.replace()
		});

		$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parents('div.row').remove();
			x--;
		})
	});
</script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() {
		$('#examplereq').DataTable();
		$('#examplereq_packing').DataTable();
		$('#examplereq_lots').DataTable();
		$("#examplereq_homogenizing").DataTable();
	});
	function getEquipementCode(val,id) {
		var id2 =id;
		if(val.value == 3){
			$(".ct option[value='1']").remove();$(".ct option[value='2']").remove();
			$(id2).find('.ct').append(`<option value="3"> PR/FS/001 </option><option value="3"> PR/FS/002 </option>`);
		} else if(val.value == 2){
			$(".ct option[value='3']").remove();$(".ct option[value='1']").remove();
			$('.ct').append(`<option value="2"> PR/BT/001 </option><option value="2"> PR/BT/002 </option>`);
		} else if (val.value == 1) {
			$(".ct option[value='2']").remove();$(".ct option[value='3']").remove();$(".ct option[value='1']").remove();
			$('.ct').append(`<option value="1"> PR/RC/001 </option><option value="1"> PR/RC/002 </option>`);
		}
	}
	$(document).ready(function() {
		var max_fields_20 = 15; //maximum input boxes allowed
		var wrapper_20 = $(".input_fields_wrap_20"); //Fields wrapper
		var add_button_20 = $(".add_field_button_20"); //Add button ID
		var x = 2; //initlal text box count
		$(add_button_20).click(function(e) { //on add input button click
			e.preventDefault();
			if (x < max_fields_20) { //max input box allowed
				x++; //text box increment
				$(wrapper_20).append('<tr><td><input type="date" name="dateProcess[]" id="dateProcess['+x+']" class="form-control" value="{{date("Y-m-d")}}"></td>'+
										'<td><input type="text" name="lot[]" id="lot'+x+'" class="form-control" value=""></td>'+
										'<td><input type="text" name="qty[]" id="qty['+x+']" class="form-control" placeholder=""></td>'+
										'<td><input type="time" name="stratTime[]" id="stratTime['+x+']" class="form-control time" placeholder="" data-mask="00:00"></td>'+
										'<td><input type="time" name="endTime[]" id="endTime['+x+']" class="form-control itme" placeholder="" data-mask="00:00"></td>'+
										'div class="input-group-btn"><button class="btn btn-danger remove_field_20" type="button"><i class="icon-remove" data-feather="x"></i></button></div>'+
								   '</tr>'); //add input box
									  }
					feather.replace()
				});
		$(wrapper_20).on("click", ".remove_field_20", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parents('div.row').remove();
			x--;
		});
		//    setTimeout(function () {
		//     $('.alert').alert('close');
		// }, 5000);
	});
	function getcapacity(value,pos)
	{
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		$.ajax({
			type: "POST",
			url:'{{ route("material_name_get") }}',

			data:  { _token: CSRF_TOKEN,id:value},
				success: function (data) {
				console.log(data.status);
				$('#Capacity'+pos).val(data.capacity)


			}
	})
	}   
</script>
<script src="{{asset('assets/js/jquery.mask.js?v=2.1.1')}}"></script>
<script>
    $(document).ready(function(){
        $(".time").mask('00:00');
		$(function() {
$('input:text').keydown(function(e) {
if(e.keyCode==1)
    return false;

});
});
    });
</script>

@endpush
