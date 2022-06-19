<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Complaint;
use App\Models\Section;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HomeSeeder extends Seeder
{

    public function run()
    {

          $fake = Factory::create();

         //  Branches
         for ($i=0; $i < 4 ; $i++) {

            Company::create([
                'name' => $fake->name(),
                'lat' => 30.11 ,
                'lng' => 31.20 ,
                'location' => 'Masr Al Jadidah, Al Matar, El Nozha, Cairo Governorate 4470351, Egypt' ,
            ]);
         }

        //  sections
        for ($i=0; $i < 15  ; $i++) {
            Section::create([
                'name' => $fake->name(),
                'company_id' =>rand(1 , 4)
            ]);
        }

        // users
        $user = User::create([
            'name' => 'Tarek',
            'email' => 't@yahoo.com',
            'password' => bcrypt(123),
            'company_id' => rand(1 , 4),
            'section_id' => rand(1,15) ,
            'job_title' => 'Backend' ,
            'job_desc' => 'Backend Developer' ,
            'kpis' => 'php - laravel - apis' ,
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
        ]);

        for ($i=1; $i < 20 ; $i++) {
           User::create([
            'name' => $fake->name(),
            'email' => $fake->email(),
            'password' => bcrypt(123),
            'company_id' => rand(1 , 4),
            'section_id' => rand(1,15) ,
            'job_title' => 'Backend' ,
            'job_desc' => 'Backend Developer' ,
            'kpis' => 'php - laravel - apis' ,
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
            ]);
        }
/*
        // tasks
        for ($i=0; $i < 30 ; $i++) {
            Task::create([
                'title'=> 'task' . rand(1,40),
                'company_id' => rand(1 , 4),
                'job_id' => rand(1,15) ,
                //'user_id' => rand(1,16) ,
                'desc' => $fake->text(30) ,
                'status' => 'waiting' ,
                'start_date' =>'6/9/2022',
                'end_date' => '9/9/2022' ,
                'status' => 'waiting' ,
                'admin_id' => rand(1,3),
            ]);
        }

         // rates
         for ($i=0; $i < 20 ; $i++) {
            Rate::create([
                'company_id' => rand(1 , 4),
                'job_id' => rand(1,15) ,
                'user_id' => rand(1,16) ,
                'task_id' => rand(1,30) ,
                'desc' => $fake->text(50) ,
                'rate'=> rand(1,10) ,
                'admin_id' => rand(1,3) ,
            ]);
         }
*/
        //  complaints
        // for ($i=0; $i < 50 ; $i++) {
        //     Complaint::create([
        //         'message' => $fake->text(400) ,
        //          'user_id' => rand(1,16)
        //     ]);
        // }

        // recqirements
        // for ($i=0; $i < 50 ; $i++) {
        //     Requirement::create([
        //         'name' => $fake->text(30) ,
        //         'price' => rand(100 , 1000) ,
        //         'user_id' => rand(1,16) ,
        //         'task_id' => rand(1,30) ,
        //         'admin_id' => rand(1,3) ,
        //         'status' => 'waiting'
        //     ]);
        // }

    }
}
