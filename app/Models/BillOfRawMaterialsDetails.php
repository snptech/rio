<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillOfRawMaterialsDetails extends Model
{
    use HasFactory;
    protected $table = 'bill_of_raw_material_details';
    protected $fillable = [
        'id',
        'rawMaterialName',
        'batchNo',
        'Quantity',
        'arNo',
        'date',
        'bill_of_raw_material_id',
        'created_at',
        'updated_at',
    ];
}
