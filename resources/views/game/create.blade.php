@extends('layouts.main')

@section('content')
<form action="{{ route('game.create')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex">
        <div class="d-flex justify-content-center align-items-center">
            <h3 class="display-3">{{__('Add New Game')}}</h3>
          </div>
    </div>
<div class="row">
    <div class="col-lg-8 col-md-6">
        <div class="card">
            <div class="card-body">
                    <div class="mb-3">
                        <label for="league_id">{{__('League')}}</label>
                        <select name="league_id" class="form-control{{ $errors->has('league_id') ? ' is-invalid' : ''}}">
                            <option value="">{{__('Choose a League')}}</option>
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
                        <label for="team1_id">{{__('Home team')}}</label>
                        <select name="team1_id" class="form-control{{ $errors->has('team1_id') ? ' is-invalid' : ''}}">
                            <option value="">
                                {{__('Choose a Home team')}}
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
                        <label for="team2_id">{{__('Away team')}}</label>
                        <select name="team2_id" class="form-control{{ $errors->has('team2_id') ? ' is-invalid' : ''}}">
                            <option value="{{ old('team2_id')}}">{{__('Choose an Away team')}}</option>
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
                        
                    <div class="mb-3 p-2">
                        <button class="btn btn-primary btn-lg">Add</button>
                    </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="team1_goals">{{__('Home team goals')}}</label>
                    <input type="number" class="form-control{{ $errors->has('team1_goals') ? ' is-invalid' : ''}}" name="team1_goals" min="0" max="50" value="0">
                    @if ($errors->has('team1_goals'))
                            <p class="invalid-feedback">{{ $errors->first('team1_goals') }}</p>
                        @endif
                </div>
                <div class="mb-3">
                    <label for="team2_goals">{{__('Away team goals')}}</label>
                    <input type="number" class="form-control{{ $errors->has('team2_goals') ? ' is-invalid' : ''}}" name="team2_goals" min="0" max="50" value="0">
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
                    <label for="img">{{__('Choose image')}}</label>
                    <input type="file" class="form-control{{ $errors->has('img') ? ' is-invalid' : ''}}" name="img">
                    @if ($errors->has('img'))
                            <p class="invalid-feedback">{{ $errors->first('img') }}</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection