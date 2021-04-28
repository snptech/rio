@extends("layouts.app")
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row page-heading">
                <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center">
                    <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="layers"></i>Goods Receipt Note (Annexure - IV)</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card main-card">
        <div class="card-body">
            <div class="filter">
                <h3>Filter</h3>
                <form id="filter_vali">
                    <div class="form-row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <input type="date" class="form-control" name="ReceiptDate" id="ReceiptDate" placeholder="Date of Receipt">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="ReceiptNo" id="ReceiptNo" placeholder="Receipt No.">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="MaterialName" id="MaterialName" placeholder="Material Name">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="Manufacturer" id="Manufacturer" placeholder="Name of Manufacturer">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="Supplier" id="Supplier" placeholder="Name of Supplier">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="invoiceNo" id="invoiceNo" placeholder="invoice No.">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <button type="search" class="btn btn-primary">Search</button>
                        </div>
                    </div>

                </form>
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
                        </tr>
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

<script>
    $(document).ready(function() {
        $("#filter_vali").validate({
            rules: {

                ReceiptDate: "required",
                ReceiptNo: "required",
                MaterialName: "required",
                Manufacturer: "required",
                Supplier: "required",
                invoiceNo: "required",
            },
            messages: {
                inward_date: "Please  Enter The Inward Date  ",
                ReceiptDate: "Please  Enter The Receipt Date  ",
                ReceiptNo: "Please  Enter The Receipt No  ",
                MaterialName: "Please  Enter The Material Name ",
                Manufacturer: "Please  Enter The Manufacturer Name",
                Supplier: "Please  Enter The Supplier Name",
                invoiceNo: "Please  Enter The Invoice No  ",
            },

        });

    });
</script>
@endpush
