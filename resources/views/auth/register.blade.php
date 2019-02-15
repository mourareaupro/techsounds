@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Register')
        @endslot

        <div class="form-row text-center">
            <div class="col-md-12">
                <a href="{{url('/facebook/redirect')}}" class="btn btn-primary btn-lg btn-facebook btn-round"><i class="fab fa-facebook-f"></i>   Register with Facebook</a>
            </div>
        </div>

        <div class="spacer"></div>

        <div class="form-row text-center">
            <div class="col-md-12">
                <h5>or with credentials</h5>
            </div>
        </div>


        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            @include('partials.form-group', [
                'title' => __('Name'),
                'type' => 'text',
                'name' => 'name',
                'required' => true,
                ])
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
            <!--<div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="ok" name="ok" required>
                    <label class="custom-control-label" for="ok"> @lang('J\'accepte les termes et conditions de la politique de confidentialité.')</label>
                </div>
            </div>-->


            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" id="ok" name="ok" required>
                    @lang('J\'accepte les termes et conditions de la politique de confidentialité.')
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                </label>
            </div>
            @component('components.button')
                @lang('Inscription')
            @endcomponent
        </form>
    @endcomponent
@endsection
