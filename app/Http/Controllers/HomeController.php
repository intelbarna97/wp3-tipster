<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Prediction;
use App\Models\Team;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

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
        
        $predictions = Db::table('predictions')->select('match_id')->where('user_id', Auth::user()->id)->get()->toArray();
        $predictions = Arr::pluck($predictions, 'match_id');
        return view('home')->with(compact('games', 'predictions'));
    }

    public function predict(Request $request, Game $game)
    {

        $check = DB::table('predictions')->select('user_id', 'match_id')
        ->where('user_id','=',Auth::user()->id)
        ->where('match_id','=',$game->team1_id)
        ->get()->toArray();
        if(isEmpty($check))
        {
        DB::table('predictions')->insert([
            'match_id'=>$game->id,
            'user_id'=>Auth::user()->id,
            'result'=>$request->result,
        ]);
        }

        
        return redirect()->route('home');
    }
}
