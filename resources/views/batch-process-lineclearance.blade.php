<div class="container-scroller">

    <div class="container-fluid p-3">
      <!-- Main Container -->
    <div style="display:block;padding:20px;border:2px solid #000;min-height:11.7in;">
		<table width="100%" cellpadding="10" cellspacing="0" border="0">
			<tr>
				<td width="80"><img src="{{asset('pdf/assets/img/print_logo.png')}}" style="width:80px;height:auto;"></td>
				<td style="text-align:center;"><h2 style="font-family: serif;font-size: 2rem;">RioCare India Private Limited</h2><p style="font-family: serif;font-size:1rem;font-weight:bold;">Plot R-940,TTC Industrial Area,MIDC Rabale,Navi Mumbai-400701,District Thane,Maharashtra ,INDIA.</p></td>
				<td width="80">&nbsp;</td>
			</tr>
		</table>
		<div style="padding:1rem 0;text-align:center;text-decoration:underline;font-size:1.4rem;font-weight:bold;color:#313131;">Batch Manufacturing Record</div>
		@if(isset($manufacture) && $manufacture)
			<table width="100%" cellpadding="10" cellspacing="0" border="0" class="heading-tbl">
				<tr>
					<td>
						<table width="auto" cellpadding="5" cellspacing="0" border="0" style="font-size:1.1rem;font-weight:bold;font-family: serif;margin:0 1.2rem 0rem;line-height:1.2;">
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
						<table width="auto" cellpadding="5" cellspacing="0" border="0" style="font-size:1.1rem;font-weight:bold;font-family: serif;margin:0 1.2rem 0rem;line-height:1.2;">
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
			<div style="padding:1rem 0;text-align:left;text-decoration:underline;font-size:1.2rem;font-weight:bold;color:#616161;">Equipment Status:</div>
			<table class="table table-bordered td-bold">
				<thead>
					<tr>
						<th rowspan="2">S. No.</th>
						<th rowspan="2">Particular</th>
						<th rowspan="2">Batch No.</th>
						<th rowspan="2">Date</th>
						<th colspan="2">Signature</th>
					</tr>
					<tr>
						<th>PR</th>
						<th>QA</th>
					</tr>
				</thead>
					<tr>
						<td>1</td>
						<td>Last batch produced</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td rowspan="3">2</td>
						<td colspan="5">Reactor cleaned on - <i>(Cleaning Frequency - Once in 3 months)</i></td>
					</tr>
					<tr>
						<td>PR/RC/001</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>PR/RC/001</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td rowspan="2">3</td>
						<td colspan="5">Homogenizing tank cleaned on - <i>(Cleaning Frequency - Once in 3 months)</i></td>
					</tr>
					<tr>
						<td>PR/BT/</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td rowspan="2">4</td>
						<td colspan="5">Mesh sieve from reactor to blending tank cleaned & integrity checked on - <i>(Cleaning Frequency - Daily)</i></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td rowspan="2">5</td>
						<td colspan="5">Mesh sieve from blending tank to filling station cleaned & integrity checked on - <i>(Cleaning Frequency - Daily)</i></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
			</table>
			<div style="padding:1rem 0;text-align:left;text-decoration:underline;font-size:1.2rem;font-weight:bold;color:#616161;">Line Clearance Records:</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>S. No.</th>
						<th>Particulars</th>
						<th>Observation</th>
						<th>Time (Hrs)</th>
						<th>Signature</th>
					</tr>
				</thead>
					<tr>
						<td>1</td>
						<td>Area Cleanliness Checked</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Temperature (<sup>0<sup>C)</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Humidity (%RH)</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</table>
			</div>
		@endif
	</div>
</div>
