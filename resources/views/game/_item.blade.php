<div class="card mb-3">        
    <div class="card-body">
        <div class="d-flex justify-content-around p-2">
            
            <div class="d-inline-flex p-2 "> {{$game->league_id}}:</div>

            <div class="d-inline-flex p-2 "> {{$game->team1_id}} - {{$game->team2_id}}</div>

            @auth
            <div class="d-inline-flex p-2 justify-content-end">
                <div class="text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('game.edit', $game)}}">
                        Edit
                    </a>
                </div>
            </div>                
            @endauth
        </div>
        <div class="progress">
            <div class="progress-bar" role="progressbar"
                style="width: {{ App\Http\Controllers\HomeController::prediction($game,'h')}}%" 
                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">

                Home: {{ number_format((float)(App\Http\Controllers\HomeController::prediction($game,'h')), 0, '.','')}}%

            </div>

            <div class="progress-bar bg-success" role="progressbar" 
                style="width: {{ App\Http\Controllers\HomeController::prediction($game,'x')}}%" 
                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">

                Draw: {{ number_format((float)(App\Http\Controllers\HomeController::prediction($game,'x')), 0, '.','')}}%

            </div>

            <div class="progress-bar bg-info" role="progressbar"
                style="width: {{ App\Http\Controllers\HomeController::prediction($game,'a')}}%" 
                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">

                Away: {{ number_format((float)(App\Http\Controllers\HomeController::prediction($game,'a')), 0, '.','')}}%

            </div>

          </div>
          @auth
              
          @if (!in_array($game->id, $predictions))
                <div class="d-flex p-2 justify-content-around align-items-center">
                    
                    <div class="d-inline-flex p-2">
                        <form method="POST" action="/{{$game->id}}">
                            @csrf
                            <input name="result" type="submit" value="h">
                        </form>
                    </div> 
                    <div class="d-inline-flex p-2">
                        <form method="POST" action="/{{$game->id}}">
                            @csrf
                            <input name="result" type="submit" value="x">
                        </form>
                    </div> 
                    <div class="d-inline-flex p-2">
                        <form method="POST" action="/{{$game->id}}">
                            @csrf
                            <input name="result" type="submit" value="a">
                        </form>
                    </div> 
                </div>
          @endif
          @endauth
    </div>
</div>