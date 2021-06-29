<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackingMaterialSlip extends Model
{
    use HasFactory;
    protected $table = 'packingmaterial_issual_slip';
    protected $fillable = [
        'id',
        'from',
        'to',
        'batchNo',
        'Date',
        'doneBy',
        'checkedBy',
        'order_id',
        'created_at',
        'updated_at',
    ];
}
