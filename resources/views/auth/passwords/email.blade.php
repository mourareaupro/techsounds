@extends('layouts.form')
@section('card')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @component('components.card')
        @slot('title')
            @lang('Renew password')
        @endslot
        <form method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            @include('partials.form-group', [
                'title' => __('E-mail'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                ])
            @component('components.button')
                @lang('Send request')
            @endcomponent
        </form>
    @endcomponent
@endsection
