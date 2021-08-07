<style type="text/css">
	table td, table th{
		border:1px solid black;
	}
</style>
<div class="container">


	<br/>
	<a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>


	<table>
		<tr>
			<th>No</th>
			<th>Product Name</th>
			<th>Batch No</th>
		</tr>
		@foreach ($batches as $key => $batch)
		<tr>
			<td>{{ ++$key }}</td>
			<td>{{ $batch->proName }}</td>
			<td>{{ $batch->batchNo }}</td>
		</tr>
		@endforeach
	</table>
</div>