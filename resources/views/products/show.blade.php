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
                    <span class="text-info">+</span>
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
                            <a href="https://www.samplemagic.com/audio/samples/SM209 - Breaks &amp; Beats - Full Demo.mp3" class="btn-play bg-dark hide-text" data-link="product-sample" data-sampleid="4362" data-productid="2671">Play</a>
                            Full Demo
                        </li>
                        <li>
                            <a href="https://www.samplemagic.com/audio/samples/SM209 - Breaks &amp; Beats - Beats Demo 1.mp3" class="btn-play bg-dark hide-text" data-link="product-sample" data-sampleid="4363" data-productid="2671">Play</a>
                            Breaks &amp; Beats Demo 1
                        </li>
                        <li>
                            <a href="https://www.samplemagic.com/audio/samples/SM209 - Breaks &amp; Beats - Beats Demo 2.mp3" class="btn-play bg-dark hide-text" data-link="product-sample" data-sampleid="4364" data-productid="2671">Play</a>
                            Breaks &amp; Beats Demo 2
                        </li>
                    </ul>
                </div>
            </div>
            <!-- player -->

            <!-- product detail & buy link -->
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <!-- add to cart -->
                        <form action="{{route('cart.store' , $product)}}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-info btn-lg text-center pull-right">
                                <i class="tim-icons icon-simple-add"></i> Add to cart
                            </button>
                        </form>
                        <!-- product detail & buy link -->
                        <hr class="line-info">
                        <h2 class="card-title">Description</h2>

                        <div class="text contents"><p><strong>Download Contains:</strong></p><ul><li>769 x 24-bit Wav files</li><li>340 x Apple Loops</li><li>340&nbsp;x Rex2 files</li><li>1 x Ableton Instrument Racks &amp; Projects for Ableton Live 9.7.7 (Melodic One Shots)</li><li>7 x FX Patches for Ableton Live 9.7.7</li></ul><div><p><strong>Drum Hits:</strong></p><ul><li>14 x Cymbals</li><li>57 x Foley</li><li>77 x Hats</li><li>91 x Kicks</li><li>45 x Percussion</li><li>78 x Snares</li><li>8 x Toms</li><li>5 x Custom Kits for Maschine 2 (2.7.8), Battery 4 (4.1.6), Kong (Reason 10.2), EXS24 (Logic 10.4.2), FPC (FL Studio 20.0.3) and Ableton Drum Rack (Live 9.7.7)</li><li>7 x Sampler Formats for Kontakt (5.8.1), NN-XT (Reason 10.2), EXS24 (Logic 10.4.2) and Ableton Drum Rack (Live 9.7.7)</li></ul></div></div>
                    </div>
                </div>
            </div>
        </div>
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

