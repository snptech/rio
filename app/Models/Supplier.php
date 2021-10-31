<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $fillable = [
        "id", "name", "city", "state", "address", "contact_no", "gst_no", "pan_no", "contact_per_name", "company_name", "publish"
    ];
}
