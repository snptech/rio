<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stock';
    protected $fillable = [
        "id", "matarial_id", "material_type", "department", "qty", "batch_no", "process_batch_id", "ar_no_date", "created_at", "updated_at", "type","used_qty"
    ];

}
