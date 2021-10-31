<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GanerateLable extends Model
{
    use HasFactory;
    protected $table = 'generate_label';
    protected $fillable = [
        'id',
        'simethicone',
        'batch_no_I',
        'mfg_date',
        'retest_date',
        'net_wt',
        'tare_wt',
        'Remark',
        'batch_id',
        'mfg_date',
        'created_at',
        'updated_at',
    ];
}
