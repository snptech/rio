<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InwardMaterial extends Model
{
    use HasFactory;
    protected $table = 'inward_raw_materials';
    protected $fillable = [
        "id",
        "inward_no",
        "received_from",
        "received_to",
        "date_of_receipt",
        "material",
        "manufacturer",
        "supplier",
        "supplier_address",
        "supplier_gst", "invoice_no",
        "goods_receipt_no",
        "created_by",
        "remark"
    ];
}
