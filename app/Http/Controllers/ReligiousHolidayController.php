<?php

namespace App\Http\Controllers;
use App\Models\ReligiousHolidays;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReligiousHolidayController extends Controller
{

   
    public function allReligiousHoliday(){
        
        $religiousholiday=ReligiousHolidays::get();
        return view ('Holidays.listrelh',compact('religiousholiday'));
    }

    public function create(){
        return view ('Holidays.createrelh');

    }

    public function edit(ReligiousHolidays $religiousholiday){
        return view('Holidays.updaterelh',compact('religiousholiday'));}

    public function store (Request $request)
    {
        //return $request;
        $religiousholiday= new ReligiousHolidays();
        $religiousholiday->name=$request->name;
        $religiousholiday->start_date=$request->start_date;
        $religiousholiday->end_date=$request->end_date;
        $validator = \Validator::make($request->all(), 
        [
            'name' => 'required',
            'start-date'=>'required',
            'start-end_date'=>'required',

        ],
        [
            'name' => 'name is required',
            'start-date'=>'start date is required',
            'start-end_date'=>'end date is required',

        ]);

        if ($validator->fails()) 
        {
            $obj = $validator->errors();
            $array = $obj->toArray();
            return back()->with('exception',$array);
        }

        $religiousholiday->save();
        if ($religiousholiday)
            return back()->with('success','Holiday created successfully!');
        else
            return back()->with('error','Failed!');    }

    public function delete (ReligiousHolidays $religiousholiday)
    {
        //$religiousholiday= NationalHolidays::find($id);
        $religiousholiday-> delete();
        if ($religiousholiday)
            return back()->with('success','Holiday deleted successfully!');
        else
            return back()->with('error','Failed!');    }

    public function update (Request $request,ReligiousHolidays $religiousholiday)
    {
        $religiousholiday->name=$request->name;
        $religiousholiday->start_date=$request->start_date;
        $religiousholiday->end_date=$request->end_date;
        $religiousholiday->save();
        if ($religiousholiday)
            return back()->with('success','Holiday updated successfully!');
        else
            return back()->with('error','Failed!');    }

    public function get_religious_h()
    {
        return ReligiousHolidays::all('id','name','start_date','end_date');
    }
}
