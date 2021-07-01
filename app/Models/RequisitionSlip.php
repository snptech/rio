<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionSlip extends Model
{
    use HasFactory;
    protected $table = 'packing_material_requisition_slip';
    protected $fillable = [
        "id",
        "order_id",
        "from",
        "to",
        "batchNo",
        "batch_id",
        "Date",
        "checkedBy",
        "ApprovedBy",
        "Remark",
        "created_at",
        "updated_at",
        "type"
    ];

    public function DetailsRequisitions()
    {
        return $this->hasMany(DetailsRequisition::class,"requisition_id");
    }
}
