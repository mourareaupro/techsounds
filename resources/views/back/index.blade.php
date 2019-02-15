@extends('layouts.backend.master')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="row">
    @include('back.partials.stats-preview')
    </div>


    <div class="row">
        <div class="col-md-12">
            @include('back.partials.orders-preview')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('back.partials.products-preview')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('back.partials.analytics-preview')
        </div>
    </div>



@stop

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'YOUR_ID', 'auto');
    ga('send', 'pageview');

</script>
