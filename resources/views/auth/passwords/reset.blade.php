@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Reset your password')
        @endslot
        <form method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
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
            @include('partials.form-group', [
                'title' => __('Confirm your password'),
                'type' => 'password',
                'name' => 'password_confirmation',
                'required' => true,
                ])
            @component('components.button')
                @lang('Confirm')
            @endcomponent
        </form>
    @endcomponent
@endsection
