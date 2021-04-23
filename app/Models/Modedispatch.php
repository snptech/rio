<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modedispatch extends Model
{
    use HasFactory;
    protected $table = 'mode_of_dispatch';
    protected $fillable = [
        'mode',
        'publish',
        'id',
    ];
}
