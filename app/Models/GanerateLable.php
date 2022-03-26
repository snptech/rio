<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

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
        'net_wt_50',
        'tare_wt_50',
        'net_wt_200',
        'tare_wt_200',
        'net_wt_30',
        'tare_wt_30',
        'Remark',
        'batch_id',
        'mfg_date',
        'created_at',
        'updated_at',
    ];
    protected static function boot()
    {

        parent::boot();

        static::creating(function ($user) {

        activity('Generate Label')
            ->performedOn($user)
            ->causedBy(auth()->user())
            /*->event('created')*/
            ->withProperties([
                    'user_id'    =>auth()->user()->id,
                    'first_name' => auth()->user()->name,
                    'ip'=>\Request::ip(),
                    "event"=> "Created"
                ])
            ->log('Generate Label Created');
        });

        static::updating(function ($user) {

            activity('Generate Label')
                ->performedOn($user)
                ->causedBy(auth()->user())
                /*->event('updated')*/
                ->withProperties([
                        'user_id'    =>auth()->user()->id,
                        'first_name' => auth()->user()->name,
                        'ip'=>\Request::ip(),
                        "event"=> "updated"
                    ])
                ->log('Generate Label Updated');
            });
        static::deleting(function ($user) {
        activity('Generate Label')
            ->performedOn($user)
            /*->event('deleted')*/
            ->causedBy(auth()->user())
            ->withProperties([
                'user_id'    =>auth()->user()->id,
                'first_name' => auth()->user()->name,
                'ip'=>Request::ip(),
                "event"=> "deleted"
                ])
            ->log('Generate Label Deleted');
        });


    }
}
