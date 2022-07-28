<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function allRole(){
        
        $roles=Role::get();
        return view ('Roles.listrole',compact('roles'));
    }

    public function create(){
        return view ('Roles.createrole');
    }

    public function store (Request $request)
    {
        //return $request;
        $role= new Role();
        $role->display_name=$request->display_name;
        $role->description=$request->description;

        $validator = \Validator::make ($request->all(), 
        [
            'display_name' => 'required',
            'description' =>'required',
        ],
        [
            'display_name' => 'Name is required',
            'description' =>'description is required',
        ]);
        if ($validator->fails()) {
            $obj = $validator->errors();
            $array = $obj->toArray();
            return back()->with('exception',$array);
        }
        $role->save();
        if ($role)
        return back()->with('success','Role created successfully!');
    else
        return back()->with('error','Faild!');    }

    public function delete (Role $role)
    {
        //$role= Role::find($id);
        $role-> delete();
        if ($role)
        return back()->with('success','Role deleted successfully!');
    else
        return back()->with('error','Failed!');    }

    public function update (Request $request, $id)
    {
        $role= Role::find($id);
        $role->display_name=$request->display_name;
        $role->description=$request->description;
        $role->save();
        if ($role)
        return back()->with('success','Role updated successfully!');
    else
        return back()->with('error','Failed!');    }

    public function findById ($id)
    {
        $role = Role::find($id);
        return $role;
    }

    public function getAll ()
    {
        $role= Role::all();
        return $role;
    }
}
