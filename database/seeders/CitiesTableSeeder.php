<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        City::create(['name'=>'Manchester','country_id'=>1]);
        City::create(['name'=>'Barcelona','country_id'=>2]);
        City::create(['name'=>'Paris','country_id'=>3]);
        */

        
        City::create(['name'=>'München','country_id'=>4]);
        City::create(['name'=>'Milan','country_id'=>5]);
        City::create(['name'=>'Torino','country_id'=>5]);
    }
}
