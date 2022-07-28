<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;


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
        $user->role_id= $request->input('role_id');
        if($request->file('picture')){
            $file= $request->file('picture');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/user'), $filename);
           // $data['picture']= $filename;
            $user->picture=$filename;
        }
        $user->email= $request->input('email');
        $user->password= Hash::make($request->input('password'));

        // return $this->validate($request, [
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'email|unique:users|max:255'
        // ],
        // // second array of validation messages can be passed here
        // [
        //     'first_name.required' => 'Please provide a valid name!',
        //     'last_name.required' => 'Please provide a valid name!',
        //     'email.required' => 'Please provide a valid email!',
        // ]);

        $validator = \Validator::make($request->all(), [
            'first_name'       => 'required', 
            'last_name' => 'required',
            'email'      => 'email|unique:users',
        ], [
            'first_name.*'       => 'Name Required',
            'last_name.*'      => 'Unique Email is required',
            'email' => 'Email format is invalide and should be unique',
        ]);
        
        if ($validator->fails()) {
            $obj = $validator->errors();
            $array = $obj->toArray();
            
            // return back()->withInput()->withErrors($validator->errors());
            return back()->with('exception',$array);
        }


        $user->save();
        //$user = User::create($request);

        if ($user)
        return back()->with('success','User created successfully!');
    else
        return back()->with('error','Failed!');
    }

    public function delete (User $user)
    {
       // $user= User::find($id);
        $user->delete();
        if ($user)
        return back()->with('success','User deleted successfully!');
    else
        return back()->with('error','Failed!');
    }

    public function update (Request $request, User $user)
    {   //return $request;
        //return $user->id;
        $user = User::find($user->id);
        $user->first_name= $request->first_name;
        $user->last_name= $request->last_name;
        $user->role_id=$request->role_id;
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
        if ($user)
            return back()->with('success','User updated successfully!');
        else
            return back()->with('error','Failed!');   }

    
    

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
