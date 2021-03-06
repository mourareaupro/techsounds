@extends('layouts.backend.master')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{$user->email}}</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{$user->name}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
