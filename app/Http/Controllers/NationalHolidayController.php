<?php
namespace App\Http\Controllers;
use App\Models\NationalHolidays;
use Illuminate\Http\Request;
use date;
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
        $now = date('Y-m-d');
        //return $request;
        if ($now<$request->date)
        {
        $nationalholiday= new NationalHolidays();
        $nationalholiday->name=$request->name;
        $nationalholiday->date=$request->date;
        $nationalholiday->save();
        return 'created Successfully ';
        }
        else 
            return'now> date';
        
    }

    public function delete (NationalHolidays $nationalholiday)
    {
        //$nationalholiday= NationalHolidays::find($id);
        $nationalholiday-> delete();
        return 'Deleted Successfully';
    }

    public function update (Request $request,NationalHolidays $nationalholiday)
    {
        //$nationalholiday= NationalHolidays::find($id);
        $nationalholiday->name=$request->name;
        $nationalholiday->date=$request->date;
        $nationalholiday->save();
        return 'updated Successfully ';
    }

    public function get_national_h()
    {
        return NationalHolidays::all('id','name','date',);
    }
}
