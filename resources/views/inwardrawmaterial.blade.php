@extends('layouts.app')
@section("title","Inward Raw Material")
@section('content')
     <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row page-heading">
                <div class="col-12 col-xl-8 mb-xl-0 align-self-center align-items-center">
                  <h4 class="font-weight-bold d-flex"><i class="menu-icon" data-feather="layers"></i>Goods Receipt Note</h4>
				  <p>This form is Submitted to Quality Control for testing Sample of Products received.</p>
                </div>
              </div>
            </div>
          </div>
		  <div class="card main-card">
			<div class="card-body">
                <form class="login100-form validate-form" action="{{ route('inwardrawmaterial-store') }}" method="POST" id="inwardrawmaterialForm">
                @csrf
				<div class="form-row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="rno">No.</label>
						  <input type="text" class="form-control" name="rno" id="rno" placeholder="{{ $nextid }}" value="{{ $nextid }}" readonly>
                          @if ($errors->has('rno'))
                                    <span class="text-danger">{{ $errors->first('rno') }}</span>
                            @endif
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="from">From</label>
						  <input type="text" class="form-control" id="from" name="from" placeholder="Store" value="Store" readonly>
                          @if ($errors->has('from'))
                                    <span class="text-danger">{{ $errors->first('from') }}</span>
                            @endif
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="to">TO</label>
						  <input type="text" class="form-control" name="to" id="to" placeholder="Quality Control and Purchase" value="Quality Control and Purchase" readonly>
                          @if ($errors->has('to'))
                            <span class="text-danger">{{ $errors->first('to') }}</span>
                          @endif
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="receiptDate">Date of Receipt</label>
						  <input type="date" class="form-control calendar" name="receiptDate" id="receiptDate" placeholder="DD-MM-YYYY">
                          @if ($errors->has('receiptDate'))
                            <span class="text-danger">{{ $errors->first('receiptDate') }}</span>
                          @endif
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="materialName">Name of Material</label>
                          {{ Form::select("materialname",$rawmaterial,old("materialname"),array("class"=>"form-control select","id"=>"materialname","placeholder"=>"Choose Material")) }}
                          @if ($errors->has('materialname'))
                          <span class="text-danger">{{ $errors->first('materialname') }}</span>
                        @endif
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="manufacturername">Name of Manufacturer</label>
                          {{ Form::select("manufacturername",$manufacturer,old("manufacturername"),array("class"=>"form-control select","id"=>"manufacturername","placeholder"=>"Choose Manufactur")) }}

						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="suppliername">Name of Supplier</label>
                          {{ Form::select("suppliername",$supplier,old("suppliername"),array("class"=>"form-control select","id"=>"suppliername","placeholder"=>"Choose Supplier")) }}
                          @if ($errors->has('suppliername'))
                          <span class="text-danger">{{ $errors->first('suppliername') }}</span>
                        @endif
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="supplierAddress">Address of Supplier</label>
						  <input type="text" class="form-control" id="supplierAddress" name="supplierAddress" placeholder="Address of Supplier">
                          @if ($errors->has('supplierAddress'))
                          <span class="text-danger">{{ $errors->first('supplierAddress') }}</span>
                        @endif
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="supplierGST">Supplier GST Number</label>
						  <input type="text" class="form-control" id="supplierGST" name="supplierGST" placeholder="Supplier GST">
                          @if ($errors->has('supplierGST'))
                          <span class="text-danger">{{ $errors->first('supplierGST') }}</span>
                        @endif
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="invoiceNo">Invoice No.</label>
						  <input type="text" class="form-control" id="invoiceNo" name="invoiceNo" placeholder="Invoice No">
                          @if ($errors->has('invoiceNo'))
                          <span class="text-danger">{{ $errors->first('invoiceNo') }}</span>
                        @endif
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="receiptNo">Goods Receipt No.</label>
						  <input type="text" class="form-control" id="receiptNo"  name="receiptNo" placeholder="GRM/RM/Receipt No.">
                          @if ($errors->has('receiptNo'))
                          <span class="text-danger">{{ $errors->first('receiptNo') }}</span>
                        @endif
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
									  <label for="rawMaterialName">Raw Material Name</label>
									  {{ Form::select("materialnames[]",$rawmaterial,old("materialnames[]"),array("class"=>"form-control select","id"=>"materialname1","placeholder"=>"Choose Material")) }}
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
									  <label for="batch">Batch No.</label>
									  <input type="text" class="form-control" name="batch[]" id="batch" placeholder="Batch">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
									  <label for="Containers">Total no of Containers / Bags</label>
									  <input type="text" class="form-control" id="Containers" name="Containers[]" placeholder="No of Containers / Bags">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
									  <label for="Quantity">Quantity Received (Kg)</label>
									  <input type="text" class="form-control" id="Quantity" name="Quantity[]" placeholder="Quantity">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
									  <label for="mfgDate">Manufacturer’s Mfg. Date</label>
									  <input type="date" class="form-control calendar" id="mfgDate" name="mfgDate[]" placeholder="Mfg. Date">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
									  <label for="ExpiryDate">Manufacturer’s Expiry Date</label>
									  <input type="date" class="form-control calendar" id="ExpiryDate" name="ExpiryDate[]" placeholder="Expiry Date">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
									  <label for="RIOExpiryDate">RIO Care Expiry Date</label>
									  <input type="date" class="form-control calendar" id="RIOExpiryDate" name="RIOExpiryDate[]" placeholder="Expiry Date">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
									  <label for="ARNo">AR No. / Date</label>
									  <input type="text" class="form-control" id="ARNo" placeholder="AR No. / Date" name="ARNo[]" value="">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="createdby">Created By</label>
						  <input type="text" name="createdby" class="form-control" id="createdby" value="{{ \Auth::user()->name }}" readonly />
                          @if ($errors->has('createdby'))
                          <span class="text-danger">{{ $errors->first('createdby') }}</span>
                        @endif
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="form-group">
						  <label for="dateTime">Date and Time</label>
						  <div class="form-row">
							<div class="col-6"><input type="date" name="cdate" class="form-control calendar" id="date" placeholder="Date" value={{ date("Y-m-d") }}></div>
							<div class="col-6"><input type="time"  name="ctime" class="form-control calendar" id="Time" placeholder="Time" value="{{ date("H:i") }}"></div>
                            @if ($errors->has('cdate'))
                            <span class="text-danger">{{ $errors->first('cdate') }}</span>
                          @endif
						  </div>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
						  <label for="Remark">Note / Remark</label>
						  <textarea class="form-control" id="Remark" name="remark" placeholder="Note / Remark"></textarea>
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
@push("scripts")
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    feather.replace()
    $(document).ready(function() {
		var max_fields      = 15; //maximum input boxes allowed
		var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
		var add_button      = $(".add_field_button"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function(e){ //on add input button click
			e.preventDefault();
			if(x < max_fields){ //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row add-more-wrap add-more-new m-0 mb-4"><span class="add-count">'+x+'</span><div class="input-group-btn"><button class="btn btn-danger remove_field" type="button"><i class="icon-remove" data-feather="x"></i></button></div><div class="col-12 col-md-6"><div class="form-group"><label for="rawMaterialName['+x+']">Raw Material Name</label> {{ Form::select("materialnames[]",$rawmaterial,old("materialnames[]"),array("class"=>"form-control select","id"=>"materialname1","placeholder"=>"Choose Material")) }}</div></div><div class="col-12 col-md-6"><div class="form-group"><label for="batch['+x+']">Batch No.</label><input type="text" class="form-control" id="batch['+x+']" name="batch[]" placeholder="Batch"></div></div><div class="col-12 col-md-6"><div class="form-group"><label for="Containers['+x+']">Total no of Containers / Bags</label><input type="text" class="form-control" id="Containers['+x+']" name="Containers[]" placeholder="No of Containers / Bags"></div></div><div class="col-12 col-md-6"><div class="form-group"><label for="Quantity['+x+']">Quantity Received (Kg)</label><input type="text" class="form-control" id="Quantity['+x+']" name="Quantity[]" placeholder="Quantity"></div></div><div class="col-12 col-md-6"><div class="form-group"><label for="mfgDate['+x+']">Manufacturer’s Mfg. Date</label><input type="date" name="mfgDate[]" class="form-control calendar" id="mfgDate['+x+']" placeholder="Mfg. Date"></div></div><div class="col-12 col-md-6"><div class="form-group"><label for="ExpiryDate['+x+']">Manufacturer’s Expiry Date</label><input type="date" class="form-control calendar" name="ExpiryDate[]" id="ExpiryDate['+x+']" placeholder="Expiry Date"></div></div><div class="col-12 col-md-6"><div class="form-group">'+x+'<label for="RIOExpiryDate['+x+']">RIO Care Expiry Date</label><input type="date" class="form-control calendar" name="RIOExpiryDate[]" id="RIOExpiryDate['+x+']" placeholder="Expiry Date"></div></div><div class="col-12 col-md-6"><div class="form-group"><label for="ARNo['+x+']">AR No. / Date</label><input type="text" class="form-control" name="ARNo[]" id="ARNo['+x+']" placeholder="AR No. / Date"></div></div></div>');
			}
			feather.replace()
		});

		$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
			e.preventDefault(); $(this).parents('div.row').remove(); x--;
		})


	});
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#suppliername").change(function(){
                $.ajax({
                    url:'{{ route("inwardrawmaterial-supplier") }}',
                    data:{
                        "id":$(this).val(),
                        "_token":'{{ csrf_token() }}'
                    },
                    method:"post",
                    datatype:"json"
                }).success(function(data){
                    $("#supplierAddress").val(data.address);
                    $("#supplierGST").val(data.gst);
                })
            })
      $("#inwardrawmaterialForm").validate({
        rules: {
            rno : {
            required: true,
          },
          from:{
            required:true
          },
          to:{
            required:true
          },
          receiptDate:
          {
            required:true
          },
          materialname:{
            required:true
          },
          manufacturername:{
            required:true
          },
          suppliername:{
              required:true
          },
          supplierAddress:{
              required:true
          },
          supplierGST:{
              required:true
          },
          invoiceNo:{
              required:true
          },
          receiptNo:{
              required:true
          },
          "materialnames[]":{
              required:true
          },
          "batch[]":{
              required:true
          },
          "Containers[]":{
              required:true
          },
          "Quantity[]":{
              required:true
          },
          "mfgDate[]":{
              required:true
          },
          "ExpiryDate[]":{
              required:true
          },
          "ExpiryDate[]":{
              required:true
          },
          "RIOExpiryDate[]":{
              required:true
          },
          "ARNo[]":{
              required:true
          },
          createdby:{
              required:true
          },
          cdate:{
              required:true
          },
          ctime:{
              required:true
          },

          publish: {
            required: true,

          }
        },
        messages : {
            supplier: {
            required: "Field Manufacturer is required.",
            minlength: "Manufacturer should be at least 3 characters"
          },
          city: {
            required: "City field is required.",

          },
          state: {
            required: "State field is required.",

          },
          address: {
            required: "Address field is required.",

          },
          company_name: {
            required: "Company Name field is required.",

          },
          contact_per_name: {
            required: "Contact person name field is required.",

          },
          contact_number: {
            required: "Contact number field is required.",

          },
          publish: {
            required: "Please select publish option",

          }
        }
      });
    });
    </script>

    @endpush
