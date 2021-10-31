<div class="form-row" >
    
				<div class="col-12">
					<h3>ssual by stores for production  Details</h3>
				</div>
				<div class="col-12 table-responsive">
                     <table class="table table-hover table-bordered">
                         <tr>
                             <th>Requisition No</th>
                             <td>{{ $IssualStores->requisition_no }}</td>
                         </tr>
                         <tr>
                            <th>Opening Balance</th>
                            <td>{{ $IssualStores->opening_balance }}</td>
                        </tr>
                        <tr>
                            <th>Issual Date</th>
                            <td>{{ $IssualStores->issual_date }}</td>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <td>{{ $IssualStores->material_name }}</td>
                        </tr>
                        <tr>
                            <th>Batch No</th>
                            <td>{{ $IssualStores->batch_no }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{ $IssualStores->quantity }}</td>
                        </tr>

                        <tr>
                            <th>For FG Batch No</th>
                            <td>{{ $IssualStores->for_fg_batch_no }}</td>
                        </tr>
                        <tr>
                            <th>Returned From Day Sstorer</th>
                            <td>{{ $IssualStores->returned_from_day_store }}</td>
                        </tr>
                        <tr>
                            <th>Dispensed by</th>
                            <td>{{ $IssualStores->dispensed_by }}</td>
                        </tr>
                        <tr>
                            <th>Remark</th>
                            <td>{{ $IssualStores->remark }}</td>
                        </tr>
                     </table>
				</div>
			</div>
