<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailsRequisition;

class Rawmeterial extends Model
{
    use HasFactory;
    protected $table = 'raw_materials';
    protected $fillable = [
        "id",
        "material_name",
        "material_mesurment",
        "material_stock",
        "material_preorder_stock",
        "expiry_date",
        "rio_expiry_date",
        "man_date",
        "material_type",
        "capacity",

    ];
}
