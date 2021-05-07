	<div class="form-row" >
				<div class="col-12">
					<h3>Inward Packing  Material Details</h3>
				</div>
				<div class="col-12 table-responsive">
                     <table class="table table-hover table-bordered">
                         <tr>
                             <th>Packing Material From</th>
                             <td>{{ $matarial->goods_going_from }}</td>
                         </tr>
                         <tr>
                            <th>Packing Material To</th>
                            <td>{{ $matarial->goods_going_to }}</td>
                        </tr>
                        <tr>
                            <th>Date of Receipt</th>
                            <td>{{ $matarial->date_of_receipt }}</td>
                        </tr>
                        <tr>
                            <th>Name of Manufacturer</th>
                            <td>{{ $matarial->manufacturer }}</td>
                        </tr>
                        <tr>
                            <th>Name of Supplier</th>
                            <td>{{ $matarial->name }}</td>
                        </tr>
                        <tr>
                            <th>Invoice No.</th>
                            <td>{{ $matarial->invoice_no }}</td>
                        </tr>

                        <tr>
                            <th>Goods Receipt No.</th>
                            <td>{{ $matarial->goods_receipt_no }}</td>
                        </tr>

                        @if(isset($matarial->items))
                        <tr>
                            <th colspan="2">Details of Material Received </th>

                        </tr>



                        <tr>
                            <td colspan="2">
                                <table width="100%">
                                    @foreach ($matarial->items as $val)
                                        @php $matrialname = \App\Models\Rawmeterial::find($val->material); @endphp
                                    <tr>
                                        <td><strong> Material Name</strong> <br>{{ $matrialname->material_name }}  </td>
                                        <td><strong> Total Quantity Received (Nos.)</strong> <br>{{ $val->total_qty }}</td>
                                        <td><strong> AR No. / Date</strong> <br>{{ $val->ar_no_date }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>

                        @endif
                        <tr>
                            <th>Remark</th>
                            <td>{{ $matarial->remark }}</td>
                        </tr>
                        <tr>
                            <th>Submited By</th>
                            <td>{{ $matarial->uname }}</td>
                        </tr>
                        <tr>
                            <th>Submited Time</th>
                            <td>{{ $matarial->created_at }}</td>
                        </tr>
                     </table>
				</div>
			</div>
