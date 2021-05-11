<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyMaster extends Model
{
    use HasFactory;
    protected $table = 'party_master';
    protected $fillable = [
        "id",
        "company_name",
        "mobileno",
        "address",
        "cp_name",
        "created_at",
        "updated_at",
    ];
}
