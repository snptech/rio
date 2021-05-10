<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inwardfinishedgoods extends Model
{
    use HasFactory;
    protected $table = 'inward_finished_goods';
    protected $fillable = [
        "id",
        "inward_no" ,
        "inward_date" ,
        "product_name" ,
        "batch_no" ,
        "grade" ,
        "viscosity" ,
        "mfg_date" ,
        "expiry_ratest_date" ,
        "total_no_of_200kg_drums" ,
        "total_no_of_50kg_drums" ,
        "total_no_of_30kg_drums" ,
        "total_no_of_5kg_drums" ,
        "total_no_of_fiber_board_drums" ,
        "total_quantity" ,
        "ar_no" ,
        "approval_data" ,
        "received_by" ,
        "remark" ,
        "created_at",
        "updated_at",
    ];
}
