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
        'ManufacturerDate',
        'Observation',
        'Temperature',
        'Humidity',
        'TemperatureP',
        '50kgDrums',
        '20kgDrums',
        'startTime',
        'EndstartTime',
        'areaCleanliness',
        'CareaCleanliness',
        'rmInput',
        'fgOutput',
        'filledDrums',
        'excessFilledDrums',
        'qcsampling',
        'StabilitySample',
        'WorkingSlandered',
        'ValidationSample',
        'CustomerSample',
        'ActualYield',
        'checkedBy',
        'ApprovedBy',
        'Remark',
        'created_at',
        'updated_at',
    ];
}
