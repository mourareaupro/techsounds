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
                        <!-- featured -->
                            @include('partials.featured-section')
                        <!-- featured -->

                        <!-- new releases -->
                            @include('partials.new-releases')
                        <!-- new releases -->


                        <!-- free section -->
                            @include('partials.free-section')
                        <!-- free section -->

                    </div>
                </div><!-- left section -->

                <!-- chart -->
                    @include('partials.topcharts')
                <!-- chart -->

            </div><!-- row -->
            <!-- featured product -->


            @include('partials.footer-banner')


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
