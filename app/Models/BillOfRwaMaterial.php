<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillOfRwaMaterial extends Model
{
    use HasFactory;
    protected $table = 'bill_of_raw_material';
    protected $fillable = [
        'id',
        'proName',
        'bmrNo',
        'batchNoI',
        'refMfrNo',
        'doneBy',
        'checkedBy',
        'order_id',
        'is_active',
        'is_delete',
        'created_at',
        'updated_at',
    ];
}
