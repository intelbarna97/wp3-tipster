@extends('layouts.main')
@section('content')

<div class="row p-2">
    <div class="col">{{__('Team')}}</div>
    <div class="col">{{__('League')}}</div>
    <div class="col">{{__('Country')}}</div>
    <div class="col">{{__('City')}}</div>
  
  @if (Auth::user()->admin)
        
    <div class="col">{{__('Action')}}</a></div>
    
    @endif
</div>


@foreach ($teams as $team)
<div class="card mb-3">        
    <div class="card-body">
<div class="row p-2">
    <div class="col">{{$team->name}}</div>
    <div class="col">{{$team->league->name}}</div>
    <div class="col">{{$team->country->name}}</div>
    <div class="col">{{$team->city->name}}</div>
    @if (Auth::user()->admin)
        
    <div class="col"><a class="btn btn-primary" href="{{ route('team.delete', $team->id)}}">{{ __('Delete') }}</a></div>
    
    
    @endif
  </div>
  
</div>
</div>

@endforeach

@endsection