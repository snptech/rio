<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisitionissuedmaterialdetails extends Model
{
    use HasFactory;
    protected $table = 'issue_material_production_requestion_details';
    protected $fillable = [
        "id", "issual_material_id", "material_id", "requesist_qty", "batch_id", "approved_qty", "ar_no_date", "main_details_id","ar_no_date_date"
    ];

    public function DetailsRequisitions()
    {
        return $this->hasMany(DetailsRequisition::class,"requisition_id");
    }
}
