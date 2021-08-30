<!DOCTYPE html>
<html lang="en" style="background: #ffffff;font-size:16px;">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RIO Care India PVT LTD :: Inventory and Stock Management</title>
  <link rel="stylesheet" href="{{asset('pdf/assets/mdbootstrap4/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('pdf/assets/mdbootstrap4/mdb.min.css')}}">
  <link rel="stylesheet" href="{{asset('pdf/assets/mdbootstrap4/mdb-plugins-gathered.min.css')}}">
 
  
  <link rel="stylesheet" href="{{asset('pdf/assets/css/style.css')}}">
  <!-- end inject -->  
  <style>
	table td,table th {
		font-size: 1rem;
		font-weight: 600;
	}
	.heading-tbl td {
		font-size: 1.1rem;
		font-weight: 800;
	}
	@media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}
  </style>
</head>
<body style="background: #ffffff;font-size:16px;font-weight:bold;font-family:Georgia, serif;">
	
	@include("batch-process1")
	<div class="pagebreak"> </div>
	@include("batch-process-instruction")
	<div class="pagebreak"> </div>
	@include("batch-process-rawmaterial")
	<div class="pagebreak"> </div>
	@include("batch-process-packingmaterial")
	<div class="pagebreak"></div>
	@include("batch-process-listequipment")
	<div class="pagebreak"></div>
	@include("batch-process-lineclearance")
	<div class="pagebreak"></div>
	@if(isset($lotsdetails) && $lotsdetails)
	 @php $l =0; @endphp
	 @foreach($lotsdetails as $lot)
	 
		@include("batch-process-lots",array("lot"=>$lot,"process"=>$process[$l],"rawmaterial"=>$lotsrawmaterials[$l]))
		<div class="pagebreak"></div>
		@php $l++; @endphp
	 @endforeach
	@endif
	{{--<div class="pagebreak"></div>
	@include("batch-process-lots1")
	<div class="pagebreak"></div>
	@include("batch-process-lots2")
	<div class="pagebreak"></div>--}}
	@if(isset($Homogenizing) && $Homogenizing)
	 @php $l =0; @endphp
	 @foreach($Homogenizing as $hom)
	 
		@include("batch-process-homogenizing",array("homo"=>$hom,"homolist"=>$homoList[$hom->id]))
		<div class="pagebreak"></div>
		@php $l++; @endphp
	 @endforeach
	@endif
	
	<div class="pagebreak"></div>
	@include("batch-process-packing")
	<div class="pagebreak"></div>
	
	@include("batch-process-label")
</body>
