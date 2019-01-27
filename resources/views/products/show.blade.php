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
            </div>

            <!-- product title and descirption -->
            <div class="col-sm-8"><hr class="line-info">
                <h1>{{$product->name}}
                    <span class="text-info">+</span> <span class="pull-right">{{presentPrice($product->price)}}</span>
                </h1>
                <p class="text-white">{{$product->description}}</p>
            </div>
        </div>


        <div class="row">
            <!-- player -->
            <div class="col-sm-4">
                <div class="spacer"></div>
                <div class="demo">
                    <ul>
                        <li>
                            <a data-url="https://www.samplemagic.com/audio/samples/SM209%20-%20Breaks%20&%20Beats%20-%20Full%20Demo.mp3" data-link="product-sample" data-sampleid="4362" data-productid="{{$product->id}}"><i class="fas fa-play"></i></a>
                            Full Demo
                        </li>
                        <li>
                            <a data-url="https://www.samplemagic.com/audio/samples/SM%20Studio%20-%20Indie%20Rock%20Guitars%20-%20Full%20Demo.mp3" data-link="product-sample" data-sampleid="4363" data-productid="2671"><i class="fas fa-play"></i></a>
                            Breaks &amp; Beats Demo 1
                        </li>
                    </ul>
                </div>
            </div>
            <!-- player -->

            <!-- product detail & buy link -->
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <button id="add-to-cart" type="button" class="btn btn-info btn-lg text-center pull-right" data-id="{{ $product->id }}"><i class="tim-icons icon-simple-add"></i> Add to cart</button>

                        <!-- product detail & buy link -->
                        <hr class="line-info">
                        <h2 class="card-title">Description</h2>

                        <div class="text contents"><p><strong>Download Contains:</strong></p><ul><li>769 x 24-bit Wav files</li><li>340 x Apple Loops</li><li>340&nbsp;x Rex2 files</li><li>1 x Ableton Instrument Racks &amp; Projects for Ableton Live 9.7.7 (Melodic One Shots)</li><li>7 x FX Patches for Ableton Live 9.7.7</li></ul><div><p><strong>Drum Hits:</strong></p><ul><li>14 x Cymbals</li><li>57 x Foley</li><li>77 x Hats</li><li>91 x Kicks</li><li>45 x Percussion</li><li>78 x Snares</li><li>8 x Toms</li><li>5 x Custom Kits for Maschine 2 (2.7.8), Battery 4 (4.1.6), Kong (Reason 10.2), EXS24 (Logic 10.4.2), FPC (FL Studio 20.0.3) and Ableton Drum Rack (Live 9.7.7)</li><li>7 x Sampler Formats for Kontakt (5.8.1), NN-XT (Reason 10.2), EXS24 (Logic 10.4.2) and Ableton Drum Rack (Live 9.7.7)</li></ul></div></div>
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

