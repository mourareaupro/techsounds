@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Sign in')
        @endslot

        <div class="form-row text-center">
            <div class="col-md-12">
                <a href="{{url('/facebook/redirect')}}" class="btn btn-primary btn-lg btn-facebook btn-round"><i class="fab fa-facebook-f"></i>   Login with Facebook</a>
            </div>
        </div>

        <div class="spacer"></div>

        <div class="form-row text-center">
            <div class="col-md-12">
                <h5>or with credentials</h5>
            </div>
        </div>

        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            @include('partials.form-group', [
                'title' => __('E-mail'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                ])
            @include('partials.form-group', [
                'title' => __('Password'),
                'type' => 'password',
                'name' => 'password',
                'required' => true,
                ])
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember"> @lang('Remember me')</label>
            </div>
            <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                @lang('Forgot your password ?')
            </a>
            @component('components.button')
                @lang('Connexion')
            @endcomponent


        </form>
    @endcomponent
@endsection
