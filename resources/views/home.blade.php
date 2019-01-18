@extends('layouts.app')

@section('content')


    <div class="page-header">
        <img src="{{asset('img/blob.png')}}" class="path">
        <div class="content-center">

            <!-- featured product -->
            <div class="row row-grid justify-content-between align-items-center text-left">
                <div class="col-lg-6 col-md-6">
                    <hr class="line-info">
                    <h1 class="text-white"><a href="{{route('product.show' , $featured_product->slug)}}"><span class="text-white">{{$featured_product->name}}</span></a>
                        <br/>
                    </h1>
                    <p class="text-white mb-3">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel...</p>
                    <div class="btn-wrapper mb-3">
                        @if($featured_product->freeDownload())
                            <form action="{{route('product.free' , $featured_product->id)}}" method="get">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-info btn-round btn-lg text-center">
                                    <i class="tim-icons icon-cloud-download-93"></i> Free download
                                </button>
                            </form>
                        @else
                            <form action="{{route('cart.store' , $featured_product->id)}}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-info btn-round btn-lg text-center">
                                    <i class="tim-icons icon-simple-add"></i> Add to cart
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <img src="{{asset('img/etherum.png')}}" alt="Circle image" class="img-fluid">
                </div>



                <!--<div class="col-lg-12">
                    <div class="card card-stats ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="tim-icons icon-cloud-download-93 text-info"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-title"><i class="tim-icons icon-cloud-download-93 text-info"></i><span class="counter-count"> {{$products->sum('downloads')}}</span></p>
                                        </p><p>
                                        </p><p class="card-category">Downloads</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
            <!-- featured product -->
        </div>
    </div><!-- page header -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('success_message'))
                    <div class="spacer"></div>
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="spacer"></div>
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="spacer"></div>

                <div class="row">
                    <div class="col-md-4">
                        <hr class="line-info">
                        <h1>Samples
                            <span class="text-info">+</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- products list -->
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm">
                <div class="card">
                    <img class="card-img-top" src="{{ productImage($product->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <hr class="line-info">
                        <h4 class="card-title">{{$product->name}}<span class="text pull-right"><i class="tim-icons icon-cloud-download-93 text-info"></i> {{$product->downloads}}</span></h4>

                        <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                        <!-- form add to cart -->
                        <div class="form-row text-center">
                            <div class="col-12">
                                <form action="{{route('cart.store' , $product)}}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-info btn-round btn-lg text-center">
                                        <i class="tim-icons icon-simple-add"></i> Add to cart
                                    </button>

                                </form>
                            </div>
                        </div><!-- end form -->
                    </div>
                </div>
            </div>
            @endforeach
        </div><!-- row-->
    </div>

@endsection
