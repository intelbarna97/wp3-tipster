<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Team::create([
            'name'=>'Manchester City',
            'league_id'=>1,
            'country_id'=>1,
            'city_id'=>1,
        ]);

        Team::create([
            'name'=>'Barcelona',
            'league_id'=>2,
            'country_id'=>2,
            'city_id'=>2,
        ]);

        Team::create([
            'name'=>'Paris Saint Germain',
            'league_id'=>3,
            'country_id'=>3,
            'city_id'=>3,
        ]);*/

        Team::create([
            'name'=>'FC Bayern München',
            'league_id'=>4,
            'country_id'=>4,
            'city_id'=>4,
        ]);

        Team::create([
            'name'=>'AC Milan',
            'league_id'=>5,
            'country_id'=>5,
            'city_id'=>5,
        ]);

        Team::create([
            'name'=>'Juventus',
            'league_id'=>5,
            'country_id'=>5,
            'city_id'=>6,
        ]);
    }
}
