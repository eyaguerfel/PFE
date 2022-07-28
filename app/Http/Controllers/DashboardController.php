<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Models\ReligiousHolidays;
use App\Models\NationalHolidays;

use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

class DashboardController extends Controller
{

    public function getData()
    {
        $tasks=Task::all()->take(5);
        foreach ($tasks as $t)
        { 
            $user=User::find($t->user_id);
            if (isset($user))
            {
                $t->user=$user->first_name.' '.$user->last_name;
                $t->picture = $user->picture;
            }

            $project = Project::find($t->project_id);
            if(isset($project))
                $t->project = $project->name;
            else
                $t->project = "";

            $nbrUser = User::all()->count();
        }
        $array = [
                    "tasks" => $tasks,
                    "nbrUser" => $nbrUser
                ];

        return $array;
    }
    public function index()
    {
        $array = $this->getData();
        return View('dashboard',compact('array',$array));
    }

    public function redirect()
    {
        $user=UserController::get_connected_user();
        $array = $this->getData();
        if (isset($user))
            return View('dashboard',compact('array',$array));
        else
            return view('auth.login');
    }

    public function user_calender()
    {
        return View('calendar_user');
    }

    public function holidays()
    {

        
        $religiousholiday=ReligiousHolidays::all('name','start_date','end_date');
        $nationalholiday=NationalHolidays::all('name','date');

        $object=[];
        
        foreach ($religiousholiday as $rel)
        {
            $object[]=
            [
                "title" =>$rel->name,
                "start"=> $rel->start_date,
                "end"=> $rel->end_date,
                "className"=>"bg-dark" 
            ];
        }
        
        foreach ($nationalholiday as $nat)
        {
            $object[]=
            [
                "title" =>$nat->name,
                "start"=> $nat->date,
                "className"=>"bg-dark" 
            ];
        }
         
         
         return $object;
    }

   
    public function project_task($id)
    {
        $task=TaskController::get_my_Task($id);
        //return $task;
        $project= ProjectController::get_project($id);
        return $project;
    }
}
