<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Team;

class HomeController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        
        $games = Game::orderBy('created_at', 'desc')->paginate(10);
        for ($i=0; $i < count($games); $i++) { 
            foreach($teams as $team)
            {
                if($games[$i]->team1_id==$team->id)
                {
                    $games[$i]->team1_id=$team->name;
                }
                if($games[$i]->team2_id==$team->id)
                {
                    $games[$i]->team2_id=$team->name;
                }
            }
        }
            
        
        return view('home')->with(compact('games'));
    }
}
