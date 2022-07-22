<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
        // public function run()
   {
    DB::table('projects')->insert([
        ['id'=>1, 'text'=>'Project #1', 'start_date'=>'2022-06-07 08:00:00',
             'end_date'=>'2022-06-08 12:00:00'],
        ['id'=>2, 'text'=>'Project #2', 'start_date'=>'2022-06-09 15:00:00',
             'end_date'=>'2022-06-11 16:30:00'],
        ['id'=>3, 'text'=>'Project #3', 'start_date'=>'2022-06-12 00:00:00',
             'end_date'=>'2022-06-13 00:00:00'],
        ['id'=>4, 'text'=>'Project #4', 'start_date'=>'2022-06-13 08:00:00',
             'end_date'=>'2022-06-15 12:00:00'],
        ['id'=>5, 'text'=>'Project #5', 'start_date'=>'2022-06-17 08:00:00',
             'end_date'=>'2022-06-20 12:00:00'],
        ['id'=>6, 'text'=>'Project #6', 'start_date'=>'2022-06-20 08:00:00',
             'end_date'=>'2022-06-23 12:00:00']
    ]);
}

    
}
