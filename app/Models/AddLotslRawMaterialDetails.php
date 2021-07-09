<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddLotslRawMaterialDetails extends Model
{
    use HasFactory;
    protected $table = 'add_lots_raw_material_detail';
    protected $fillable = [
        'id',
        'EquipmentName',
        'rmbatchno',
        'Quantity',
        'add_lots_id',
        'created_at',
        'updated_at',
    ];
}
