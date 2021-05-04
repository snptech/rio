<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InwardFinishedController extends Controller
{
public function new_stock()
{
    return view('admin.new_stock');
}
}
