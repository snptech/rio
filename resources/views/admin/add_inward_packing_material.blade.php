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
            <form id="add_inward_packing_vali">
                <div class="form-row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="from">From</label>
                            <input type="text" class="form-control" name="received_from" id="received_from" placeholder="Store" value="Store">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="to">TO</label>
                            <input type="text" class="form-control" name="received_to" id="received_to" placeholder="Quality Control and Purchase" value="Quality Control and Purchase">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="receiptDate">Date of Receipt</label>
                            <input type="date" class="form-control calendar" name="date_of_receipt" id="date_of_receipt" placeholder="DD-MM-YYYY">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="ManufacturerName">Name of Manufacturer</label>
                            <input type="text" class="form-control" name="material" id="material" placeholder="Name of Manufacturer">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="SupplierName">Name of Supplier</label>
                            <select class="form-control select" name="manufacturer" id="manufacturer">
                                <option>Select Supplier Name</option>
                                <option>Select Supplier Name</option>
                                <option>Select Supplier Name</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="invoiceNo">Invoice No.</label>
                            <input type="text" class="form-control" name="invoice_no" id="invoice_no" placeholder="Invoice No">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="receiptNo">Goods Receipt No.</label>
                            <input type="text" class="form-control" name="goods_receipt_no" id="goods_receipt_no" placeholder="GRM/RM/Receipt No.">
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
                                        <select class="form-control select" name="material" id="material">
                                            <option>Select Material Name</option>
                                            <option>Select Material Name</option>
                                            <option>Select Material Name</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="Quantity">Total Quantity Received (Nos.)</label>
                                        <input type="text" class="form-control" name="total_qty" id="total_qty" placeholder="Quantity">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="ARNo">AR No. / Date</label>
                                        <input type="text" class="form-control" name="ar_no_date" id="ar_no_date" placeholder="AR No. / Date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="Remark">Note / Remark</label>
                            <textarea class="form-control" name="remark" id="remark" placeholder="Note / Remark"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-md ml-0 form-btn">Submit</button>
                            <button type="button" class="btn btn-light btn-md clear_submit">Clear</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#add_inward_packing_vali").validate({
            rules: {
                inward_no:"required",
                received_from:"required",
                received_to:"required",
                date_of_receipt:"required",
                material:"required",
                manufacturer:"required",
                supplier:"required",
                supplier_address:"required",
                supplier_gst:"required",
                invoice_no:"required",
                goods_receipt_no:"required",
                remark:"required",
                material:"required",
                total_qty:"required",
                ar_no_date:"required",
            },
            messages: {
                inward_no:"Please  Enter The Inward No",
                received_from:"Please  Enter The Received from",
                received_to:"Please  Enter The Received To",
                date_of_receipt:"Please  Enter The Date Of Receipt",
                material:"Please  Enter The Material",
                manufacturer:"Please  Enter The Manufacturer",
                supplier:"Please  Enter The Supplier",
                supplier_address:"Please  Enter The Supplier Address",
                supplier_gst:"Please  Enter The Supplier GST ",
                invoice_no:"Please  Enter The Invoice no",
                goods_receipt_no:"Please  Enter The Goods Receipt No",
                remark:"Please  Enter The remark",
                material:"Please  Enter The Material",
                total_qty:"Please  Enter The Total qty",
                ar_no_date:"Please  Enter The Ar No Date",
            },
        });
        $('.clear_submit').click(function() {
            $('#inward_no').val('');
            $('#received_from').val('');
            $('#received_to').val('');
            $('#date_of_receipt').val('');
            $('#material').val('');
            $('#manufacturer').val('');
            $('#supplier').val('');
            $('#supplier_address').val('');
            $('#supplier_gst').val('');
            $('#invoice_no').val('');
            $('#goods_receipt_no').val('');
            $('#remark').val('');
            $('#material').val('');
            $('#total_qty').val('');
            $('#ar_no_date').val('');
        });
    });
</script>
@endpush
