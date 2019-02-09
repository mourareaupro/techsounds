@extends('layouts.backend.master')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Posts</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Posts</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <th>Name</th>
                        <tbody>
                        @if($posts->count())
                            @foreach($posts as $post)
                                <tr>

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
