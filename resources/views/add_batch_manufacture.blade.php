@extends("layouts.app")
@section("title","Add batch Manufacture")
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="tool"></i>Batch Manufacturing Records</h4>
                </div>
                <div class="col-12 col-lg-2 ml-auto align-self-center align-items-end text-right">
                    <a href="{{route('add-manufacturing-record')}}" class="btn btn-md btn-primary">Add New +</a>
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
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
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
                            <td>{{$temp->ManufacturerDate}}</td>
                            <td>{{$temp->proName}}</td>
                            <td>{{$temp->bmrNo}}</td>
                            <td>{{$temp->batchNo}}</td>
                            <td>{{$temp->refMfrNo}}</td>
                            <td>A</td>
                            <td>500</td>
                            <td>200 - 250 cSt</td>
                            <td>16/03/2021</td>
                            <td>18/03/2021</td>
                            <td>18/03/2021</td>
                            <td>18/03/2021</td>
                            <td>Yes</td>
                            <td><span class="badge badge-success">Approved</span></td>
                            <td class="actions">
                            <a href="#" class="btn action-btn" data-tooltip="tooltip" title="View"><i data-feather="eye"></i></a>
                            <a href="{{url('add_manufacturing_edit',['$temp->id'])}}" class="btn action-btn" data-tooltip="tooltip" title="Edit"><i data-feather="edit-3"></i></a>
                            <a href="#" class="btn action-btn" data-tooltip="tooltip" title="Delete"><i data-feather="trash"></i></a></td>
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

@endpush
