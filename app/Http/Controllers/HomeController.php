<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\League;
use App\Models\Team;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    public function index($selectedLeague = null)
    {
        
        $teams = Team::all();

        $leagues = League::all();

        if(isset($selectedLeague))
        {
            $games = Game::select()->where('league_id','=',$selectedLeague)->paginate(5);
        }
        else
        {            
            $games = Game::orderBy('created_at', 'desc')->paginate(5);
        }
        
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

            foreach($leagues as $league)
            {
                if($games[$i]->league_id==$league->id)
                {
                    $games[$i]->league_id=$league->name;
                }
            }
        }
        if(Auth::check())
        {
            $predictions = Db::table('predictions')->select('match_id')->where('user_id', Auth::user()->id)->get()->toArray();
            $predictions = Arr::pluck($predictions, 'match_id');
            return view('home')->with(compact('games', 'predictions'));
        }
        else
        {            
            return view('home')->with(compact('games'));
        }
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

    public static function prediction(Game $game, $result)
    {
        $allpredictioncount =DB::table('predictions')->select(DB::raw('count(id) as count'))->where('match_id','=',$game->id)->get();
        $goodpredictions = DB::table('predictions')->select(DB::raw('count(id) as count'))->where('match_id','=',$game->id)->where('result','=',$result)->get();

        return $allpredictioncount[0]->count==0? 0 : ($goodpredictions[0]->count/$allpredictioncount[0]->count)*100;

    }

}
