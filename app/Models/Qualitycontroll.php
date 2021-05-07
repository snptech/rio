<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualitycontroll extends Model
{
    use HasFactory;
    protected $table = 'quality_controll_check';
    protected $fillable = [
        'id',
        'quantity_approved',
        'quantity_rejected',
        'quantity_status',
        'date_of_approval',
        'remark',
        'created_at',
        'updated_at',
    ];
}
