<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeMaster;

class MaterialForProductionController extends Controller
{
    public function issue_material_for_production()
    {
        return view('admin.issue_material_for_production');
    }
}
