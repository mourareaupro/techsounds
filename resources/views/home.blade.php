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
                <div class="col-lg-5 col-md-5">
                    <!--<img src="{{asset('img/etherum.png')}}" alt="Circle image" class="img-fluid">-->
                        <img src="https://geo-media.beatport.com/image/6b73336c-5da1-4f89-8ad7-f50c07ebe997.jpg" alt="Circle image" class="img-fluid">
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
            <div class="col-sm-4">
                <div class="card">
                    <!--<img class="card-img-top" src="{{ productImage($product->image) }}" alt="Card image cap">-->

                        <img class="card-img-top" src="https://geo-media.beatport.com/image/6b73336c-5da1-4f89-8ad7-f50c07ebe997.jpg" alt="Card image cap">

                        <div class="card-img-overlay text-center">
                            <button type="submit" class="btn btn-info btn-round btn-lg text-center">
                                <i class="tim-icons icon-simple-add"></i> Add to cart
                            </button>
                        </div>

                    <div class="card-body">
                        <hr class="line-info">
                        <h4 class="card-title"><a href="{{route('product.show' , $product->slug)}}"><span class="text-white">{{$product->name}}</span></a><span class="text pull-right"><i class="tim-icons icon-cloud-download-93 text-info"></i> {{$product->downloads}}</span></h4>

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







    <div class="player-section" style="display: block;">
        <div class="spacer"></div>
        <div class="container">
            <div class="row">

                <!-- player pause -->
                <div class="col-sm-1">
                    <a id="pause" href="#" class="btn-custom btn-pause bg-dark hide-text" rel="nofollow" style="display: none;">Pause</a>
                    <a id="play" href="#" class="btn-custom btn-play bg-dark hide-text" rel="nofollow" style="display: block;">Play</a>
                </div>
                <!-- waveform -->
                <div class="col-sm-9">
                    <div id="wavesurfer" class="player"></div>
                </div>
                <!-- waveform -->
                <!-- add to cart -->
                <div class="col-sm-1">
                    <a href="#" class="btn-custom btn-add-to-basket hide-text bg-dark" data-link="product-detail" rel="nofollow" data-product-id="2667">Add to basket</a>
                </div>
                <!-- add to cart -->
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

        //$(".player-section").css("display", "none");

        var wavesurfer = WaveSurfer.create({
            barWidth: 1,
            container: '#wavesurfer',
            cursorWidth: 0,
            dragSelection: true,
            height: 40,
            hideScrollbar: true,
            interact: true,
            normalize: true,
            waveColor: '#ffffff',
            progressColor: '#f4645f'
        });

        wavesurfer.load('https://www.samplemagic.com/audio/samples/SM209%20-%20Breaks%20&%20Beats%20-%20Full%20Demo.mp3');

        $('#play').click(function(){
            if( $(this).hasClass('load') ){
                $(this).removeClass('load');
                wavesurfer.load('https://www.samplemagic.com/audio/samples/SM209%20-%20Breaks%20&%20Beats%20-%20Full%20Demo.mp3');
            } else {
                $(".player-section").css("display", "block");
                $("#play").css("display", "none");
                $("#pause").css("display", "block");
                wavesurfer.play();
            }
        });


        $('#pause').click(function(){
                $("#play").css("display", "block");
                $("#pause").css("display", "none");
                wavesurfer.pause();
        });


    </script>
@endsection
