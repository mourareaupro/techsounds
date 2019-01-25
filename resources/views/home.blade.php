@extends('layouts.app')

@section('content')

    <!-- flash -->
    <div class="flash-cart" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-sm text-center">
                    <hr class="line-info">
                    <h4><span id="flash_success" class="text-white"></span></h4>
                </div>
                <div class="col-sm">
                </div>
            </div>
        </div>
    </div>
    <!-- flash -->

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
                            <button id="add-to-cart" type="button" class="btn btn-info btn-round btn-lg text-center pull-right" data-id="{{ $featured_product->id }}"><i class="tim-icons icon-simple-add"></i> Add to cart</button>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <!--<img src="{{asset('img/etherum.png')}}" alt="Circle image" class="img-fluid">-->
                        <img src="https://geo-media.beatport.com/image/6b73336c-5da1-4f89-8ad7-f50c07ebe997.jpg" alt="Circle image" class="img-fluid">
                </div>



                <div class="col-lg-12">
                    <div class="card card-stats ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="tim-icons icon-cloud-download-93 text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                <!--<div class="card">
                    <!--<img class="card-img-top" src="{{ productImage($product->image) }}" alt="Card image cap">-->

                    <!--<div class="img">
                        <img class="card-img-top" src="https://geo-media.beatport.com/image/6b73336c-5da1-4f89-8ad7-f50c07ebe997.jpg" alt="Card image cap">
                        <div class="card-img-overlay  d-flex flex-column justify-content-top">
                                <button id="add-to-cart-{{$product->id}}" type="button" class="btn btn-info btn-lg text-center" data-id="{{ $product->id }}"><i class="icon-big tim-icons icon-cart"></i></button>
                        </div>
                    </div>


                    <div class="card-body">
                        <hr class="line-info">
                        <a href="{{route('product.show' , $product->slug)}}">
                            <h4 class="card-title">
                                <span class="text-white">{{$product->name}}</span>
                                <span class="text pull-right">
                                    <i class="tim-icons icon-cloud-download-93 text-info"></i>
                                    {{$product->downloads}}
                                </span>
                            </h4>
                        </a>
                        <p class="product-price">
                            {{presentPrice($product->price)}} €
                        </p>
                    </div>
                </div>-->


                    <div class="track  ">
                        <div class="img">
                            <div class="img-middle">
                                <a href="https://www.samplemagic.com/details/2672/dusty-and-dirty-tops" data-link="product-detail">
                                    <img src="https://geo-media.beatport.com/image/6b73336c-5da1-4f89-8ad7-f50c07ebe997.jpg" alt="Dusty and Dirty Tops">
                                </a>
                            </div>
                        </div>

                        <p class="product-title">
                            <a href="https://www.samplemagic.com/details/2672/dusty-and-dirty-tops" data-link="product-detail">Dusty and Dirty Tops</a>
                        </p>



                        <p class="product-price">
                            <span class="sale green">€14.92</span>
                            €10.44
                        </p>
                        <ul>
                            <li>
                                <a href="https://www.samplemagic.com/audio/samples/SM101 - Dusty &amp; Dirty Tops - Full Demo.mp3" class="btn-preview hide-text" data-link="product-sample" data-sampleid="4361" data-productid="2672">Preview</a>
                            </li>
                            <li><a href="https://www.samplemagic.com/details/2672/dusty-and-dirty-tops" class="btn-add-to-basket hide-text" data-product-id="2672">Add to basket</a></li>
                            <li><a href="https://www.samplemagic.com/details/2672/dusty-and-dirty-tops" class="btn-info hide-text" data-link="product-detail">Information</a></li>
                        </ul>
                    </div>
            </div>
            @endforeach
        </div><!-- row-->
    </div>

@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('button[id^="add-to-cart"]').click( function() {
            var product_id = $(this).data('id');
            var url= '../public/cart/' + product_id;

            $.ajax({
                type: "POST",
                url: url,
                data: { product_id: product_id , _token: '{{csrf_token()}}' },
                success: function (data) {
                    //update number items
                    $(".flash-cart").css("display", "block").fadeTo(2000, 500).slideUp(500, function(){
                        $("#flash-cart").slideUp(500);
                    });

                    $('#flash_success').html(data.message);
                    $('#cart-items-count').html(data.items);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    </script>
@endsection
