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
            <div class="col-sm-3">
                <img class="card-img-top" src="{{asset('/img/'.$product->image)}}" style="width: 250px; height: 250px;" alt="{{$product->name}}">
                <div class="demo">
                    <ul>
                        <li>
                            <a data-url="{{$product->audio}}" data-link="product-sample" data-sampleid="4362" data-productid="{{$product->id}}"><i class="fas fa-play"></i></a>
                            Full Demo
                        </li>
                    </ul>
                </div>
            </div>

            <!-- product title and descirption -->
            <div class="col-sm-9"><hr class="line-info">
                <h1>{{$product->name}}
                    <span class="text-info">+</span> <span class="pull-right">@if(!$product->freeDownload()) {{presentPrice($product->price)}}@endif</span>
                </h1>

                <span class="text-white">Genre : </span><span class="text-info">Techno</span>

                <div class="spacer"></div>
                <div class="card">
                    <div class="card-body">
                        @if(!$product->freeDownload())
                            <button id="add-to-cart" type="button" class="btn btn-info btn-lg text-center pull-right" data-id="{{ $product->id }}"><i class="tim-icons icon-simple-add"></i> Add to cart</button>
                        @else
                            <form action="{{route('product.free' , $product->id)}}" method="get">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-info btn-round btn-lg text-center pull-right">
                                    <i class="tim-icons icon-cloud-download-93"></i> Free download
                                </button>
                            </form>
                    @endif
                    <!-- product detail & buy link -->
                        <hr class="line-info">
                        <h2 class="card-title">Description</h2>

                        <div class="text contents">
                            <span class="text-white">{{$product->getProductDescription()}}</span>
                        </div>
                    </div>
                </div>


                <div id="disqus_thread"></div>
                <script>

                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://technotutsplus.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    @include('products.js.player')
    @include('products.js.ajax-cart')
@endsection

