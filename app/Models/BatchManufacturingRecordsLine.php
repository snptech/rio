<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchManufacturingRecordsLine extends Model
{
    use HasFactory;
    protected $table = 'batch_manufacturing_records_line_clearance_record';
    protected $fillable = [
        "id",
        "order_id",
        "proName",
        "bmrNo",
        "batchNo",
        "refMfrNo",
        "Date",
        "created_at ",
        "updated_at",
    ];
}
