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
                            <a href="#">
                                <img src="{{asset('/img/'.$featured_product->image)}}"></a>
                            <div class="portfolio-overlay">
                                <div class="project-icons">
                                    <a id="product-route" href="{{route('product.show' , $product->slug)}}" data-id="{{ $product->id }}"><i class="fa fa-info"></i></a>
                                    <a class="play" data-url="{{$product->audio}}" data-link="product-sample" data-sampleid="4362" data-productid="{{$product->id}}"><i class="fa fa-play"></i></a>
                                    <a class="pause" data-url="{{$product->audio}}" data-link="product-sample" data-sampleid="4362" data-productid="{{$product->id}}"><i class="fa fa-pause"></i></a>
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
</div>