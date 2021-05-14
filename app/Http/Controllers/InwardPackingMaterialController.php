<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InwardPackingMaterial;
use App\Models\InwardPackingMaterialItems;
use App\Models\Department;
use App\Models\Supplier;
use App\Models\Manufacturer;
use App\Models\Rawmeterial;
use Auth;
use DB;
class InwardPackingMaterialController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');


    }
    public function index(){

        $rawmaterial = Rawmeterial::pluck("material_name","id");

        $supplier  = Supplier::where("publish",1)->pluck("name","id");
        $manufacturer = Manufacturer::where("publish",1)->pluck("manufacturer","id");
        return view('inwardpackingmatrial.inward_packing_material')->with(["rawmaterial"=>$rawmaterial,"supplier"=>$supplier,"manufacturer"=>$manufacturer]);
    }
    public function add()
    {
        $rawmaterial = Rawmeterial::where("material_type","P")->pluck("material_name","id");
        $department = Department::pluck("department","id");
        $supplier  = Supplier::where("publish",1)->pluck("name","id");
        $manufacturer = Manufacturer::where("publish",1)->pluck("manufacturer","id");
        return view("inwardpackingmatrial.add_inward_packing_material")->with(["rawmaterial"=>$rawmaterial,"supplier"=>$supplier,"manufacturer"=>$manufacturer,"department"=>$department]);
    }
    public function listAjax(Request $request)
    {

        $listquery = "";

        $listquery = InwardPackingMaterialItems::select("goods_receipt_notes.*","goods_receipt_note_items.*",
        "suppliers.name","manufacturers.manufacturer","users.name as uname","department.department as goods_going_from_name","detpto.department as goods_going_to_name","raw_materials.material_name","goods_receipt_note_items.id as itemid","goods_receipt_notes.id as id")
                    ->join("goods_receipt_notes","goods_receipt_notes.id","goods_receipt_note_items.good_receipt_id")
                     ->join("suppliers","suppliers.id","goods_receipt_notes.supplier")
                     ->join("manufacturers","manufacturers.id","goods_receipt_notes.manufacurer")
                     ->join("raw_materials","raw_materials.id","goods_receipt_note_items.material")
                     ->leftJoin("users","users.id","goods_receipt_notes.created_by")
                     ->join("department", "department.id", "=", "goods_receipt_notes.goods_going_from")
                     ->join("department as detpto", "detpto.id", "=", "goods_receipt_notes.goods_going_to");

        $totalData = $listquery->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = isset($columns[$request->input('order.0.column')])?$columns[$request->input('order.0.column')]:"goods_receipt_notes.updated_at";
        $dir = $request->input('order.0.dir');

        if($order == "id")
        {
            $dir = "desc";
        }

        ## Custom Field value
        $rcdate =  $request->input('rcdate');
        $ReceiptNo = $request->input('ReceiptNo');
        $manufacturer = $request->input('manufacturer');
        $supplier = $request->input('supplier');
        $invoiceNo = $request->input('invoiceNo');




        if ($rcdate) {
            $listquery->where('goods_receipt_notes.date_of_receipt', '=', strtotime($rcdate));
        }
        if ($ReceiptNo) {

                $listquery->where('goods_receipt_notes.goods_receipt_no', 'like', "%{$ReceiptNo}%");
        }
        if ($manufacturer) {
            $listquery->where("goods_receipt_notes.manufacurer", '=', "{$manufacturer}");
        }
        if ($supplier) {
            $listquery->where("goods_receipt_notes.supplier", '=', "{$supplier}");
        }
        if ($invoiceNo) {
            $listquery->where('goods_receipt_notes.invoice_no', 'like', "%{$invoiceNo}%");
        }

        if(!empty($request->input('search.value')))
        {
                $search = $request->input('search.value');
                $listquery->orWhere('goods_receipt_notes.goods_going_from', 'like', "%{$search}%")
                ->orWhere('goods_receipt_notes.goods_going_to', 'like', "%{$search}%")
                ->orWhere('goods_receipt_notes.date_of_receipt', '=', "{strtotime($search)}")
                ->orWhere('goods_receipt_notes.invoice_no', 'like', "%{$search}%")
                ->orWhere('goods_receipt_notes.goods_receipt_no', 'like', "%{$search}%");




        }

        $totalFiltered = $listquery->count();
        $listquery->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir);

        $data = $listquery->get();






        $datas = array();
        if (!empty($data)) {
            $i=$request->input('start')+1;
            $type = "";

            foreach ($data as $post) {

                //$show =  route('inwardpackingrawmaterial-view', ["id"=>$post->id]);
                $delete =  route('inwardpackingrawmaterial-remove', ["id"=>$post->id]);
                $edit =  route('inwardpackingrawmaterial-edit', ["id"=>$post->id]);


                $nestedData['id'] = $i;
                $nestedData["from"] = $post->goods_going_from_name;
                $nestedData["to"] = $post->goods_going_to_name;
                $nestedData['date_of_receipt'] = $post->date_of_receipt?date("d/m/Y",$post->date_of_receipt):"";
                $nestedData['material_name'] = $post->material_name;
                $nestedData['manufacturer'] = $post->manufacturer;
                $nestedData['supplier'] = $post->name;
                $nestedData['invoice_no'] = $post->invoice_no;
                $nestedData['qty'] = $post->total_qty;
                $nestedData['goods_receipt_no'] = $post->goods_receipt_no;
                $nestedData["submited_by"] = $post->uname;
                $nestedData['action'] = '<div class="actions"><a href="#" class="btn action-btn" data-toggle="modal" data-target="#viewsupplier" title="View" onclick="viewrawmatrial('.$post->itemid.')"><i data-feather="eye"></i></a><a href="'.$edit.'" class="btn action-btn" data-toggle="tooltip" title="Edit"><i data-feather="edit-3"></i></a></div>';

                $datas[] = $nestedData;

                $i++;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $datas
        );

        echo json_encode($json_data);
    }
    public function store(Request $request)
    {

        $arrRules = ["received_from"=>"required",
                     "received_to"=>"required",
                     "date_of_receipt"=>"required",
                     "manufacturer"=>"required",
                     "supplier"=>"required",
                     "invoice_no"=>"required",
                     "goods_receipt_no"=>"required",
                     "material"=>"required|array",
                     "total_qty"=>"required|array",

                    ];


        $arrMessages = [
            "received_from"=>"This :attribute field is required.",
            "received_to"=>"This :attribute field is required.",
            "date_of_receipt"=>"This :attribute field is required.",
            "manufacturer"=>"This :attribute field is required.",
            "supplier"=>"This :attribute field is required.",
            "invoice_no"=>"This :attribute field is required.",
            "goods_receipt_no"=>"This :attribute field is required.",
            "material"=>"This :attribute field is required.",
            "total_qty"=>"This :attribute field is required.",
            "ar_no_date"=>"This :attribute field is required.",

        ];

        $attributes = array();
        foreach ($request->input() as $key => $val)
            $attributes[$key] = ucwords(str_replace("_", " ", $key));

        $validateData = $request->validate($arrRules, $arrMessages,$attributes);

        $data = array();
        $data["goods_going_from"]=$request->received_from;
        $data["goods_going_to"]=$request->received_to;
        $data["date_of_receipt"]=$request->date_of_receipt?strtotime($request->date_of_receipt):"";

        $data["manufacurer"]=$request->manufacturer;
        $data["supplier"]=$request->supplier;
        $data["invoice_no"]=$request->invoice_no;
        $data["goods_receipt_no"]=$request->goods_receipt_no;
        $data["created_by"]=Auth::user()->id;
        $data["remark"]= $request->remark?$request->remark:"";

        $result = InwardPackingMaterial::create($data);

        if($result->id)
        {
            if($request->material)
            {
                $i=0;
                foreach($request->material as $key=>$value)
                {
                    $datas = array();
                    $datas["good_receipt_id"] = $result->id;
                    $datas["material"] = $value;
                    $datas["total_qty"] = $request->total_qty[$i];
                    $datas["ar_no_date"] = $request->ar_no_date[$i];
                    $result = InwardPackingMaterialItems::create($datas);

                    $stock = Rawmeterial::find($value);
                    $datas["material_stock"] = ($stock->material_stock+$request->total_qty[$i]);

                    $stock->update($datas);
                    $i++;
                }


                    return redirect(route("inwardpackingrawmaterial-list"))->with('message', "Inward packing rawmaterial created successfully");


            }
        }
        else
            return redirect(route("inwardpackingrawmaterial-list"))->with('error', "Something went wrong");


    }
    public function edit($id)
    {
        if($id)
        {
            $rawmaterial = Rawmeterial::where("material_type","P")->pluck("material_name","id");
            $department = Department::pluck("department","id");
            $supplier  = Supplier::where("publish",1)->pluck("name","id");
            $manufacturer = Manufacturer::where("publish",1)->pluck("manufacturer","id");
            $packingrawmaterial = InwardPackingMaterial::find($id);


            return view("inwardpackingmatrial.edit_inward_packing_material")->with(["rawmaterial"=>$rawmaterial,"supplier"=>$supplier,"manufacturer"=>$manufacturer,"packingrawmaterial"=>$packingrawmaterial,"department"=>$department]);
        }
        else
            redirect(404);
    }
    public function update(Request $request,$id)
    {
        if($id)
        {
            $arrRules = ["received_from"=>"required",
                        "received_to"=>"required",
                        "date_of_receipt"=>"required",
                        "manufacturer"=>"required",
                        "supplier"=>"required",
                        "invoice_no"=>"required",
                        "goods_receipt_no"=>"required",
                        "material"=>"required|array",
                        "total_qty"=>"required|array",

                        ];


            $arrMessages = [
                "received_from"=>"This :attribute field is required.",
                "received_to"=>"This :attribute field is required.",
                "date_of_receipt"=>"This :attribute field is required.",
                "manufacturer"=>"This :attribute field is required.",
                "supplier"=>"This :attribute field is required.",
                "invoice_no"=>"This :attribute field is required.",
                "goods_receipt_no"=>"This :attribute field is required.",
                "material"=>"This :attribute field is required.",
                "total_qty"=>"This :attribute field is required.",
                "ar_no_date"=>"This :attribute field is required.",

            ];

            $attributes = array();
            foreach ($request->input() as $key => $val)
                $attributes[$key] = ucwords(str_replace("_", " ", $key));

            $validateData = $request->validate($arrRules, $arrMessages,$attributes);

            $data = array();
            $data["goods_going_from"]=$request->received_from;
            $data["goods_going_to"]=$request->received_to;
            $data["date_of_receipt"]=$request->date_of_receipt?strtotime($request->date_of_receipt):"";

            $data["manufacurer"]=$request->manufacturer;
            $data["supplier"]=$request->supplier;
            $data["invoice_no"]=$request->invoice_no;
            $data["goods_receipt_no"]=$request->goods_receipt_no;
            $data["created_by"]=Auth::user()->id;
            $data["remark"]= $request->remark?$request->remark:"";
            $InwardPackingMaterial = InwardPackingMaterial::find($id);
            $result = $InwardPackingMaterial->update($data);

            if($result)
            {
                if($request->material)
                {
                    $olddata = InwardPackingMaterialItems::where("good_receipt_id",$id)->get();
                    if(isset($olddata) && count($olddata) >0)
                    {
                        foreach($olddata as $val)
                        {
                            $res = InwardPackingMaterialItems::find($val->id);
                            $res->delete();
                        }
                    }
                    $i=0;
                    foreach($request->material as $key=>$value)
                    {
                        $datas = array();
                        $datas["good_receipt_id"] = $id;
                        $datas["material"] = $value;
                        $datas["total_qty"] = $request->total_qty[$i];
                        $datas["ar_no_date"] = $request->ar_no_date[$i];
                        $result = InwardPackingMaterialItems::create($datas);
                        $i++;
                    }


                        return redirect("inwardpackingrawmaterial/list")->with('update', "Inward packing rawmaterial updated successfully");


                }
            }
            else
                return redirect("inwardpackingrawmaterial/list")->with('error', "Something went wrong");
        }
        else
            redirect(404);


    }
    public function view(Request $request)
    {
        if($request->id)
        {
            $InwardPackingMaterial =  InwardPackingMaterialItems::select("goods_receipt_notes.*","goods_receipt_note_items.*",
            "suppliers.name","manufacturers.manufacturer","users.name as uname","department.department as goods_going_from_name","detpto.department as goods_going_to_name","raw_materials.material_name","goods_receipt_note_items.id as itemid","goods_receipt_notes.id as id")
                        ->join("goods_receipt_notes","goods_receipt_notes.id","goods_receipt_note_items.good_receipt_id")
                         ->join("suppliers","suppliers.id","goods_receipt_notes.supplier")
                         ->join("manufacturers","manufacturers.id","goods_receipt_notes.manufacurer")
                         ->join("raw_materials","raw_materials.id","goods_receipt_note_items.material")
                         ->leftJoin("users","users.id","goods_receipt_notes.created_by")
                         ->join("department", "department.id", "=", "goods_receipt_notes.goods_going_from")
                         ->join("department as detpto", "detpto.id", "=", "goods_receipt_notes.goods_going_to")
                         ->where("goods_receipt_note_items.id",$request->id)->first();

             $view = view('inwardpackingmatrial.view', ['matarial'=> $InwardPackingMaterial])->render();
             return response()->json(['html'=>$view]);

        }
        else
        {
            redirect(404);
        }
    }
    public function remove(Request $request,$id)
    {
        if($id)
        {
            $material = InwardPackingMaterial::find($id);
            if($material)
            {
                $items = InwardPackingMaterialItems::where("good_receipt_id",$id)->get();
                if(isset($items))
                {
                    DB::table('goods_receipt_note_items')->where('good_receipt_id', $id)->delete();
                }

                $material->delete();
                return redirect("inwardpackingrawmaterial/list")->with('message', "Inward packing rawmaterial deleted successfully");
            }
        }
        else{
            redirect(404);
        }
    }

}
