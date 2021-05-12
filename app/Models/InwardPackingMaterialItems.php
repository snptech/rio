<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InwardPackingMaterialItems extends Model
{
    use HasFactory;
    protected $table = 'goods_receipt_note_items';
    protected $fillable = ["id", "good_receipt_id", "material", "total_qty", "ar_no_date"];

}
