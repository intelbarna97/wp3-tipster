<div class="card mb-3">        
    <div class="card-body">
        <div class="d-flex justify-content-center">
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
    </div>
</div>