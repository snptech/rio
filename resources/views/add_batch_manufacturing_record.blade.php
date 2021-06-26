@extends("layouts.app")
@section("title","Add batch Manufacture")
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Batch Manufacturing Records</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <div class="card-body">

				<ul class="nav nav-tabs">
				  <li><a data-toggle="tab" href="#batch" class="active">Batch</a></li>
				  <li><a data-toggle="tab" href="#billOfRawMaterial">Bill of Raw Material</a></li>
				  <li><a data-toggle="tab" href="#listOfEquipment">List of Equipment</a></li>
				  <li><a data-toggle="tab" href="#lineClearance">Line Clearance</a></li>
				  <li><a data-toggle="tab" href="#addLots">Add Lots</a></li>
				  <li><a data-toggle="tab" href="#Packing">Packing</a></li>
				</ul>
				<div class="tab-content">
					<div id="batch" class="tab-pane fade in active show">
                        <form id="add_manufacturing" method="post" action="{{ route('add_manufacturing_insert') }}">
                            @csrf

                        <div class="form-row">
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="proName" class="active">Product Name</label>
                                    <input type="text" class="form-control" name="proName" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="bmrNo" class="active">BMR No.</label>
                                    <input type="text" class="form-control" name="bmrNo" id="bmrNo" placeholder="BMR No." value="RCIPL/BMR/Flx-2300/09">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="batchNo">Batch No.</label>
                                    <input type="text" class="form-control" name="batchNo" id="batchNo" placeholder="Batch No." value="RFLX 20/668">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="refMfrNo">Ref. MFR No.</label>
                                    <input type="text" class="form-control" name="refMfrNo" id="refMfrNo" placeholder="Ref. MFR No." value="RCIPL/MFR/01/01">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="grade" class="active">Grade</label>
                                    <input type="text" class="form-control" name="grade" id="grade" placeholder="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="BatchSize" class="active">Batch Size</label>
                                    <input type="text" class="form-control" name="BatchSize" id="BatchSize" placeholder="">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="Viscosity" class="active">Viscosity</label>
                                    <input type="text" class="form-control" name="Viscosity" id="Viscosity" placeholder="" value="2000-2500 cSt">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="ProductionCommencedon" class="active">Production Commenced on</label>
                                    <input type="date" class="form-control" name="ProductionCommencedon" id="ProductionCommencedon" value={{ date("Y-m-d") }}>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="ProductionCompletedon" class="active">Production Completed on</label>
                                    <input type="date" class="form-control" name="ProductionCompletedon" id="ProductionCompletedon" placeholder="" value={{ date("Y-m-d") }}>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="ManufacturingDate" class="active">Manufacturing Date</label>
                                    <input type="date" class="form-control" name="ManufacturingDate" id="ManufacturingDate" placeholder="" value={{ date("Y-m-d") }}>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="RetestDate" class="active">Retest Date</label>
                                    <input type="date" class="form-control" name="RetestDate" id="RetestDate" placeholder=""  value={{ date("Y-m-d") }}>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="doneBy">Prepared by</label>
                                    <select class="form-control select" name="doneBy" id="doneBy">
                                        <option>Select</option>
                                        <option>Employee Name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="checkedBy">Checked by</label>
                                    <select class="form-control select" name="checkedBy" id="checkedBy">
                                        <option>Select</option>
                                        <option>Employee Name</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="col-12">
                                <div class="form-group">
                                    <label for="Remark" class="active">This batch has / has not been produced according to instruction given in MFR No. RCIPL/MFR/01/01</label>
                                </div>
                            </div> -->
                            <!-- <div class="col-12">
                                <div class="form-group">
                                    <label for="ManufacturingDate" class="active">Deviation Sheet attached</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="No">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div> -->
                           <!--  <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="approval" class="active">This Batch is approved/not approved</label>
                                    <select class="form-control select" name="approval" id="approval">
                                        <option>Select</option>
                                        <option>Approved</option>
                                        <option>Not Approved</option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="approvalDate" class="active">This Batch is approved/not approved on</label>
                                    <input type="date" class="form-control" name="approvalDate" id="approvalDate" placeholder="" value="">
                                </div>
                            </div> -->

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="checkedByI">Reviewed and Approved by</label>
                                    <select class="form-control select" name="checkedByI" id="checkedByI">
                                        <option>Select</option>
                                        <option>Employee Name</option>
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
                                      <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Clear</button>
                                    </div>
                                </div>
                        </div>
                        </form>
					</div>
					<div id="billOfRawMaterial" class="tab-pane fade">
						<div class="form-row">
							<div class="col-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group">
								  <label for="proName" class="active">Product Name</label>
								  <input type="text" class="form-control" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)">
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group">
								  <label for="bmrNo" class="active">BMR No.</label>
								  <input type="text" class="form-control" id="bmrNo" placeholder="BMR No." value="RCIPL/BMR/Flx-2300/09">
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group">
								  <label for="batchNo">Batch No.</label>
								  <input type="text" class="form-control" id="batchNo" placeholder="Batch No." value="RFLX 20/668">
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-6 col-xl-6">
								<div class="form-group">
								  <label for="refMfrNo">Ref. MFR No.</label>
								  <input type="text" class="form-control" id="refMfrNo" placeholder="Ref. MFR No." value="RCIPL/MFR/01/01">
								</div>
							</div>
							<div class="col-12 col-md-12 col-lg-12 col-xl-12">
								<div class="form-group input_fields_wrap2" id="MaterialReceived">
									<label class="control-label d-flex">Bill of Raw Material Details and Weighing Record
										<div class="input-group-btn">
											<button class="btn btn-dark add-more add_field_button2 waves-effect waves-light" type="button">Add More +</button>
										</div>
									</label>
									<div class="row add-more-wrap after-add-more m-0 mb-4">
										<!-- <span class="add-count">1</span> -->
										<div class="col-12 col-md-6 col-lg-4">
											<div class="form-group">
											  <label for="rawMaterialName" class="active">Raw Material</label>
											  <select class="form-control select" id="rawMaterialName">
												<option>Select</option>
												<option>Material Name</option>
											  </select>
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-4">
											<div class="form-group">
											  <label for="batchNo" class="active">Batch No.</label>
											  <select class="form-control select" id="batchNo">
												<option>Select</option>
												<option>RFLX</option>
											  </select>
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-4">
											<div class="form-group">
											  <label for="Quantity" class="active">Quantity (Kg.)</label>
											  <input type="text" class="form-control" id="Quantity" placeholder="">
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-4">
											<div class="form-group">
											  <label for="arNo" class="active">AR No.</label>
											  <input type="text" class="form-control" id="arNo" placeholder="">
											</div>
										</div>
										<div class="col-12 col-md-6 col-lg-4">
											<div class="form-group">
											  <label for="date" class="active">Date</label>
											  <input type="date" class="form-control calendar" id="date" placeholder="">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
								  <label for="doneBy">Weighed by</label>
								  <select class="form-control select" id="doneBy">
									<option>Select</option>
									<option>Employee Name</option>
								  </select>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
								  <label for="checkedBy">Checked by</label>
								  <select class="form-control select" id="checkedBy">
									<option>Select</option>
									<option>Employee Name</option>
								  </select>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
								  <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
								</div>
							</div>
						</div>
					</div>
					<div id="listOfEquipment" class="tab-pane fade">
						<div class="form-row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="proName" class="active">Product Name</label>
						  <input type="text" class="form-control" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="bmrNo" class="active">BMR No.</label>
						  <input type="text" class="form-control" id="bmrNo" placeholder="BMR No." value="RCIPL/BMR/Flx-2300/09">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="batchNo">Batch No.</label>
						  <input type="text" class="form-control" id="batchNo" placeholder="Batch No." value="RFLX 20/668">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="refMfrNo">Ref. MFR No.</label>
						  <input type="text" class="form-control" id="refMfrNo" placeholder="Ref. MFR No." value="RCIPL/MFR/01/01">
						</div>
					</div>
					<div class="col-12 col-md-12 col-lg-12 col-xl-12">
						<div class="form-group input_fields_wrap" id="MaterialReceived">
							<label class="control-label d-flex">List of Equipment in Manufacturing Process
								<div class="input-group-btn">
									<button class="btn btn-dark add-more add_field_button3 waves-effect waves-light" type="button">Add More +</button>
								</div>
							</label>
							<div class="row add-more-wrap3 after-add-more m-0 mb-4">
								<!-- <span class="add-count">1</span> -->
								<div class="col-12 col-md-6">
									<div class="form-group">
									  <label for="EquipmentName" class="active">Equipment Name</label>
									  <select class="form-control select" id="EquipmentName">
										<option>Select</option>
										<option>SS Reactor</option>
										<option>SS Homogenising Tank</option>
										<option>Filling Station</option>
									  </select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
									  <label for="EquipmentCode" class="active">Equipment Code</label>
									  <select class="form-control select" id="EquipmentCode">
										<option>Select</option>
										<option>PR/RC/001</option>
										<option>PR/RC/002</option>
									  </select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
						  <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
						</div>
					</div>
				</div>
					</div>
					<div id="lineClearance" class="tab-pane fade">
						<div class="form-row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="proName" class="active">Product Name</label>
						  <input type="text" class="form-control" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="bmrNo" class="active">BMR No.</label>
						  <input type="text" class="form-control" id="bmrNo" placeholder="BMR No." value="RCIPL/BMR/Flx-2300/09">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="batchNo">Batch No.</label>
						  <input type="text" class="form-control" id="batchNo" placeholder="Batch No." value="RFLX 20/668">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="refMfrNo">Ref. MFR No.</label>
						  <input type="text" class="form-control" id="refMfrNo" placeholder="Ref. MFR No." value="RCIPL/MFR/01/01">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="Date">Date</label>
						  <input type="date" class="form-control" id="Date" placeholder="" value="">
						</div>
					</div>
					<div class="col-12 col-md-12 col-lg-12 col-xl-12">
						<div class="form-group input_fields_wrap" id="MaterialReceived">
							<label class="control-label d-flex">Line Clearance Record
								<div class="input-group-btn">
									<button class="btn btn-dark add-more add_field_button4 waves-effect waves-light" type="button">Add More +</button>
								</div>
							</label>
							<div class="row add-more-wrap4 after-add-more m-0 mb-4">
								<!-- <span class="add-count">1</span> -->
								<div class="col-12 col-md-4">
									<div class="form-group">
									  <label for="EquipmentName" class="active">Particulars</label>
									  <select class="form-control select" id="EquipmentName">
										<option>Select</option>
										<option>Area Cleanliness Checked</option>
										<option>Temperature(<sup>o</sup>C)</option>
										<option>Humidity (%RH)</option>
									  </select>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
									  <label for="Observation" class="active">Observation</label>
									  <input type="text" class="form-control" id="Observation" placeholder="" value="">
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
									  <label for="time" class="active">Time (Hrs)</label>
									  <input type="text" class="form-control" id="time" placeholder="" value="">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
						  <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit & Next</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Save & Quite</button>
						</div>
					</div>
				</div>
					</div>
					<div id="addLots" class="tab-pane fade">
						<div class="form-row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="proName" class="active">Product Name</label>
						  <input type="text" class="form-control" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="bmrNo" class="active">BMR No.</label>
						  <input type="text" class="form-control" id="bmrNo" placeholder="BMR No." value="RCIPL/BMR/Flx-2300/09">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="batchNo">Batch No.</label>
						  <input type="text" class="form-control" id="batchNo" placeholder="Batch No." value="RFLX 20/668">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="refMfrNo">Ref. MFR No.</label>
						  <input type="text" class="form-control" id="refMfrNo" placeholder="Ref. MFR No." value="RCIPL/MFR/01/01">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="Date">Date</label>
						  <input type="date" class="form-control" id="Date" placeholder="" value="">
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
						  <label class="control-label d-flex">Process Sheet</label>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4">
						<div class="form-group">
						  <label for="lotNo" class="active">Lot No.</label>
						  <input type="text" class="form-control" id="lotNo" placeholder="Lot No." value="1">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4">
						<div class="form-group">
						  <label for="ReactorNo">Reactor No.</label>
						  <select class="form-control" id="ReactorNo">
										<option>Select</option>
										<option>PR/RC/001</option>
										<option>PR/RC/002</option>
									  </select>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4">
						<div class="form-group">
						  <label for="Date">Date</label>
						  <input type="date" class="form-control" id="Date" placeholder="" value="">
						</div>
					</div>
					<div class="col-12 col-md-12 col-lg-12 col-xl-12">
						<div class="form-group input_fields_wrap" id="MaterialReceived">
							<label class="control-label d-flex">Raw Material Detail
								<div class="input-group-btn">
									<button class="btn btn-dark add-more add_field_button5 waves-effect waves-light" type="button">Add More +</button>
								</div>
							</label>
							<div class="row add-more-wrap5 after-add-more m-0 mb-4">
								<!-- <span class="add-count">1</span> -->
								<div class="col-12 col-md-4">
									<div class="form-group">
									  <label for="EquipmentName" class="active">Raw Material</label>
									  <select class="form-control select" id="EquipmentName">
										<option>Select</option>
										<option>Raw Material Name</option>
									  </select>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
									  <label for="rmbatchno" class="active">Batch No.</label>
									  <input type="text" class="form-control" id="rmbatchno" placeholder="" value="">
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
									  <label for="Quantity" class="active">Quantity (Kg.)</label>
									  <input type="text" class="form-control" id="Quantity" placeholder="" value="">
									</div>
								</div>
							</div>
						</div>
					</div>
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
									<td><input type="text" name="qty[1]" id="qty[1]" class="form-control"></td>
									<td><input type="text" name="temp[1]" id="temp[1]" class="form-control"></td>
									<td><input type="text" name="stratTime[1]" id="stratTime[1]" class="form-control"></td>
									<td><input type="text" name="endTime[1]" id="endTime[1]" class="form-control"></td>
									<td><select class="form-control select" id="doneby[1]">
										<option>Select</option>
										<option>Employee Name</option>
									  </select></td>
								</tr>
								<tr>
									<td>Start heating the reactor and start stirring</td>
									<td><input type="text" name="qty[2]" id="qty[2]" class="form-control"></td>
									<td><input type="text" name="temp[2]" id="temp[2]" class="form-control"></td>
									<td><input type="text" name="stratTime[2]" id="stratTime[2]" class="form-control"></td>
									<td><input type="text" name="endTime[2]" id="endTime[2]" class="form-control"></td>
									<td><select class="form-control select" id="doneby[2]">
										<option>Select</option>
										<option>Employee Name</option>
									  </select></td>
								</tr>
								<tr>
									<td>Once the temperature is between 100 - 120<sup>o</sup>C start the Inline mixer and charge ColloidalSilicon Dioxide (Fumed Silica) in reactor simultaneously and increase stirring speed.</td>
									<td><input type="text" name="qty[3]" id="qty[3]" class="form-control"></td>
									<td><input type="text" name="temp[3]" id="temp[3]" class="form-control"></td>
									<td><input type="text" name="stratTime[3]" id="stratTime[3]" class="form-control"></td>
									<td><input type="text" name="endTime[3]" id="endTime[3]" class="form-control"></td>
									<td><select class="form-control select" id="doneby[3]">
										<option>Select</option>
										<option>Employee Name</option>
									  </select></td>
								</tr>
								<tr>
									<td>When temperature reaches 180 - 190 <sup>o</sup>C stop heating the reactor.</td>
									<td><input type="text" name="qty[4]" id="qty[4]" class="form-control"></td>
									<td><input type="text" name="temp[4]" id="temp[4]" class="form-control"></td>
									<td><input type="text" name="stratTime[4]" id="stratTime[4]" class="form-control"></td>
									<td><input type="text" name="endTime[4]" id="endTime[4]" class="form-control"></td>
									<td><select class="form-control select" id="doneby[4]">
										<option>Select</option>
										<option>Employee Name</option>
									  </select></td>
								</tr>
								<tr>
									<td>Stop stirrer and transfer the reaction mass to homogenizing tank No.- PR/BT/Come Tank number</td>
									<td><input type="text" name="qty[1]" id="qty[1]" class="form-control"></td>
									<td><input type="text" name="temp[1]" id="temp[1]" class="form-control"></td>
									<td><input type="text" name="stratTime[1]" id="stratTime[1]" class="form-control"></td>
									<td><input type="text" name="endTime[1]" id="endTime[1]" class="form-control"></td>
									<td><select class="form-control select" id="doneby[1]">
										<option>Select</option>
										<option>Employee Name</option>
									  </select></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-12">
						<div class="form-group">
						  <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Save &amp; Quite</button><a href="add-batch-manufacturing-record-add-lot2.html" class="btn btn-dark btn-md form-btn waves-effect waves-light">Continue</a>
						</div>
					</div>
				</div>
					</div>
					<div id="Packing" class="tab-pane fade">
						<div class="form-row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="proName" class="active">Product Name</label>
						  <input type="text" class="form-control" id="proName" placeholder="Product Name" value="Simethicone (Filix-110)">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="bmrNo" class="active">BMR No.</label>
						  <input type="text" class="form-control" id="bmrNo" placeholder="BMR No." value="RCIPL/BMR/Flx-2300/09">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="batchNo">Batch No.</label>
						  <input type="text" class="form-control" id="batchNo" placeholder="Batch No." value="RFLX 20/668">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="refMfrNo">Ref. MFR No.</label>
						  <input type="text" class="form-control" id="refMfrNo" placeholder="Ref. MFR No." value="RCIPL/MFR/01/01">
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="ManufacturerDate" class="active">Date</label>
						  <input type="date" class="form-control calendar" id="ManufacturerDate" placeholder="DD/MM/YYYY">
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
									  <input type="text" class="form-control" id="Observation" placeholder="Observation">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="Temperature" class="active">Temperature ( <sup>o</sup>C) of Filling area</label>
									  <input type="text" class="form-control" id="Temperature" placeholder="Observation">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="Humidity" class="active">Humidity (%RH) of Filling area</label>
									  <input type="text" class="form-control" id="Humidity" placeholder="Observation">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="TemperatureP" class="active">Temperature ( <sup>o</sup>C) of Product</label>
									  <input type="text" class="form-control" id="TemperatureP" placeholder="Observation">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="50kgDrums" class="active">50 Kg No of Drums filled</label>
									  <input type="Number" class="form-control" id="50kgDrums" placeholder="No of Drums">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="200kgDrums" class="active">200 Kg No of Drums filled</label>
									  <input type="Number" class="form-control" id="20kgDrums" placeholder="No of Drums">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="startTime" class="active">Start Time (Hrs.)</label>
									  <input type="number" class="form-control time" id="startTime" placeholder="">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="startTime" class="active">End Time (Hrs.)</label>
									  <input type="number" class="form-control time" id="startTime" placeholder="">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="areaCleanliness">Done By</label>
									  <select class="form-control select" id="areaCleanliness">
										<option>Select</option>
										<option>Employee Name</option>
									  </select>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="areaCleanliness">Checked By</label>
									  <select class="form-control select" id="areaCleanliness">
										<option>Select</option>
										<option>Employee Name</option>
									  </select>
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
									  <input type="text" class="form-control" id="rmInput" placeholder="">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="fgOutput" class="active">FG Output</label>
									  <input type="text" class="form-control" id="fgOutput" placeholder="">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="filledDrums" class="active">Filled in Drums (Kg)</label>
									  <input type="text" class="form-control" id="filledDrums" placeholder="">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="excessFilledDrums" class="active">Excess filled in drums</label>
									  <input type="text" class="form-control" id="excessFilledDrums" placeholder="">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="qcsampling" class="active">QC Sampling (Kg.)</label>
									  <input type="text" class="form-control" id="qcsampling" placeholder="">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="StabilitySample" class="active">Stability Sample (Kg.)</label>
									  <input type="Number" class="form-control" id="StabilitySample" placeholder="">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="WorkingSlandered" class="active">Working Slandered</label>
									  <input type="text" class="form-control" id="WorkingSlandered" placeholder="">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="ValidationSample" class="active">Validation Sample</label>
									  <input type="text" class="form-control" id="ValidationSample" placeholder="">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="CustomerSample" class="active">Filled in Jerry can / Drum (Kg.) (Customer Sample)</label>
									  <input type="text" class="form-control" id="CustomerSample" placeholder="">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="ActualYield" class="active">Actual Yield [(Output/Input)*100]</label>
									  <input type="text" class="form-control" id="ActualYield" placeholder="98.00 / 102.00%">
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="checkedBy">Checked By</label>
									  <select class="form-control select" id="checkedBy">
										<option>Select</option>
										<option>Manager Production</option>
									  </select>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-4">
									<div class="form-group">
									  <label for="ApprovedBy">Approved By</label>
									  <select class="form-control select" id="ApprovedBy">
										<option>Select</option>
										<option>Sr. Officer - QC</option>
									  </select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
						  <label for="Remark" class="active">Note / Remark</label>
						  <textarea class="form-control" id="Remark" placeholder="Note / Remark"></textarea>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
						  <button type="submit" class="btn btn-primary btn-md ml-0 form-btn waves-effect waves-light">Submit</button><button type="clear" class="btn btn-light btn-md form-btn waves-effect waves-light">Clear</button>
						</div>
					</div>
				</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>

<!-- <div class="modal fade show" name="checkQuntity" id="checkQuntity" tabindex="-1" aria-labelledby="checkQuntityLabel" aria-modal="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" name="checkQuntityLabel" id="checkQuntityLabel">Material Name - Batch no.</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
      </div>
      <div class="modal-body">
		<form action="#" method="_post" name="checkQuantity" id="checkQuantity">
			<div class="form-row">
				<div class="col-12 col-md-6 col-lg-6 col-xl-6">
					<div class="form-group">
					  <label for="QuantityApproved">Quantity Approved</label>
					  <input type="text" class="form-control" name="QuantityApproved" id="QuantityApproved" placeholder="Quantity Approved">
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-6 col-xl-6">
					<div class="form-group">
					  <label for="QuantityRejected">Quantity Rejected</label>
					  <input type="text" class="form-control" name="QuantityRejected" id="QuantityRejected" placeholder="Quantity Rejected">
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-6 col-xl-6">
					<div class="form-group">
					  <label for="Status">Status</label>
					  <select class="form-control select" name="Status" id="Status">
						<option>Select</option>
						<option>Approved</option>
						<option>Rejected</option>
					  </select>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-6 col-xl-6">
					<div class="form-group">
					  <label for="ApprovalDate">Date of Approval</label>
					  <input type="date" class="form-control calendar" name="ApprovalDate" id="ApprovalDate" placeholder="DD-MM-YYYY">
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
					  <label for="Remark">Remark</label>
					  <textarea class="form-control" name="Remark" id="Remark" placeholder="Remark"></textarea>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $("#add_manufacturing").validate({
            rules: {
                proName: "required",
                bmrNo: "required",
                batchNo: "required",
                refMfrNo: "required",
                grade: "required",
                BatchSize: "required",
                Viscosity: "required",
                ProductionCommencedon: "required",
                ProductionCompletedon: "required",
                ManufacturingDate: "required",
                RetestDate: "required",
                doneBy: "required",
                checkedBy: "required",
                inlineRadioOptions: "required",
                approval: "required",
                approvalDate: "required",
                checkedByI: "required",

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
                checkedByI: "Please  Enter The Name checkedBy",
            },
        });

    });
</script>

@endpush
