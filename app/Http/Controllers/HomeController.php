<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\InwardMaterial;
use App\Models\Supplier;
use App\Models\Manufacturer;
use App\Models\Rawmeterial;
use App\Models\Rawmaterialitems;
use App\Models\Inwardfinishedgoods;
use App\Models\Stock;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stock = Stock::select(DB::raw("(qty-used_qty) as qty_rem"),"raw_materials.material_name")->join("raw_materials","raw_materials.id","stock.matarial_id")->where("stock.material_type","R")->get();
        return view('home',compact('stock'));
    }
    public function comingsoon()
    {
        return view('comming-soon');
    }
}
