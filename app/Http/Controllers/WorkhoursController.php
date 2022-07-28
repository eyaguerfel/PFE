<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Workhours;
use Illuminate\Http\Request;


class WorkhoursController extends Controller

{
  
    public function allHours(){
        
        $hours=Workhours::all();
        foreach($hours as $hour)
        {
            $user=User::find($hour->user_id);
            if (isset($user))
                $hour->user=$user->email;  
            else
                $hour->user="" ;
            
            

        }
        return view ('work_hours.listhours',compact('hours'));
    }

    public function create(){
        $user=User::all();
        $hours=Workhours::all();
        return view ('work_hours.createhours')->with ('user',$user);
    }

    public function edit(Workhours $hour){
        $user=User::all();
        $array = ["user"=> $user, "hour"=> $hour];

        return View('work_hours.edithours',compact('array',$array));}

    public function store (Request $request)
    {
        //return $request;
        $hour= new Workhours();
        $hour->start_hours=$request->start_hours;
        $hour->end_hours=$request->end_hours;
        $hour->user_id=$request->user_id;
        $hour->save();

        if ($hour)
        return back()->with('success','Hour created successfully!');
    else
        return back()->with('error','Failed!');
       }

    public function delete (Workhours $hour)
    {
        
        $hour-> delete();
        if ($hour)
            return back()->with('success','Hour deleted successfully!');
        else
            return back()->with('error','Failed!');
           }

    public function update (Request $request, $id)
    {
        $hour= Workhours::find($id);
        $hour->start_hours=$request->start_date;
        $hour->end_hours=$request->end_date;
        $hour->user_id=$request->user_id;
        $hour->save();
        if ($hour)
        return back()->with('success','Hour updated successfully!');
    else
        return back()->with('error','Failed!');
           }


}
