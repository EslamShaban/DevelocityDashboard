<?php

namespace Database\Seeders;

use App\Models\CategoryBanner;
use App\Models\Company;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
         $this->call(AdminSeeder::class);
         //$this->call(HomeSeeder::class);



    }
}
