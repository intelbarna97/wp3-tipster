@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
        <div class="card-body">
            <h3 class="display-3 mb-5">{{__('Edit your profile')}}</h3>
            <form action="{{ route('auth.edit')}}" method="POST">
                @csrf
                <x-forms.input name="name" value="{{Auth::user()->name}}" label="{{ __('Username') }}"/>
                <x-forms.input name="email" value="{{Auth::user()->email}}" type="email" label="{{ __('Email')}}"/>
                <x-forms.input name="password" type="password" label="{{ __('Password')}}"/>
                <x-forms.input name="password_confirmation" type="password" label="{{ __('Password Confirmation')}}"/>
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">
                        {{ __('Edit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection