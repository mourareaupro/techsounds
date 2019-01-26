@extends('layouts.app')

@section('content')

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
                    <div class="work-container">
                        <div class="work-img">
                            <a href="https://www.sampletoolsbycr2.com/product/dirty-house-2/">
                                <img width="500" height="340" src="https://geo-media.beatport.com/image/6b73336c-5da1-4f89-8ad7-f50c07ebe997.jpg"></a>
                            <div class="portfolio-overlay">
                                <div class="project-icons">
                                    <a href="{{route('product.show' , $featured_product->slug)}}"><i class="fa fa-info"></i></a>
                                    <a class="play" data-url="https://www.samplemagic.com/audio/samples/SM209%20-%20Breaks%20&%20Beats%20-%20Full%20Demo.mp3" data-product-id="#" data-audio="#"><i class="fa fa-play"></i></a>
                                    <a id="add-to-cart-{{ $featured_product->id }}" data-id="{{ $featured_product->id }}"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- featured product -->
        </div>
    </div><!-- page header -->

    <div class="spacer"></div>

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
                        <h1>New releases
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
            <div class="col-xs-6 col-sm-4 col-md-15 work-item">
                    <div class="work-container">
                        <div class="work-img">
                            <a href="https://www.sampletoolsbycr2.com/product/dirty-house-2/">
                                <img height="340" src="https://geo-media.beatport.com/image/6b73336c-5da1-4f89-8ad7-f50c07ebe997.jpg"></a>
                            <div class="portfolio-overlay">
                                <div class="project-icons">
                                    <a id="product-route" href="{{route('product.show' , $product->slug)}}" data-id="{{ $product->id }}"><i class="fa fa-info"></i></a>
                                    <a class="play" data-url="https://www.samplemagic.com/audio/samples/SM209%20-%20Breaks%20&%20Beats%20-%20Full%20Demo.mp3" data-link="product-sample" data-sampleid="4362" data-productid="{{$product->id}}"><i class="fa fa-play"></i></a>
                                    <a id="add-to-cart-{{ $product->id }}" data-id="{{ $product->id }}"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="work-description">
                            <hr class="line-info">
                            <h4><a href="{{route('product.show' , $product->slug)}}">{{$product->name}}</a><span class="text-white card-price pull-right">
                                {{presentPrice($product->price)}}
                            </span></h4>

                        </div>
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
            top:20,
            hideScrollbar: true,
            interact: true,
            normalize: true,
            waveColor: '#ffffff',
            progressColor: '#f4645f'
        });

        $( '.play' ).click(function() {

            var track = $(this).attr("data-url");
            var product = $(this).attr("data-productid");

            if(product){
                $('#cart-player').attr('data-product-id', product);
            }

            if(track){
                wavesurfer.load(track);
                $(".player-section").css("display", "block");
            }
        });

        wavesurfer.on('loading', function (percents, eventTarget) {
            if (percents < 100) {
                $("#loading").css("display", "block");
            }else{
                $("#loading").css("display", "none");
            }
        });

        wavesurfer.on('ready', function () {
            wavesurfer.play();
            $("#play").css("display", "none");
            $("#pause").css("display", "block");

            wavesurfer.setVolume($('#volume-slider').val() / 100);
        });

        $('#play').click(function(){
            if( $(this).hasClass('load') ){
                $(this).removeClass('load');
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


        $('#volume-slider').on('input change', function() {
            wavesurfer.setVolume($('#volume-slider').val() / 100);
            if(parseInt($('#volume-slider').val()) == 0) {
                wavesurfer.setMute(true);
            }
            else {
                wavesurfer.setMute(false);
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('a[id^="add-to-cart"]').click( function() {
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
                    $('#cart-total').html(data.total);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });


        $('a[id^="cart-player"]').click( function() {
            var product_id = $(this).attr('data-product-id');
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
                    $('#cart-total').html(data.total);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });



        // $('a[id^="product-route"]').click( function() {
        //     var product_id = $(this).attr('data-id');
        //
        //     $.ajax({
        //         type: "GET",
        //         url: '../public/ajax/product/' + product_id,
        //         data: { product_id: product_id },
        //         success: function (data) {
        //
        //             console.log('sucess');
        //             $('.container').html(data.html);
        //         },
        //         error: function (data) {
        //             console.log('Error:', data);
        //         }
        //     });
        //
        // });
    </script>
@endsection
