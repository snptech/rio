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
		@if(isset($packingmateria) && $packingmateria)
		<table width="100%" cellpadding="0" cellspacing="0" border="0" class="heading-tbl">
			<tr>
				<td>
					<table width="100%	" cellpadding="5" cellspacing="0" border="0" style="font-size:1.1rem;font-weight:bold;font-family:Georgia, serif;margin:0 0rem 1rem;line-height:1.2;">
						<tr>
							<td>Packing: <span style="font-weight:400;"></span></td>
							<td width="30%">Date: <span style="font-weight:400;">{{$packingmateria->ManufacturerDate}}</span></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th rowspan="2">Process</th>
					<th rowspan="2">Observation</th>
					<th colspan="2">Time (Hrs)</th>
					<th rowspan="2">Done By</th>
					<th rowspan="2">checked By</th>
				</tr>
				<tr>
					<th>Start</th>
					<th>End</th>
				</tr>
			</thead>
				<tr>
					<td>Area cleanliness checked by Production</td>
					
					<td>{{$packingmateria->Observation}}</td>
					<td>{{$packingmateria->startTime}}</td>
					<td>{{$packingmateria->EndstartTime}}</td>
					<td>{{$packingmateria->doneby}}</td>
					<td>{{$packingmateria->checkby}}</td>
				</tr>
				<tr>
					<td>Temperature ( <sup>o</sup>C) of Filling area</td>
					<td>{{$packingmateria->Temperature}}</td>
					<td>{{$packingmateria->startTime}}</td>
					<td>{{$packingmateria->EndstartTime}}</td>
					<td>{{$packingmateria->doneby}}</td>
					<td>{{$packingmateria->checkby}}</td>
				</tr>
				<tr>
					<td>Humidity (%RH) of Filling area</td>
					<td>{{$packingmateria->Humidity}}</td>
					<td>{{$packingmateria->startTime}}</td>
					<td>{{$packingmateria->EndstartTime}}</td>
					<td>{{$packingmateria->doneby}}</td>
					<td>{{$packingmateria->checkby}}</td>
				</tr>
				<tr>
					<td>Temperature ( <sup>o</sup>C) of Product</td>
					<td>{{$packingmateria->TemperatureP}}</td>
					<td>{{$packingmateria->startTime}}</td>
					<td>{{$packingmateria->EndstartTime}}</td>
					<td>{{$packingmateria->doneby}}</td>
					<td>{{$packingmateria->checkby}}</td>
				</tr>
				<tr>
					@php $fiftykg = "50kgDrums";
					$twentydrums = "20kgDrums";
					@endphp
					<td rowspan="3">No of Drums filled</td>
					<th style="text-align:left;">50 Kg. - {{$packingmateria->$fiftykg}}</th>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<th style="text-align:left;">200 Kg. - {{$packingmateria->$twentydrums}}</th>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<th style="text-align:left;"></th>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<div style="padding:0rem 0 0;text-align:left;text-decoration:underline;font-size:1.4rem;font-weight:bold;color:#313131;">Yield:</div>
			<table width="100%" cellpadding="0" cellspacing="0" border="0" style="font-size:1rem;font-weight:400;font-family:Georgia, serif;margin:1rem 0rem 0rem;line-height:1.7;">
				<tr>
					<td width="50%">RM Input (Kg.)</td>
					<th valign="top">:</th>
					<td valign="top">{{$packingmateria->rmInput}}</td>
				</tr>
				<tr>
					<td>FG Output</td>
					<th valign="top">:</th>
					<td valign="top">{{$packingmateria->fgOutput}}</td>
				</tr>
				<tr>
					<td style="padding-left:15px;">a) Filled in Drums (Kg)</td>
					<th valign="top">:</th>
					<td valign="top">{{$packingmateria->filledDrums}}</td>
				</tr>
				<tr>
					<td style="padding-left:15px;">b) Excess filled in drums</td>
					<th valign="top">:</th>
					<td valign="top">{{$packingmateria->excessFilledDrums}}</td>
				</tr>
				<tr>
					<td style="padding-left:15px;">c) QC Sampling (Kg.)</td>
					<th valign="top">:</th>
					<td valign="top">{{$packingmateria->qcsampling}}</td>
				</tr>
				<tr>
					<td style="padding-left:15px;">d) Stability Sample (Kg.)</td>
					<th valign="top">:</th>
					<td valign="top">{{$packingmateria->StabilitySample}}</td>
				</tr>
				<tr>
					<td style="padding-left:15px;">e) Working Slandered</td>
					<th valign="top">:</th>
					<td valign="top">{{$packingmateria->WorkingSlandered}}</td>
				</tr>
				<tr>
					<td style="padding-left:15px;">f) Validation Sample</td>
					<th valign="top">:</th>
					<td valign="top">{{$packingmateria->ValidationSample}}</td>
				</tr>
				<tr>
					<td style="padding-left:15px;">g) Filled in Jerry can / Drum (Kg.) (Customer Sample)</td>
					<th valign="top">:</th>
					<td valign="top">{{$packingmateria->CustomerSample}}</td>
				</tr>
				<tr>
					<td style="padding-left:15px;">&nbsp;</td>
					<th valign="top">&nbsp;</th>
					<td valign="top">&nbsp;</td>
				</tr>
				<tr>
					<td>Actual Yield [(Output/Input)*100]</td>
					<th valign="top">:</th>
					<td valign="top">{{$packingmateria->ActualYield}}                               (98 - 102%)</td>
				</tr>
				<tr>
					<td>Checked by<br />(Manager - Production)</td>
					<th valign="top">:</th>
					<td valign="top">{{$packingmateria->checkby}}</td>
				</tr>
				<tr>
					<td>Approved by<br />(Sr. Officer - QA)</td>
					<th valign="top">:</th>
					<td valign="top">{{$packingmateria->doneby}}</td>
				</tr>
			</table>
			@endif
			@endif
		</div>
	</div>
</div>