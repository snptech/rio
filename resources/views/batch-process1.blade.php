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
		<div style="padding:2rem 0;text-align:center;text-decoration:underline;font-size:1.4rem;font-weight:bold;color:#313131;">Batch Manufacturing Record</div>
		@if(isset($manufacture) && $manufacture)
			<table width="100%" cellpadding="10" cellspacing="0" border="0" class="heading-tbl">
				<tr>
					<td>
						<table width="auto" cellpadding="5" cellspacing="0" border="0" style="font-size:1.1rem;font-weight:bold;font-family:Georgia, serif;margin:0 1.2rem 1.5rem;line-height:1.5;">
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
						<table width="auto" cellpadding="5" cellspacing="0" border="0" style="font-size:1.1rem;font-weight:bold;font-family:Georgia, serif;margin:0 1.2rem 1.5rem;line-height:1.5;">
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
			<table class="table table-bordered">
				<thead>
					<tr>
						<th colspan="2">Product Name: Simethicone (Filix-110)</th>
					</tr>
					<tr>
						<th>Batch No.: {{$manufacture->batchNo}}</th>
						<th>Grade: {{$manufacture->grade}}</th>
					</tr>
					<tr>
						<th>Batch Size:  {{$manufacture->BatchSize}}</th>
						<th>Viscosity: {{$manufacture->Viscosity}}</th>
					</tr>
					<tr>
						<th>Production Commenced on: {{$manufacture->ProductionCommencedon}}</th>
						<th>Production Completed on: {{$manufacture->ProductionCompletedon}}</th>
					</tr>
					<tr>
						<th>Manufacturing Date: {{$manufacture->ManufacturingDate}}</th>
						<th>Retest Date: {{$manufacture->RetestDate}}</th>
					</tr>
				</thead>
			</table>
			<table width="100%" cellpadding="10" cellspacing="0" border="0" style="margin:3rem 0;">
				<tr>
					<td>Prepared by: <span style="display:inline-block;margin-left:2rem;min-width:60%;vertical-align:top;text-align:center;"><span style="display:block;border-bottom:2px solid #000;min-width:100%;margin-bottom:5px;">&nbsp;</span>({{$manufacture->doneby}})</span></td>
					<td>Checked by: <span style="display:inline-block;margin-left:2rem;min-width:60%;vertical-align:top;text-align:center;"><span style="display:block;border-bottom:2px solid #000;margin-left:2rem;min-width:100%;margin-bottom:5px;">&nbsp;</span>({{$manufacture->usercheck}})</span></td>
				</tr>
			</table>
			<div style="margin:1rem 0 3rem;font-weight:400;">This batch has / has not been produced according to instruction given in MFR No. RCIPL/MFR/01/01</div>
			<table width="100%" cellpadding="0" cellspacing="0" border="0" style="font-size:1rem;font-weight:bold;font-family:Georgia, serif;margin:0 1.2rem 1.5rem;line-height:1.5;">
				<thead>
					<tr>
						<th width="40%">Batch No.<br /><br /><br /><br /></th>
						<th valign="top" width="10">:</th>
						<th valign="top">{{$manufacture->batchNo?"Yes":"No"}}</th>
					</tr>
					<tr>
						<th width="40%">The batch is approved / nor approved on<br /><br /><br /><br /></th>
						<th valign="top" width="10">:</th>
						<th valign="top">{{$manufacture->approval?"Yes":"No"}}</th>
					</tr>
					<tr>
						<th width="40%">Reviewed and Approved by<br /><br /><br /><br /></th>
						<th valign="top" width="10">:</th>
						<th valign="top"><span style="display:inline-block;margin-left:2rem;min-width:100px;vertical-align:top;text-align:center;"><span style="display:block;border-bottom:2px solid #000;min-width:100%;margin-bottom:5px;">&nbsp;</span>(Sr.Officer - QA)</span></th>
					</tr>
				</thead>
			</table>
		@endif
		</div>
	</div>
</div>