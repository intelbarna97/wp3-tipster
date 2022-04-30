<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        Country::create(['name'=>'England']);
        Country::create(['name'=>'Spain']);
        Country::create(['name'=>'France']);
        */
        
        Country::create(['name'=>'Germany']);
        Country::create(['name'=>'Italy']);
    }
}
