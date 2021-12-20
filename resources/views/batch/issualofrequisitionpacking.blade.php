<div id="issualofrequisitionpacking"
                        class="tab-pane fade {{ $sequenceId == '6' ? 'in active show' : '' }}">

                        <table class="table table-hover table-bordered datatable" id="examplereq_packing">
                            <thead>
                                <tr>
                                    <th>Requestion No</th>
                                    <th>Batch No</th>
                                    <th>Date</th>
                                    <th>Requestion Packing Material Name</th>
                                    <th>Requestion Packing Material Qty</th>
                                    <th>Issued Packing Material Qty</th>
                                    <th>Status</th>


                                </tr>
                            </thead>
                            <tbody>

                                @if (isset($requestion_packing) && $requestion_packing)
                                    @foreach ($requestion_packing as $req)
                                        @php$requestion_details_packing = \App\Models\DetailsRequisition::select('detail_packing_material_requisition.*', 'raw_materials.material_name')
                                                ->where('requisition_id', $req->id)
                                                ->join('raw_materials', 'raw_materials.id', 'detail_packing_material_requisition.PackingMaterialName')
                                                ->get();
                                        @endphp
                                        @if ($requestion_details_packing)
                                            @foreach ($requestion_details_packing as $temp)
                                                <tr>
                                                    <td>{{ $req->id }}</td>
                                                    <td>{{ $req->batchNo }}</td>
                                                    <td>{{ $req->created_at ? date('d/m/Y', strtotime($req->created_at)) : '' }}
                                                    </td>
                                                    <td>{{ $temp->material_name }}</td>
                                                    <td>{{ $temp->Quantity }}</td>
                                                    <td>{{ $temp->approved_qty }}</td>
                                                    <td>{!! $temp->approved_qty > 0 ? '<span class="badge badge-success p-2">Approved</span>' : '<span class="badge badge-warning p-2">Pending</span>' !!}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif

                            </tbody>
                        </table>

                    </div>