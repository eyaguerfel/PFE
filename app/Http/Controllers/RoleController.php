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
        $role->save();
        return 'Role created Successfully ';
    }

    public function delete (Role $role)
    {
        //$role= Role::find($id);
        $role-> delete();
        return 'Role Deleted Successfully';
    }

    public function update (Request $request, $id)
    {
        $role= Role::find($id);
        $role->display_name=$request->display_name;
        $role->description=$request->description;
        $role->save();
        return 'Role updated Successfully ';
    }

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
