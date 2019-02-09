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
                    <a id="product-route" href="{{route('product.show' , $featured_product->slug)}}" data-id="{{ $featured_product->id }}"><i class="fa fa-info"></i></a>
                    <a class="play" data-url="{{$featured_product->audio}}" data-link="product-sample" data-sampleid="4362" data-productid="{{$featured_product->id}}"><i class="fa fa-play"></i></a>
                    <a class="pause" data-url="{{$featured_product->audio}}" data-link="product-sample" data-sampleid="4362" data-productid="{{$featured_product->id}}"><i class="fa fa-pause"></i></a>

                    @if(!$featured_product->freeDownload())
                    <a id="add-to-cart-{{ $featured_product->id }}" data-id="{{ $featured_product->id }}"><i class="fa fa-shopping-cart"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>