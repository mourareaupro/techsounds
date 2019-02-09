@extends('layouts.backend.master')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{$product->name}}</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">


                    <div class="col-sm-3">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <img class="checkout-table-img" src="{{asset('/img/'.$product->image)}}" style="width: 200px; height: 200px" alt="Card image cap">
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('admin.udpate.product.image', $product->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="image">File input</label>
                                        <input type="file" id="image" name="image">
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" name="updateImage" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>


                    <div class="col-sm-9">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('admin.udpate.product', $product->id) }}">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    @include('back.products.partials.fields')
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" name="updateInformations" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>


                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop
