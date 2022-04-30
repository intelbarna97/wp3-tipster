@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-8 mx-auto">
    <div class="card">
        <div class="card-header">
            <h3 class="display-3">{{__('Add New League')}}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('league.create')}}" method="POST">
                @csrf
                <x-forms.input name="name" type="text" label="{{ __('League name') }}"/>

                <div class="mb-3">
                    <select name="country_id" class="form-control{{ $errors->has('country_id') ? ' is-invalid' : ''}}">
                        <option value="">{{__('Choose a Country')}}</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : ''}}>
                                {{ $country->name }}
                            </option>
                        @endforeach                        
                    </select>
                    @if ($errors->has('country_id'))
                            <p class="invalid-feedback">{{ $errors->first('country_id') }}</p>
                        @endif
                </div>

                
                <x-forms.input name="team_count" type="number" min="0" max="100" label="{{ __('Team count') }}"/>

                <div class="mb-3">
                    <button class="btn btn-primary btn-lg">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection