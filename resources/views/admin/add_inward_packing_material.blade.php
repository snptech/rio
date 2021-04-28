@extends('section.app')

@section('content')
<div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row page-heading">
                                <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center">
                                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Goods Receipt Note (Packing Material)</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card main-card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="from">From</label>
                                        <input type="text" class="form-control" id="from" placeholder="Store" value="Store">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="to">TO</label>
                                        <input type="text" class="form-control" id="to" placeholder="Quality Control and Purchase" value="Quality Control and Purchase">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="receiptDate">Date of Receipt</label>
                                        <input type="date" class="form-control calendar" id="receiptDate" placeholder="DD-MM-YYYY">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="ManufacturerName">Name of Manufacturer</label>
                                        <input type="text" class="form-control" id="ManufacturerName" placeholder="Name of Manufacturer">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="SupplierName">Name of Supplier</label>
                                        <select class="form-control select" id="SupplierName">
                                            <option>Select Supplier Name</option>

                                            @if(count($supplier_master))
                                            @foreach($supplier_master as $temp)
                                            <option value="{{$temp->id}}">{{$temp->name_supplier}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="invoiceNo">Invoice No.</label>
                                        <input type="text" class="form-control" id="invoiceNo" placeholder="Invoice No">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label for="receiptNo">Goods Receipt No.</label>
                                        <input type="text" class="form-control" id="receiptNo" placeholder="GRM/RM/Receipt No.">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group input_fields_wrap" id="MaterialReceived">
                                        <label class="control-label d-flex">Details of Material Received
                                            <div class="input-group-btn">
                                                <button class="btn btn-dark add-more add_field_button" type="button">Add More +</button>
                                            </div>
                                        </label>
                                        <div class="row add-more-wrap after-add-more m-0 mb-4">
                                            <span class="add-count">1</span>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="packingMaterialName">Packing Material Name</label>
                                                    <select class="form-control select" id="packingMaterialName">
                                                    <option>Select Material Name</option>
                                                        @if(count($material_master))
                                                        @foreach($material_master as $temp)
                                                        <option value="{{$temp->id}}">{{$temp->name_material}}</option>

                                                        @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="Quantity">Total Quantity Received (Nos.)</label>
                                                    <input type="text" class="form-control" id="Quantity" placeholder="Quantity">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="ARNo">AR No. / Date</label>
                                                    <input type="text" class="form-control" id="ARNo" placeholder="AR No. / Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="Remark">Note / Remark</label>
                                        <textarea class="form-control" id="Remark" placeholder="Note / Remark"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-md ml-0 form-btn">Submit</button><button type="clear" class="btn btn-light btn-md form-btn">Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

@endsection
