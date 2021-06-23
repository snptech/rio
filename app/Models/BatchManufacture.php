<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchManufacture extends Model
{
    use HasFactory;
    protected $table = 'add_batch_manufacture';
    protected $fillable = [
        'id',
        'proName',
        'bmrNo',
        'batchNo',
        'refMfrNo',
        'grade',
        'BatchSize',
        'Viscosity',
        'ProductionCommencedon',
        'ProductionCompletedon',
        'ManufacturingDate',
        'RetestDate',
        'doneBy',
        'checkedBy',
        'inlineRadioOptions',
        'approval',
        'approvalDate',
        'checkedByI',
        'is_active',
        'is_delete',
        'created_at',
        'updated_at',
    ];
}
