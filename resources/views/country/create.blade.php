@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-8 mx-auto">
    <div class="card">
        <div class="card-header">
            <h3 class="display-3">{{__('Add New Country')}}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('country.create') }}" method="POST">
                @csrf
                <x-forms.input name="name" type="text" label="{{ __('Country name') }}"/>
                <div class="mb-3">
                    <button class="btn btn-primary btn-lg">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection