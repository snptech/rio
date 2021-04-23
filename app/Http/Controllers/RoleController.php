<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
class RoleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //LISTING THE Departments
        $roles = Role::get();

        return view("master.role.index")->with(["roles"=>$roles]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("master.role.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $arrRules = ["role"=>"required|unique:roles,role",
                     "publish"=>"required"];


        $arrMessages = [
        "role"=>"This :attribute field is required.",
        "publish"=>"This :attribute field is required.",
        ];

        $attributes = array();
        foreach ($request->input() as $key => $val)
            $attributes[$key] = ucwords(str_replace("_", " ", $key));

        $validateData = $request->validate($arrRules, $arrMessages,$attributes);


        $data = array();
        $data["role"] = $request->role;
        $data["publish"] = $request->publish;

        $result = Role::create($data);

        if($result->id)
        {
            return redirect("role")->with('message', "Role created successfully");
        }
        else
            return redirect("role")->with('error', "Something went wrong");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if($id)
        {
            $role = Role::where("id",$id)->first();
            return view("master.role.edit")->with(["role"=>$role]);
        }
        else
            redirect(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $arrRules = ["role"=>"required|unique:roles,role,".$id,
                     "publish"=>"required"];


        $arrMessages = [
        "role"=>"This :attribute field is required.",
        "publish"=>"This :attribute field is required.",
        ];

        $attributes = array();
        foreach ($request->input() as $key => $val)
            $attributes[$key] = ucwords(str_replace("_", " ", $key));

        $validateData = $request->validate($arrRules, $arrMessages,$attributes);


        $data = array();
        $data["role"] = $request->role;
        $data["publish"] = $request->publish;
        $roles = Role::find($id);
        $result = $roles->update($data);

        if($result)
        {
            return redirect("role")->with('message', "Role updated successfully");
        }
        else
            return redirect("role")->with('error', "Something went wrong");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $role = Role::findOrFail($id);
        if($role)
        {
            $result = $role->delete();
            if($result)
            {
                return redirect("role")->with('message', "Role deleted successfully");
            }
            else
                return redirect("role")->with('error', "Something went wrong");
            }
    }
}
