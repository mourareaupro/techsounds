@extends('layouts.backend.master')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Orders</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Orders</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <th>Order</th>
                        <th>Customer</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Actions</th>
                        <tbody>
                        @if($orders->count())
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->order_number}}</td>
                                    <td>{{$order->user->email}}</td>
                                    <td>{{ presentPrice($order->billing_total) }}</td>
                                    <td>{{presentDate($order->created_at)}}</td>
                                    <td>
                                        <a class="nav-link btn btn-default d-none d-lg-block" href="{{route('orders.invoice' , $order)}}">
                                            <i class="tim-icons icon-cloud-download-93"></i> Invoice
                                        </a>
                                    </td>
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

