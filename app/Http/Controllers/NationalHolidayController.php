<?php
namespace App\Http\Controllers;
use App\Models\NationalHolidays;
use Illuminate\Http\Request;
use date;
use Validator;


class NationalHolidayController extends Controller
{
    public function allNationalHoliday(){
        
        $nationalholiday=NationalHolidays::get();
        return view ('Holidays.listnath',compact('nationalholiday'));
    }

    public function create(){
        return view ('Holidays.createnath');
    }

    public function edit(NationalHolidays $nationalholiday){
        return view('Holidays.updatenath',compact('nationalholiday'));}

    public function store (Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'date'=>'required',
    
            ],
            [
                'name '=>'Name required',
                'date'=>' date required',
    
            ]);
    
        if ($validator->fails()) {
            $obj = $validator->errors();
            $array = $obj->toArray();
            return back()->with('exception',$array);
        }
        $now = date('Y-m-d');
        //return $request;
        if ($now<$request->date)
        {
            $nationalholiday= new NationalHolidays();
            $nationalholiday->name=$request->name;
            $nationalholiday->date=$request->date;
            
            
        
            $nationalholiday->save();
        
            if ($nationalholiday)
            return back()->with('success','Holiday created successfully!');
                else
            return back()->with('error','now> date!');        
        }
        else
            return back()->with('error','You cannot enter a past day');  
        
        
    }

    public function delete (NationalHolidays $nationalholiday)
    {
        //$nationalholiday= NationalHolidays::find($id);
        $nationalholiday-> delete();
        if ($nationalholiday)
            return back()->with('success','Holiday deleted successfully!');
        else
            return back()->with('error','Failed!');    }

    public function update (Request $request,NationalHolidays $nationalholiday)
    {
        //$nationalholiday= NationalHolidays::find($id);
        $nationalholiday->name=$request->name;
        $nationalholiday->date=$request->date;
        $nationalholiday->save();
        if ($nationalholiday)
        return back()->with('success','Holiday updated successfully!');
    else
        return back()->with('error','Failed!');    }

    public function get_national_h()
    {
        return NationalHolidays::all('id','name','date',);
    }
}
