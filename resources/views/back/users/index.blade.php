@extends('layouts.backend.master')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <th>Email</th>
                        <th>Name</th>
                        <th>Registered date</th>
                        <th>Actions</th>
                        <tbody>
                        @if($users->count())
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{!! link_to_route('admin.show.user', 'Show', [$user->id], ['class' => 'btn btn-primary']) !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="11">
                                    <div class="alert alert-info">
                                        <h4><i class="icon fa fa-info"></i> No results !  </h4>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
