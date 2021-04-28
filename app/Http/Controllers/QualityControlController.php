<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QualityControlController extends Controller
{
    public function quality_control()
    {
        return view('admin.quality_control');

    }
}
