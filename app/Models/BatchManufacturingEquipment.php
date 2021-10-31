<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchManufacturingEquipment extends Model
{
    use HasFactory;
    protected $table = 'batch_manufacturing_records_list_of_equipment';
    protected $fillable = [
        'id',
        'order_id',
        'proName',
        'bmrNo',
        'batchNo',
        "batch_id",
        'refMfrNo',
        'Remark',
        'created_at',
        'updated_at',

    ];
}
