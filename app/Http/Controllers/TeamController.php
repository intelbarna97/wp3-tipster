<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\League;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\String\b;

class TeamController extends Controller
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
        $countries = Country::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $leagues = League::orderBy('name')->get();
        return view('team.create')->with(compact('countries', 'cities', 'leagues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'country_id'=>'required|exists:countries,id',
            'city_id'=>'required|exists:cities,id',
            'league_id'=>'required|exists:leagues,id',
        ]);


            Team::create($request->all());
            return redirect()->route('team.create')->with('success', __('Team saved successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {

    }

    public function list()
    {        
        if(Auth::check())
        {
            $teams = Team::orderby('league_id')->get();
            return view('team.list')->with(compact('teams'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        if(Auth::user()->admin)
        {
            DB::table('teams')->where('id','=',$team->id)->delete();
            return redirect()->route('team.list')->with('success', __('Team deleted'));
        }
        
        return redirect()->route('home');
    }
}
