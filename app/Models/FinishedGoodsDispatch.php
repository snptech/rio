<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinishedGoodsDispatch extends Model
{

    use HasFactory;
    protected $table = 'finished_goods_dispatch';
    protected $fillable = [
        'id',
        'dispath_no',
        'dispatch_form',
        'dispatch_to',
        'good_dispatch_date',
        'mode_of_dispatch',
        'party_name',
        'product',
        'invoice_no',
        'batch_no',
        'grade',
        'viscosity',
        'mfg_date',
        'expiry_ratest_date',
        'total_no_of_200kg_drums',
        'total_no_of_50kg_drums',
        'total_no_of_30kg_drums',
        'total_no_of_5kg_drums',
        'total_no_qty',
        'seal_no',
        'dispatch_date',
        'remark',
        'dispatch_by',
        'created_at',
        'updated_at',
        'total_no_of_fiber_board_drums'
    ];
}
