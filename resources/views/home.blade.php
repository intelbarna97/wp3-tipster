@extends('layouts.main')

@section('content')
<div class="col-lg-6 col-md-8 mx-auto">
@foreach ($games as $game)
    @include('game._item')
@endforeach
{{ $games->links() }}
</div>
@endsection