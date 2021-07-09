<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homogenizing extends Model
{
    use HasFactory;
    protected $table = 'homogenizing';
    protected $fillable = [
        'id',
        'order_id',
        'proName',
        'bmrNo',
        'batchNo',
        'refMfrNo',
        'homoTank',
        'Observedvalue',
        'created_at',
        'updated_at',
    ];
}
