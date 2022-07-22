<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Http\Controllers\UserController;


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
}
