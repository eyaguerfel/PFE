<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function allUser(){
        
        $users=User::get();
        return view ('users.users',compact('users'));
    }
   
    public function create (Request $request){
        $user=new User;
        $user->first_name= $request->first_name;
        $user->last_name= $request->last_name;
        //$user->picture= $request->picture;
        $user->email= $request->email;
        $user->password= Hash::make($request->password);


        $user->save();
        return 'User Added Successfully';

    }

    public function delete ($id)
    {
        $user= User::find($id);
        $user-> delete();
        return 'User Deleted Successfully';

    }

    public function update (Request $request, $id)
    {
        $user = User::find($id);
        $user->first_name= $request->first_name;
        $user->last_name= $request->last_name;
        $user->picture= $request->picture;
        $user->email= $request->email;
        $user->update();
        return 'User Updated Successfully';

    }

    public function findById ($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function getAll ()
    {
        $user= User::all();
        return $user;
    }
}
