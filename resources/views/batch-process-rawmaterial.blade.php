<div class="container-scroller">
    
    <div class="container-fluid p-3">
      <!-- Main Container -->
    <div style="display:block;padding:20px;border:1px solid #000;min-height:11.7in;">
		<table width="100%" cellpadding="10" cellspacing="0" border="0">
			<tr>
				<td width="80"><img src="{{asset('pdf/assets/img/print_logo.png')}}" style="width:80px;height:auto;"></td>
				<td style="text-align:center;"><h2 style="font-family:Georgia, serif;font-size: 2rem;">RioCare India Private Limited</h2><p style="font-family:Georgia, serif;font-size:1rem;font-weight:bold;">Plot R-940, TTC Industrial Area, MIDC Rabale, Navi Mumbai &ndash; 400 701, Maharashtra, INDIA.</p></td>
				<td width="80">&nbsp;</td>
			</tr>
		</table>
		<div style="padding:1rem 0;text-align:center;text-decoration:underline;font-size:1.4rem;font-weight:bold;color:#313131;">Batch Manufacturing Record</div>
		@if(isset($manufacture) && $manufacture)
			<table width="100%" cellpadding="10" cellspacing="0" border="0" class="heading-tbl">
				<tr>
					<td>
						<table width="auto" cellpadding="5" cellspacing="0" border="0" style="font-size:1.1rem;font-weight:bold;font-family:Georgia, serif;margin:0 1.2rem 0rem;line-height:1.2;">
							<tr>
								<td>Product name</td>
								<td>:</td>
								<td>{{$manufacture->material_name}}</td>
							</tr>
							<tr>
								<td>Batch No.</td>
								<td>:</td>
								<td>{{$manufacture->batchNo}}</td>
							</tr>
						</table>
					</td>
					<td>
						<table width="auto" cellpadding="5" cellspacing="0" border="0" style="font-size:1.1rem;font-weight:bold;font-family:Georgia, serif;margin:0 1.2rem 0rem;line-height:1.2;">
							<tr>
								<td>BMR No.</td>
								<td>:</td>
								<td>{{$manufacture->bmrNo}}</td>
							</tr>
							<tr>
								<td>Ref. MFR No.</td>
								<td>:</td>
								<td>{{$manufacture->refMfrNo}}</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<div style="padding:1rem 0;text-align:left;text-decoration:underline;font-size:1.2rem;font-weight:bold;color:#616161;">Bill of Raw Material Details and Weighing Record:</div>
			@if(isset($raw_material_bills) && count($raw_material_bills) >0)
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>S. No.</th>
							<th>Raw Material</th>
							<th>Quantity<br />(Kg.)</th>
							<th>Batch No.</th>
							<th width="20%">AR No. / Date</th>
							<th>Weighed<br />By</th>
							<th>Checked<br />By</th>
						</tr>
					</thead>
					@php $i =1; @endphp
					@foreach($raw_material_bills as $mat)
						@foreach($mat as $det)
						<tr>
							<td>{{$i}}</td>
							<td>{{$det->material_name}}</td>
							<td>{{$det->approved_qty}}</td>
							<td>{{$det->batch_no}}</td>
							<td>{{$det->ar_no_date}}</td>
							<td>{{isset($Requisitionissuedmaterial[0])?$Requisitionissuedmaterial[0]->checkby:""}}</td>
							<td>{{isset($Requisitionissuedmaterial[0])?$Requisitionissuedmaterial[0]->approvedby:""}}</td>
						</tr>
						@php $i++; @endphp
						@endforeach
					@endforeach
						
				</table>
			@endif
			
			</div>
		@endif
	</div>
</div>