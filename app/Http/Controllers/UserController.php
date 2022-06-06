<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public static function get_connected_user()
        {
            $user = Auth::user();
            $id = Auth::id();
            $user= User::find($id);
            return $user;
        }

    //VIEW
    public function allUser(){
        
        $users=User::get();
        foreach($users as $user)
        {
            $role=Role::find($user->role_id);
            if (isset($role))
                $user->role=$role->display_name;  
            else
                $user->role="";
        }
        return view ('users.users',compact('users'));
    }

    public function create (){
        /* $user=new User;
         $user->first_name= $request->first_name;
         $user->last_name= $request->last_name;
         //$user->picture= $request->picture;
         $user->email= $request->email;
         $user->password= Hash::make($request->password);
         $user->save();*/
 
         $role=Role::all();
         return View('users.createuser')->with ('role',$role);
 
     }

     public function edit(User $user){
        $role=Role::all();
        return View('users.updateuser',compact('user','role'));}
    //METHOD
   
    
    public function store (Request $request){
        //return $request;
        $user=new User();
        $user->first_name= $request->input('first_name');
        $user->last_name= $request->input('last_name');
        if($request->file('picture')){
            $file= $request->file('picture');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/user'), $filename);
           // $data['picture']= $filename;
            $user->picture=$filename;
        }
        $user->email= $request->input('email');
        $user->password= Hash::make($request->input('password'));
        $user->save();
        return 'user created';
    }

    public function delete (User $user)
    {
       // $user= User::find($id);
        $user->delete();
        return 'User Deleted Successfully';

    }

    public function update (Request $request, User $user)
    {
        //return $user->id;
        $user = User::find($user->id);
        $user->first_name= $request->first_name;
        $user->last_name= $request->last_name;
        $user->email= $request->email;

        if((isset($request->password))OR ($request->password !=""))
        {
            $user->password= Hash::make($request->password);        
        }
        if($request->file('picture'))
        {
            $file= $request->file('picture');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/user'), $filename);
            // $data['picture']= $filename;
            $user->picture=$filename;
        }
        $user->save();
        return "updated";
    }

    
    //$this->validate($request, [
      //  'first_name'=> 'required',
       // 'last_name'=> 'required',
        //'picture'=> 'required',
        //'email'=> 'required' // I'd add an "email" rule here too
   // ]);
/*
    $user->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
       // 'picture' => $request->picture,

        if()){
            $file= $request->file('picture');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/user'), $filename);
           // $data['picture']= $filename;
            $user->picture=$filename;
        }
        'email' => $request->email,
       ]); */


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
