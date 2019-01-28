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

        <div class="container">
            <!-- featured product -->
            <div class="row">

                <!-- left section -->
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-8">
                            <hr class="line-info">
                            <h1 class="text-white"><a href="{{route('product.show' , $featured_product->slug)}}"><span class="text-white">{{$featured_product->name}}</span></a>
                                <br/>
                            </h1>
                            <p class="text-white mb-3">{{$featured_product->description}}</p>
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
                        <div class="col-sm-4">
                            <div class="work-container">
                                <div class="work-img">
                                    <a href="{{route('product.show' , $featured_product->slug)}}">
                                        <img src="{{asset('/img/'.$featured_product->image)}}"></a>
                                    <div class="portfolio-overlay">
                                        <div class="project-icons">
                                            <a href="{{route('product.show' , $featured_product->slug)}}"><i class="fa fa-info"></i></a>
                                            <a class="play" data-url="{{$featured_product->audio}}" data-product-id="#" data-audio="#"><i class="fa fa-play"></i></a>
                                            <a id="add-to-cart-{{ $featured_product->id }}" data-id="{{ $featured_product->id }}"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- new releases -->
                        <div class="col-md-12">
                            <hr class="line-info">
                            <h3>New releases
                                <span class="text-info">+</span>
                            </h3>
                            <div class="container">
                                <div class="row">
                                @foreach($products as $product)
                                    <div class="col-md-3">
                                        <div class="work-container">
                                            <div class="work-img">
                                                <a href="https://www.sampletoolsbycr2.com/product/dirty-house-2/">
                                                    <img src="{{asset('/img/'.$featured_product->image)}}"></a>
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
                                                <h5 class="pull-left">
                                                    <a href="{{route('product.show' , $product->slug)}}">{{$product->name}}
                                                    </a>
                                                </h5>
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
                        </div><!-- new releases -->


                        <!-- free section -->
                        <div class="col-md-12">
                            <hr class="line-info">
                            <h3>Free downloads
                                <span class="text-info">+</span>
                            </h3>
                            <div class="container">
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="col-md-3">
                                            <div class="work-container">
                                                <div class="work-img">
                                                    <a href="https://www.sampletoolsbycr2.com/product/dirty-house-2/">
                                                        <img src="{{asset('/img/'.$featured_product->image)}}"></a>
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
                                                    <h5 class="pull-left">
                                                        <a href="{{route('product.show' , $product->slug)}}">{{$product->name}}
                                                        </a>
                                                    </h5>
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
                        </div><!-- free section -->

                    </div>
                </div><!-- left section -->





                <!-- section right -->
                <div class="col-md-4">
                    <div class="card charts">
                        <div class="card-body">
                            <div class="card-title">
                                <hr class="line-info">
                                <h1 class="text-white">
                                    TOP 10
                                </h1>
                            </div>
                            <div class="card-body">
                                    @php $rank = 1 @endphp

                                    @foreach($topdownloads as $product)
                                        <div class="container">
                                            <div class="tracks_chart">
                                                <div class="row">
                                                        <div class="col-sm-4 pull-left">
                                                            <div class="img">
                                                                <a title="Ableton Magic Racks: Vaporwave Racks" href="{{route('product.show' , $product->slug)}}" class="track-info" data-link="product-detail">
                                                                    <img src="{{asset('/img/'.$featured_product->image)}}"></a>
                                                                </a>
                                                                <div class="track-overlay">
                                                                    <div class="play-icon">
                                                                        <a class="play" data-url="https://www.samplemagic.com/audio/samples/SM209%20-%20Breaks%20&%20Beats%20-%20Full%20Demo.mp3" data-link="product-sample" data-sampleid="4362" data-productid="{{$product->id}}"><i class="fa fa-play"></i></a>
                                                                        <a class="pause" data-url="https://www.samplemagic.com/audio/samples/SM209%20-%20Breaks%20&%20Beats%20-%20Full%20Demo.mp3" data-link="product-sample" data-sampleid="4362" data-productid="{{$product->id}}"><i class="fa fa-pause"></i></a>
                                                                    </div>
                                                                </div>
                                                                <span>{{$rank++}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm pull-right">
                                                            <span class="title">{{$product->name}}</span>

                                                            <div class="track_chart_actions">
                                                                <a id="add-to-cart-{{ $product->id }}" class="btn-add-to-basket" data-id="{{ $product->id }}"><i class="fa fa-shopping-cart"></i>
                                                                    <span class="price pull-right">{{presentPrice($product->price)}}
                                                                    </span>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="spacer"></div>
                                    @endforeach

                            </div>
                        </div>
                    </div>


                    <div class="card card-stats">
                        <div class="card-body">
                            <div class="card-title">
                                <hr class="line-info">
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- section right -->

            </div><!-- row -->
            <!-- featured product -->

    </div><!-- page header -->

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
