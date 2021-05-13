<div class="form-row">
    <div class="col-12">
        <h3>Dispatch Finished Goods</h3>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-hover table-bordered">
            <tr>
                <th >Date</th>
                <td>{{ date("d/m/Y ",strtotime($dispacth_view->created_at)) }}</td>
            </tr>
            <tr>
                <th >Party Name</th>
                <td>{{$dispacth_view->party_name}}</td>
            </tr>
            <tr>
                <th >Invoice No.</th>
                <td>{{ $dispacth_view->invoice_no }}</td>
            </tr>
            <tr>
                <th >Batch No.</th>
                <td>{{ $dispacth_view->batch_no }}</td>
            </tr>
            <tr>
                <th >Grade</th>
                <td>{{ $dispacth_view->grades_name }}</td>
            </tr>
            <tr>
                <th >Viscosity</th>
                <td>{{ $dispacth_view->viscosity }}</td>
            </tr>
            <tr>
                <th >Total Drums</th>
            </tr>

            <tr>
                <th>50Kg</th>
                <td>{{$dispacth_view->total_no_of_50kg_drums}}</td>
            </tr>
            <tr>
                <th>30Kg</th>
                <td>{{$dispacth_view->total_no_of_30kg_drums}}</td>
            </tr>
            <tr>
                <th>5Kg</th>
                <td>{{$dispacth_view->total_no_of_5kg_drums}}</td>
            </tr>



            <tr>
                <th>Total Quantity (Kg)</th>
                <td>{{$dispacth_view->total_no_qty}}</td>
            </tr>
            <tr>
                <th>Seal No.</th>
                <td>{{$dispacth_view->seal_no}}</td>

            </tr>
            <tr>
                <th>Remark</th>
                <td>{{$dispacth_view->remark}}</td>
            </tr>
            <tr>
                <th>Dispatch By</th>
                <td>{{$dispacth_view->suppliers_name}}</td>
            </tr>

        </table>
    </div>
</div>
