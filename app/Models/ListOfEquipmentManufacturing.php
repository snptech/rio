<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListOfEquipmentManufacturing extends Model
{
    use HasFactory;
    protected $table = 'list_of_equipment_in_manufacturin_process';
    protected $fillable = [
        'id',
        'batch_manufacturing_id',
        'EquipmentName',
        'EquipmentCode',
        'created_at',
        'updated_at',
    ];
}
