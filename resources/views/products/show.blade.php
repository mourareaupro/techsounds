@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <div class="row">
                        <div class="col-md-4">
                            <hr class="line-info">
                            <h1>{{$product->name}}
                                <span class="text-info">+</span>
                            </h1>
                        </div>
                    </div>
            </div>
        </div>

        <!-- product detail -->
        <div class="row">
            <div class="col-sm-8"><span>col-sm-8</span></div>
            <div class="col-sm-4"><span>col-sm-4</span></div>
        </div>
        <div class="row">
            <div class="col-sm"><span>col-sm</span></div>
            <div class="col-sm"><span>col-sm</span></div>
            <div class="col-sm"><span>col-sm</span></div>
        </div>
        <!-- product detail-->

    </div>
@endsection
