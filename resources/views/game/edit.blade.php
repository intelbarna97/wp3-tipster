@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-8 mx-auto">
    <div class="card">
        <div class="card-header">
            <h3 class="display-3">{{__('Update Game')}}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('game.edit', $game)}}" method="POST">
                @csrf
                <div class="mb-3">
                    <select name="league_id" class="form-control{{ $errors->has('league_id') ? ' is-invalid' : ''}}">
                        <option value="{{$game->league_id}}">{{$leagues[($game->league_id)-1]->name}}</option>
                        @foreach ($leagues as $league)
                            <option value="{{ $league->id }}" {{ old('league_id') == $league->id ? 'selected' : ''}}>
                                {{ $league->name }}
                            </option>
                        @endforeach                        
                    </select>
                    @if ($errors->has('league_id'))
                            <p class="invalid-feedback">{{ $errors->first('league_id') }}</p>
                        @endif
                </div>
                <div class="mb-3">
                    <select name="team1_id" class="form-control{{ $errors->has('team1_id') ? ' is-invalid' : ''}}">
                        <option value="{{$game->team1_id}}">
                            {{$teams[($game->team1_id)-1]->name}}
                        </option>
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}" {{ old('team1_id') == $league->id ? 'selected' : ''}}>
                                {{ $team->name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('team1_id'))
                            <p class="invalid-feedback">{{ $errors->first('team1_id') }}</p>
                        @endif
                </div>
                <div class="mb-3">
                    <select name="team2_id" class="form-control{{ $errors->has('team2_id') ? ' is-invalid' : ''}}">
                        <option value="{{$game->team2_id}}">{{$teams[($game->team2_id)-1]->name}}</option>
                        @foreach ($teams as $team)
                            <option value="{{ $team->id }}" {{ old('team2_id') == $league->id ? 'selected' : ''}}>
                                {{ $team->name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('team2_id'))
                            <p class="invalid-feedback">{{ $errors->first('team2_id') }}</p>
                        @endif
                </div>
                    <div class="mb-3">
                    <label for="team1_goals">{{__('Home team goals')}}</label>
                    <input type="number" class="form-control{{ $errors->has('team1_goals') ? ' is-invalid' : ''}}" name="team1_goals" min="0" max="50" value="{{$game->team1_goals}}">
                    @if ($errors->has('team1_goals'))
                            <p class="invalid-feedback">{{ $errors->first('team1_goals') }}</p>
                        @endif
                </div>
                <div class="mb-3">
                    <label for="team2_goals">{{__('Away team goals')}}</label>
                    <input type="number" class="form-control{{ $errors->has('team2_goals') ? ' is-invalid' : ''}}" name="team2_goals" min="0" max="50" value="{{$game->team2_goals}}">
                    @if ($errors->has('team2_goals'))
                            <p class="invalid-feedback">{{ $errors->first('team2_goals') }}</p>
                        @endif
                </div>
                <div class="mb-3">
                    <label for="result">{{__('Result')}}</label>
                    <select name="result" class="form-control{{ $errors->has('result') ? ' is-invalid' : ''}}">
                        <option value="h">{{__('Home')}}</option>
                        <option value="a">{{__('Away')}}</option>
                        <option value="x">{{__('Draw')}}</option>
                    </select>
                    @if ($errors->has('result'))
                            <p class="invalid-feedback">{{ $errors->first('result') }}</p>
                        @endif
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary btn-lg">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection