@extends('layouts.backend.master')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Samples</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Products</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <th></th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Downloads</th>
                        <th>Actions</th>
                        <tbody>
                        @if($products->count())
                            @foreach($products as $product)
                                <tr>
                                    <td colspan="1"><a href="#"><img class="checkout-table-img" src="https://geo-media.beatport.com/image/6b73336c-5da1-4f89-8ad7-f50c07ebe997.jpg" style="width: 50px; height: 50px" alt="Card image cap"></a></td>
                                    <td>{{$product->name}}</td>
                                    <td class="text">{{ presentPrice($product->price) }}</td>
                                    <td>{{$product->downloads}}</td>
                                    <td>{!! link_to_route('admin.edit.product', 'Edit', [$product->slug], ['class' => 'btn btn-primary']) !!}</td>
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
