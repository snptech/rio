<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issuematerialproduction extends Model
{
    use HasFactory;
    protected $table = 'issue_material_production';
    protected $fillable = [
        'id',
        'requisition_no',
        'batch_quantity',
        'material',
        'opening_bal',
        'batch_no',
        'viscosity',
        'issual_date',
        'issued_quantity',
        'finished_batch_no',
        'excess',
        'wastage',
        'returned_from_day_store',
        'closing_balance_qty',
        'dispensed_by',
        'remark',
        'created_at',
        'updated_at',
    ];
}
