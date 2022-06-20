@extends('layouts.main')
@section('content')
<div class="col-lg-6 col-md-8 mx-auto">
    
    <div class="d-flex justify-content-between">
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
    
<div class="row">
<div class="col-lg-6 col-md-8 mx-auto">
                    <h6 class="display-6"> {{__('Comments')}}</h6>
                    @auth
                        
                    <form action="{{route('game.comment', $game)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea class="form-control" name="comment"></textarea>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">
                                {{__('Comment')}}
                            </button>
                        </div>
                    </form>

                    @endauth

                    @foreach ($game->comments as $comment)
                    <div class="card m-3">
                        <div class="card-body">
                            <div class="mb-3 d-flex">
                                <div class="d-flex">
                                    <img class="rounded-circle" width="40" src="{{ $comment->user->avatar }}" alt="{{ $comment->user->username }}">
                                    <div class="p-2">
                                        {{$comment->user->name}}
                                    </div>
                                    <div class="p-2">
                                        {{__(' | ')}}{{$comment->created_at->diffForHumans()}}
                                    </div>
                                </div>
                            </div>
                                    {{$comment->message}}
                        </div>        
                    </div>
                    @endforeach
</div>
</div>
@endsection