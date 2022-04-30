<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\League;

class LeaguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*League::create([
            'name'=>'English Premier League',
        'country_id'=>1,
        'team_count'=>20,
        ]);

        League::create([
            'name'=>'LaLiga',
        'country_id'=>2,
        'team_count'=>20,
        ]);

        League::create([
            'name'=>'Ligue 1',
        'country_id'=>3,
        'team_count'=>20,
        ]);*/

        League::create([
            'name'=>'Bundesliga',
        'country_id'=>4,
        'team_count'=>18,
        ]);

        League::create([
            'name'=>'Serie A',
        'country_id'=>5,
        'team_count'=>20,
        ]);
    }
}
