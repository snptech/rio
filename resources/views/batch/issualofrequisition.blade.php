<div id="issualofrequisition" class="tab-pane fade {{ $sequenceId == '3' ? 'in active show' : '' }}">
    <input type="hidden" value="3" name="sequenceId">


    <table class="table table-hover table-bordered datatable" id="examplereq">
        <thead>
            <tr>
                <th>Requestion No</th>
                <th>Process Batch No</th>
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
                    @php $requestion_details = \App\Models\DetailsRequisition::select('detail_packing_material_requisition.*', 'raw_materials.material_name',"inward_raw_materials_items.batch_no")
                            ->where('requisition_id', $req->id)
                            ->join('raw_materials', 'raw_materials.id', 'detail_packing_material_requisition.PackingMaterialName')
                            ->join('issue_material_production_requestion_details', 'issue_material_production_requestion_details.main_details_id', 'detail_packing_material_requisition.requisition_id')
                            ->join('inward_raw_materials_items', 'inward_raw_materials_items.id', 'issue_material_production_requestion_details.batch_id')
                            ->orderBy('id', 'desc')
                            ->get();
                    @endphp
                    @if (isset($requestion_details) && $requestion_details)
                        @foreach ($requestion_details as $temp)
                            <tr>
                                <td>{{ $req->id }}</td>
                                <td>{{ $temp->batch_no }}</td>
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