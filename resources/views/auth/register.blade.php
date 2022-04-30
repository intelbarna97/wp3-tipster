@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
        <div class="card-body">
            <h3 class="display-3 mb-5">{{__('Sign up')}}</h3>
            <form action="{{ route('register')}}" method="POST">
                @csrf
                <x-forms.input name="name" label="{{ __('Username') }}"/>
                <x-forms.input name="email" type="email" label="{{ __('Email')}}"/>
                <x-forms.input name="password" type="password" label="{{ __('Password')}}"/>
                <x-forms.input name="password_confirmation" type="password" label="{{ __('Password Confirmation')}}"/>
                <div class="form-check mb-3">
                    <input class="form-check-input {{ $errors->has('terms') ? 'is-invalid' : ''}}"
                     type="checkbox" value="1" id="terms" name="terms">
                    <label class="form-check-label" for="terms">
                      {{ __('Agree to terms and conditions') }}
                    </label>
                    <div class="invalid-feedback">
                        You must agree before registering.
                    </div>
                  </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection