<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; 
use App\Models\ReligiousHolidays;
use App\Models\NationalHolidays;
use DB;


class ProjectController extends Controller
{
    public function get_myProject()
    {
        return view ('Projects.myproject');
    }

    public static function get_project($user_id)
    {
        $project=DB::select("SELECT distinct projects.id, projects.name, projects.start_date, projects.end_date FROM projects, tasks , users WHERE projects.id=tasks.project_id and users.id=tasks.user_id and users.id=$user_id;");
        
        return $project;
    }

    public function allProject(){
        
        $projects=Project::get();
        return view ('Projects.listproject',compact('projects'));
    }


    public function create(){
        return view ('Projects.createproject');
    }


    public function store(Request $request)
   {
       $project= new Project();
       $project->name=$request->name;
       $project->start_date=$request->start_date;
       $project->end_date=$request->end_date;
       $project->save();
      //return 'project created Successfully ';

        return response()->json
        (
            [
                "code"=>1,
                "status"=>"success",
                "message"=>"project created"
            ]
            );
   }

   public function edit(Project $project){
        return view('Projects.updateproject',compact('project'));}

   public function update(Request $request, $id)
   {    
        //return $request;
        $project = Project::find($id);
        $project->name=$request->name;
        $project->start_date=$request->start_date;
        $project->end_date=$request->end_date;
        $project->save();

        return 'updated';
   }

   public function delete ($id)
    {
        $project= Project::find($id);
        $project-> delete();
        //return 'Deleted Successfully';
        return response()->json
        (
            [
                "code"=>1,
                "status"=>"success",
                "message"=>"project deleted"
            ]
            );
    }

    public function get_all_projects_start_date()
    {
        return Project::all('id','name','start_date');
    }
    public function get_all_projects_end_date()
    {
        return Project::all('id','name','end_date');
    }

    public function proj_holidays()
    {

        $start_date_project=Project::all('id','name','start_date');
        $end_date_project=Project::all('id','name','end_date');
        $religiousholiday=ReligiousHolidays::all('name','start_date','end_date');
        $nationalholiday=NationalHolidays::all('name','date');

        $object=[];
         foreach ($start_date_project as $sd)  
        {
            $object[]=
            [
                "id"=>$sd->id,
                "title" =>$sd->name,
                "start"=> $sd->start_date,
                "end"=> null,
                "className"=>"bg-primary"
            ] ;   
        }
        
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
}

