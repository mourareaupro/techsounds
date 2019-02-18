@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-12">

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

                @if(count($products))
                    <div class="col-md-12">
                        <hr class="line-info">
                        <h1>{{$categoryName}}
                            <span class="text-info">+</span>
                        </h1>
                        <div class="container">
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-md-3">
                                        <div class="work-container">
                                            <div class="work-img">
                                                <a href="#">
                                                    <img src="{{asset('/img/'.$product->image)}}" alt="{{$product->name}}"></a>
                                                <div class="portfolio-overlay">
                                                    <div class="project-icons">
                                                        <a id="product-route" href="{{route('product.show' , $product->slug)}}" data-id="{{ $product->id }}"><i class="fa fa-info"></i></a>
                                                        <a class="play" data-url="{{$product->audio}}" data-link="product-sample" data-sampleid="4362" data-productid="{{$product->id}}"><i class="fa fa-play"></i></a>
                                                        <a class="pause" data-url="{{$product->audio}}" data-link="product-sample" data-sampleid="4362" data-productid="{{$product->id}}"><i class="fa fa-pause"></i></a>

                                                        @if(!$product->freeDownload())
                                                            <a id="add-to-cart-{{ $product->id }}" data-id="{{ $product->id }}"><i class="fa fa-shopping-cart"></i></a>
                                                        @else
                                                            <a id="product-route" href="{{route('product.free' , $product->id)}}" data-id="{{ $product->id }}"><i class="tim-icons icon-cloud-download-93"></i></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if(!$product->file)<span style="font-weight: bold">SOON</span>@endif
                                            </div>
                                            <div class="work-description">
                                                <hr class="line-info">
                                                <h5 class="pull-left">
                                                    <a href="{{route('product.show' , $product->slug)}}">{{$product->name}}
                                                    </a>
                                                </h5>
                                                <span class="text-white pull-right">Free</span>
                                            <!--<h4><span class="text-white card-price pull-right">
                                            {{presentPrice($product->price)}}
                                                </span>
                                                </h4>-->
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col-md-6 d-none d-md-block">
                        <h3 class="text-center">This section is coming soon, you can keep you update</h3>
                        <form action="{{ route('newsletter.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="email" name="email" class="form-control form-control-newsletter" placeholder="me@mail.com" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                <div class="input-group-append">
                                    <button class="btn btn-info" type="submit" id="button-addon2"><i class="fa fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
