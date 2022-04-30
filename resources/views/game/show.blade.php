@extends('layouts.main')
@section('content')
    <p>{{$team1[0]->name}} - {{$team2[0]->name}} | {{$game->created_at->diffForHumans()}}</p>
@endsection