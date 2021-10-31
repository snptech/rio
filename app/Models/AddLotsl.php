<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddLotsl extends Model
{
    use HasFactory;
    protected $table = 'add_lotsl';
    protected $fillable = [
        'id',
        'order_id',
        'proName',
        'bmrNo',
        'batchNo',
        'refMfrNo',
        'Date',
        'lotNo',
        'ReactorNo',
        'batch_id',
        'Process_date',
        "homogenize_done",
        "homogenize_date",
        'created_at',
        'updated_at',
    ];

}
