<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialDetails extends Model
{
    use HasFactory;
    protected $table = 'material_details';
    protected $fillable = [
        'id',
        'PackingMaterialName',
        'Capacity',
        'Quantity',
        'arNo',
        'ARDate',
        'packingmaterial_id',
        'created_at',
        'updated_at',
    ];
}
