<div class="card mb-3">        
    <div class="card-body">
        <div class="d-flex justify-content-center p-2">
            <div class="d-inline-flex p-2"> {{$game->team1_id}} - {{$game->team2_id}}</div>
            @auth
            <div class="d-inline-flex p-2">
                <div class="text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('game.edit', $game)}}">
                        Edit
                    </a>
                </div>
            </div>                
            @endauth
        </div>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          @auth
              
          @if (!in_array($game->id, $predictions))
                <div class="d-flex p-2">
                    
                    <div class="d-inline-flex p-2 justify-content-start align-items-center">
                        <form method="POST" action="/{{$game->id}}">
                            @csrf
                            <input name="result" type="submit" value="h">
                        </form>
                    </div> 
                    <div class="d-inline-flex p-2 justify-content-center align-items-center">
                        <form method="POST" action="/{{$game->id}}">
                            @csrf
                            <input name="result" type="submit" value="x">
                        </form>
                    </div> 
                    <div class="d-inline-flex p-2 justify-content-end align-items-center">
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