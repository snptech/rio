<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rawmeterial;
class DetailsRequisition extends Model
{
    use HasFactory;
    protected $table = 'detail_packing_material_requisition';
    protected $fillable = [
        "id",
        "PackingMaterialName",
        "Capacity",
        "Quantity",
        "requisition_id",
        "created_at",
        "updated_at",
        "type",
        "approved_qty"
    ];

    public function Requisition()
    {
        return $this->belongsTo(RequisitionSlip::class,"id");
    }

}
