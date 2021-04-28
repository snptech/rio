<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function annexure_i()
    {
        return view('reports.annexure_i');
    }
    public function annexure_ii()
    {
        return view('reports.annexure_ii');
    }
    public function annexure_iii()
    {
        return view('reports.annexure_iii');
    }
    public function annexure_iv()
    {
        return view('reports.annexure_iv');
    }
    public function packing_annexure()
    {
        return view('reports.packing_annexure');
    }
    public function annexure_vi()
    {
        return view('reports.annexure_vi');
    }

}
