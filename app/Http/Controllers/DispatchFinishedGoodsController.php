<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispatchFinishedGoodsController extends Controller
{
    public function dispatch_finished_goods()
    {
        return view('admin.dispatch_finished_goods');
    }

    public function add_dispatch_finished_goods()
    {
        return view('admin.add_dispatch_finished_goods');
    }
}
