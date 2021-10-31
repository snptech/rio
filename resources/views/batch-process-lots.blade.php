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
		<div style="padding:1rem 0;text-align:center;text-decoration:underline;font-size:1.2rem;font-weight:bold;color:#313131;">Process Sheet</div>
		@if(isset($lot) && $lot)
		<table width="100%" cellpadding="10" cellspacing="0" border="0" class="heading-tbl">
			<tr>
				<td>
					<table width="100%	" cellpadding="5" cellspacing="0" border="0" style="font-size:1.1rem;font-weight:bold;font-family:Georgia, serif;margin:0 1.2rem 0rem;line-height:1.2;">
						<tr>
							<td width="30%">Lot No.: {{$lot->lotNo}}</td>
							<td>Reactor No.: <span style="font-weight:400;">{{$lot->code}}</span></td>
							<td width="30%">Date:{{$lot->Process_date}}</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="table table-bordered" style="margin-bottom:2.5rem;">
			<thead>
				<tr>
					<th width="50%">Raw Material</th>
					<th>Batch No.</th>
					<th>Qty (Kg.)</th>
				</tr>
			</thead>
			@if(isset($rawmaterial) && $rawmaterial)
				@foreach($rawmaterial  as $mat)
				<tr>
					<td>{{$mat->material_name}}</td>
					<td>{{$mat->batch_no}}</td>
					<td>{{$mat->Quantity}}</td>
				</tr>

				@endforeach
			@endif
				
		</table>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th rowspan="2" width="40%">Process</th>
					<th rowspan="2">Qty. (Kg.)</th>
					<th rowspan="2">Temp (<sup>o</sup>C)</th>
					<th colspan="2">Time (Hrs)</th>
					<th rowspan="2">Done By</th>
					<th rowspan="2">checked By</th>
				</tr>
				<tr>
					<th>Start</th>
					<th>End</th>
				</tr>
			</thead>
			
			 @if($processmaster && isset($process) && $process)
			 	@foreach($processmaster as $key=>$val)
				
				<tr>
					<td>{{$val}}</td>
					<td>{{isset($process[$key])?$process[$key]->qty:""}}</td>
					<td>{{isset($process[$key])?$process[$key]->temp:""}}</td>
					<td>{{isset($process[$key])?$process[$key]->stratTime:""}}</td>
					<td>{{isset($process[$key])?$process[$key]->endTime:""}}</td>
					<td>{{isset($process[$key])?$process[$key]->doneby:""}}</td>
					<td>&nbsp;</td>
				</tr>
				@endforeach
			 @endif
				
			</table>
		@endif
		
		
		</div>

		@endif
	</div>
</div>