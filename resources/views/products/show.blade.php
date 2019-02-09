@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="flash-cart" style="display: none">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm align-content-center">
                                <hr class="line-info">
                                <h4><span id="flash_success" class="text-white"></span>
                                    <a href="{{route('cart.index')}}" class="btn btn-info btn-round pull-right">View basket</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

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
            </div>
        </div>

        <!-- product detail -->
        <div class="row">
            <!-- img product -->
            <div class="col-sm-4">
                <img class="card-img-top" src="https://geo-media.beatport.com/image/6b73336c-5da1-4f89-8ad7-f50c07ebe997.jpg" alt="Card image cap">
                <div class="demo">
                    <ul>
                        <li>
                            <a data-url="{{$product->audio}}" data-link="product-sample" data-sampleid="4362" data-productid="{{$product->id}}"><i class="fas fa-play"></i></a>
                            Full Demo
                        </li>
                    </ul>
                </div>
            </div>

            <!-- product title and descirption -->
            <div class="col-sm-8"><hr class="line-info">
                <h1>{{$product->name}}
                    <span class="text-info">+</span> <span class="pull-right">@if(!$product->freeDownload()) {{presentPrice($product->price)}}@endif</span>
                </h1>
                <div class="card">
                    <div class="card-body">
                        @if(!$product->freeDownload())
                            <button id="add-to-cart" type="button" class="btn btn-info btn-lg text-center pull-right" data-id="{{ $product->id }}"><i class="tim-icons icon-simple-add"></i> Add to cart</button>
                        @else
                            <form action="{{route('product.free' , $product->id)}}" method="get">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-info btn-round btn-lg text-center pull-right">
                                    <i class="tim-icons icon-cloud-download-93"></i> Free download
                                </button>
                            </form>
                    @endif
                    <!-- product detail & buy link -->
                        <hr class="line-info">
                        <h2 class="card-title">Description</h2>

                        <div class="text contents">
                            {{$product->getProductDescription()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    @include('products.js.player')
    @include('products.js.ajax-cart')
@endsection

