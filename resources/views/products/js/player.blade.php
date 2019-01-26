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

    $( "a" ).click(function() {

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


</script>
