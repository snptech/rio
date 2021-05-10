@extends("layouts.app")
@section('content')
<div class="content-wrapper">
    <div class="col-md-12 grid-margin">
        <div class="row page-heading">
            <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Issue Material For Production </h4>
            </div>
            <div class="col-12 col-lg-2 ml-auto align-self-center align-items-end text-right">
                <a href="{{ route('issue_material_for_production_add') }}" class="btn btn-md btn-primary">Add New +</a>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <div class="tbl-sticky">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Requisition No</th>
                            <th>Material</th>
                            <th>Opening Bal</th>
                            <th>Batch No</th>
                            <th>Viscosity</th>
                            <th>Issual Date</th>
                            <th>Issued Quantity</th>
                            <th>Finished Batch No</th>
                            <th>Excess</th>
                            <th>Wastage</th>
                            <th>Returned From Day Store</th>
                            <th>Closing Bbalance Qty</th>
                            <th>Dispensed By</th>
                            <th>Remark</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($issue_material))
                        @foreach($issue_material as $temp)
                        <tr>
                            <td> {{$temp->requisition_no}}</td>
                            <td> {{$temp->material}}</td>
                            <td> {{$temp->opening_bal}}</td>
                            <td> {{$temp->batch_no}}</td>
                            <td> {{$temp->viscosity}}</td>
                            <td> {{$temp->issual_date}}</td>
                            <td> {{$temp->issued_quantity}}</td>
                            <td> {{$temp->finished_batch_no}}</td>
                            <td> {{$temp->excess}}</td>
                            <td> {{$temp->wastage}}</td>
                            <td> {{$temp->returned_from_day_store}}</td>
                            <td> {{$temp->closing_balance_qty}}</td>
                            <td> {{$temp->dispensed_by}}</td>
                            <td> {{$temp->remark}}</td>
                            <td>
                            <a href="{{ route('view_issue_material',['id'=>$temp->id]) }}" class="btn action-btn" data-toggle="tooltip" data-placement="top" title="View"><i data-feather="eye"></i></a>

                            </td>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


@endpush
