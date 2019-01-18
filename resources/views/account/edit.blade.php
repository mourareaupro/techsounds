@extends('layouts.app')

@section('title', 'My Profile')

@section('content')


    <div class="container">
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
                        <ul class="nav nav-pills nav-pills-info flex-column">
                            <!--<li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Profile</a></li>-->
                            <li class="nav-item"><a class="nav-link active" href="#tab2" data-toggle="tab">Downloads</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab">Orders</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab4" data-toggle="tab">Subscriptions</a></li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content">
                            <!--<div class="tab-pane active" id="tab1">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <div class="form-group">
                                        <input id="name" type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div>Leave password blank to keep current password</div>
                                    <div class="spacer"></div>
                                    <div>
                                        <button type="submit" class="btn btn-info btn-round bt">Update Profile</button>
                                    </div>
                                </form>
                            </div>-->
                            <div class="tab-pane active" id="tab2">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Size</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($orders))
                                        @foreach($orders as $order)
                                            @if(count($order->products) >= 1)
                                                @foreach ($order->products as $product)
                                                    <tr>
                                                        <td>{{$product->name}}</td>
                                                        <td>{{$product->size}}</td>
                                                        <td>
                                                            @if(!$product->downloaded())
                                                            <a class="nav-link btn btn-default d-none d-lg-block" href="{{route('product.download' , $product)}}">
                                                                <i class="tim-icons icon-cloud-download-93"></i> Donwload
                                                            </a>
                                                            @else
                                                            <p>File downloaded.</p>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <p class="text-info">No downloads available</p>
                                            @endif
                                        @endforeach
                                    @else
                                        <tr>
                                            <td><p class="text-info">No downloads available</p></td>
                                        <tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Order date</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($orders))
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{$order->order_number}}</td>
                                                <td>{{presentDate($order->created_at)}}</td>
                                                <td>{{ presentPrice($order->billing_total) }}</td>
                                                <td>
                                                    <a class="nav-link btn btn-default d-none d-lg-block" href="{{route('orders.invoice' , $order)}}">
                                                        <i class="tim-icons icon-cloud-download-93"></i> Invoice
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td><p class="text-info">No ordrers</p></td>
                                        <tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="tab4">

                                    <p class="text-info">No subscriptions found</p>

                            </div>
                        </div>
                    </div>
                </div>

@endsection
