@extends('layouts.main')
@section('content')
<div class="col-lg-6 col-md-8 mx-auto">
    
    <div class="d-flex flex-row">
        <div class="p-2">
            <div class="card mb-3">
                <div class="card-body">
                    <img src="{{$game->image}}" alt="{{$game->team1->name . $game->team2->name}}" width="95" height="95" style="object-fit: cover">
                </div>
        
        </div>
    </div>
    <div class="p-2">
    <div class="card mb-3">    
            

        <div class="card-body">

            <div class="row p-2 justify-content-center align-items-center">
                
                {{$game->team1->name}} - {{$game->team2->name}} | {{$game->created_at->diffForHumans()}}

            </div>

            <div class="row p-2 justify-content-center align-items-center">
                {{ __('Community prediction') }}
            </div>

            <div class="progress">
                <div class="progress-bar" role="progressbar"
                    style="width: {{ App\Http\Controllers\HomeController::prediction($game,'h')}}%" 
                    aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
    
                    {{ __('Home:') }} {{ number_format((float)(App\Http\Controllers\HomeController::prediction($game,'h')), 0, '.','')}}%
    
                </div>
    
                <div class="progress-bar bg-success" role="progressbar" 
                    style="width: {{ App\Http\Controllers\HomeController::prediction($game,'x')}}%" 
                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
    
                    {{ __('Draw:') }} {{ number_format((float)(App\Http\Controllers\HomeController::prediction($game,'x')), 0, '.','')}}%
    
                </div>
    
                <div class="progress-bar bg-info" role="progressbar"
                    style="width: {{ App\Http\Controllers\HomeController::prediction($game,'a')}}%" 
                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
    
                    {{ __('Away:') }} {{ number_format((float)(App\Http\Controllers\HomeController::prediction($game,'a')), 0, '.','')}}%
    
                </div>
    
              </div>
      
        </div>
    </div>
</div>
</div>
</div>
@endsection