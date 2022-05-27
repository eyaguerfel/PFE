<?php

namespace App\Http\Controllers;
use App\Models\ReligiousHolidays;
use Illuminate\Http\Request;

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
        $religiousholiday->save();
        return 'Role created Successfully ';
    }

    public function delete (ReligiousHolidays $religiousholiday)
    {
        //$religiousholiday= NationalHolidays::find($id);
        $religiousholiday-> delete();
        return 'Deleted Successfully';
    }

    public function update (Request $request,ReligiousHolidays $religiousholiday)
    {
        $religiousholiday->name=$request->name;
        $religiousholiday->start_date=$request->start_date;
        $religiousholiday->end_date=$request->end_date;
        $religiousholiday->save();
        return 'updated Successfully ';
    }

}
