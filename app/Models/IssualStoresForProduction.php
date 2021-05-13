<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssualStoresForProduction extends Model
{
    use HasFactory;
    protected $table = 'issual_by_stores_for_production';
    protected $fillable = [
        "id",
        "requisition_no	",
        "opening_balance",
        "issual_date",
        "product_name",
        "batch_no",
        "quantity",
        "for_fg_batch_no",
        "returned_from_day_store",
        "dispensed_by",
        "remark",
        "created_at ",
        "updated_at",
    ];
}
