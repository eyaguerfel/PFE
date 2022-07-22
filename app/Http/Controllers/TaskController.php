<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function my_task()
    {
        return view ('tasks.mytask');
    }

    public static function get_my_Task($user_id)
    {
        $tasks = Task::where('user_id',$user_id)->get();
        foreach($tasks as $task)
        {
            $project= Project::find($task->project_id);
            if (isset($project))
                $task->project=$project->name;
            else
                $task="";
        }

        return $tasks;
    }
    public function allTasks(){
        
        $tasks=Task::all();
        foreach($tasks as $task)
        {
            $user=User::find($task->user_id);
            if (isset($user))
                $task->user=$user->email;  
            else
                $task->user="" ;
            
            $project=Project::find($task->project_id);
            if (isset($project))
                $task->project=$project->name;
            else
                $task->project="" ;

        }
        return view ('tasks.listtask',compact('tasks'));
    }

    public function create(){
        $user=User::all();
        $project=Project::all();
        $array = ["user"=> $user, "project"=> $project];
        return view ('tasks.createtask')->with ('array',$array);
    }

    public function edit(Task $task){
        $user=User::all();
        $project=Project::all();
        $array = ["user"=> $user, "project"=> $project , "task"=> $task];

        return View('tasks.taskupdate',compact('array',$array));}

    public function store (Request $request)
    {
        //return $request;
        $task= new Task();
        $task->name=$request->name;
        $task->start_date=$request->start_date;
        $task->end_date=$request->end_date;
        $task->user_id=$request->user_id;
        $task->project_id=$request->project_id;
        $task->status=0;
        $task->save();
        return 'task created Successfully ';
    }

    public function delete (Task $task)
    {
        
        $task-> delete();
        return 'Task Deleted Successfully';
    }

    public function update (Request $request, $id)
    {
        $task= Task::find($id);
        $task->name=$request->name;
        $task->start_date=$request->start_date;
        $task->end_date=$request->end_date;
        $task->user_id=$request->user_id;
        $task->project_id=$request->project_id;
        $task->save();
        return 'Role updated Successfully ';
    }


}
