<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Image;
use App\Models\Game;
use App\Models\League;
use App\Models\Team;
use App\Models\User;
use Dotenv\Parser\Lexer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leagues = League::orderBy('name')->get();
        $teams = Team::orderBy('name')->get();
        return view('game.create')->with(['leagues'=>$leagues, 'teams'=>$teams]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'league_id'=>'required|exists:leagues,id',
            'team1_id'=>'required|exists:teams,id|different:team2_id',
            'team2_id'=>'required|exists:teams,id|different:team1_id',
            'team1_goals'=>'min:0',
            'team2_goals'=>'min:0',
            'result'=>'required',
            'img' => 'file|image',
            ]
        );


            $game = Game::create($request->except('_token'));

            $image = $this->uploadImage($request);

            if($image)
            {
                $game->img = $image->basename;
                $game->save();
            }

            return redirect()->route('game.details', $game)->with('success', __('Match saved successfully'));
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('game.show', $game)->with(compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $leagues = League::orderBy('id')->get();
        $teams = Team::orderBy('id')->get();
        return view('game.edit')->with(compact('game','leagues', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $game->update($request->all());

        return redirect()->route('game.edit', $game)->with('success', __('Game updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }

    public function comment(Game $game, Request $request)
    {
        $request->validate([
            'comment'=>'required|min:1',
        ]);

        $comment = new Comment;
        $comment->message = $request->comment;
        $comment->user()->associate(Auth::user());

        $game->comments()->save($comment);

        return redirect()->route('game.details', $game);

    }

    private function uploadImage(Request $request)
    {
        $file = $request->file('img');

        if(!$file)
        {
            return;
        }

        $filename = uniqid();

        $img = Image::make($file)->save(public_path("upload/games/{$filename}.{$file->extension()}"));

        return $img;
    }
}
