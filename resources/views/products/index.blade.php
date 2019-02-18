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

            $(this).css("display","none");
            $(this).next().css("display","inline-block");
            $("#play").css("display", "none");
            $("#pause").css("display", "block");

        });


        $( '.pause' ).click(function() {
            wavesurfer.pause();

            $(this).css("display","none");
            $(this).prev().css("display","inline-block");
            $("#play").css("display", "block");
            $("#pause").css("display", "none");

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
    </script>
@endsection

