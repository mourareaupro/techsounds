@extends('layouts.backend.master')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create a new product</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.store.product') }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price">
                        </div>


                        <div class="form-group">
                            <label for="name">Audio sample URL</label>
                            <input type="text" class="form-control" name="audio">
                        </div>

                        <h6 class="page-header">Audio</h6>
                        <div class="form-group col-md-4">
                            <label for="name">File Name</label>
                            <input type="text" class="form-control" name="file">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="name">Size</label>
                            <input type="text" class="form-control" name="size">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="updateInformations" class="btn btn-primary">Create product</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
