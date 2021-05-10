@extends("layouts.app")
@section('content')
<div class="content-wrapper">
<div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-lg-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="package"></i>Inward Finished Goods - New Stock</h4>
                </div>
                <!-- <div class="col-12 col-lg-2 ml-auto align-self-center align-items-end text-right">
                    <a href="{{ route('new_stock_add') }}" class="btn btn-md btn-primary">Add New +</a>
                </div> -->
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2">Date</th>
                            <th rowspan="2">Product Name</th>
                            <th rowspan="2">Batch No</th>
                            <th rowspan="2">Grade</th>
                            <th rowspan="2">Viscosity</th>
                            <th rowspan="2">Mfg. Date</th>
                            <th rowspan="2">Expiry Retest Date</th>
                            <th colspan="5">Total No. of Drumbs</th>
                            <th rowspan="2">Total Quantity (Kg.)</th>
                            <th rowspan="2">AR No.</th>
                            <th rowspan="2">Approval Date</th>
                            <th rowspan="2">Received by</th>

                        </tr>
                        <tr>
                            <th>200 Kg</th>
                            <th>50 Kg</th>
                            <th>30 Kg</th>
                            <th>5 Kg</th>
                            <th>Fiber board</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($inward_goods))
                    @foreach($inward_goods as $temp)
                    <tr>
                            <td>{{$temp->inward_date}}</td>
                            <td>{{$temp->product_name}}</td>
                            <td>{{$temp->batch_no}}</td>
                            <td>{{$temp->grade}}</td>
                            <td>{{$temp->viscosity}}</td>
                            <td>{{$temp->mfg_date}}</td>
                            <td>{{$temp->expiry_ratest_date}}</td>
                            <td>{{$temp->total_no_of_200kg_drums}}</td>
                            <td>{{$temp->total_no_of_50kg_drums}}</td>
                            <td>{{$temp->total_no_of_30kg_drums}}</td>
                            <td>{{$temp->total_no_of_5kg_drums}}</td>
                            <td>{{$temp->total_no_of_fiber_board_drums}}</td>
                            <td>{{$temp->total_quantity}}</td>
                            <td>{{$temp->ar_no}}</td>
                            <td>{{$temp->approval_data}}</td>
                            <td>{{$temp->received_by}}</td>


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
