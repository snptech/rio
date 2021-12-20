<div id="issualofrequisition" class="tab-pane fade {{ $sequenceId == '3' ? 'in active show' : '' }}">
    <input type="hidden" value="3" name="sequenceId">


    <table class="table table-hover table-bordered datatable" id="examplereq">
        <thead>
            <tr>
                <th>Requestion No</th>
                <th>Batch No</th>
                <th>Date</th>

                <th>Requestion Raw Material Name</th>
                <th>Requestion Raw Material Qty</th>
                <th>Issued Raw Material Qty</th>
                <th>Status</th>


            </tr>
        </thead>
        <tbody>

            @if ($requestion)
                @foreach ($requestion as $req)
                    @php$requestion_details = \App\Models\DetailsRequisition::select('detail_packing_material_requisition.*', 'raw_materials.material_name')
                            ->where('requisition_id', $req->id)
                            ->join('raw_materials', 'raw_materials.id', 'detail_packing_material_requisition.PackingMaterialName')
                            ->orderBy('id', 'desc')
                            ->get();
                    @endphp
                    @if (isset($requestion_details) && $requestion_details)
                        @foreach ($requestion_details as $temp)
                            <tr>
                                <td>{{ $req->id }}</td>
                                <td>{{ $req->batchNo }}</td>
                                <td>{{ $req->created_at ? date('d/m/Y', strtotime($req->created_at)) : '' }}
                                </td>
                                <td>{{ $temp->material_name }}</td>
                                <td>{{ $temp->Quantity }}</td>
                                <td>{{ $temp->approved_qty }}</td>
                                <td>{!! $temp->approved_qty ? '<span class="badge badge-success p-2">Approved</span>' : '<span class="badge badge-warning p-2">Pending</span>' !!}</td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            @endif

        </tbody>
    </table>



</div>