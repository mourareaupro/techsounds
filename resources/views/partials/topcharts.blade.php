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
                                        <a title="{{$product->name}}" href="{{route('product.show' , $product->slug)}}" class="track-info" data-link="product-detail">
                                            <img src="{{asset('/img/'.$featured_product->image)}}"></a>
                                        </a>
                                        <div class="track-overlay">
                                            <div class="play-icon">
                                                <a class="play" data-url="{{$product->audio}}" data-link="product-sample" data-sampleid="4362" data-productid="{{$product->id}}"><i class="fa fa-play"></i></a>
                                                <a class="pause" data-url="{{$product->audio}}" data-link="product-sample" data-sampleid="4362" data-productid="{{$product->id}}"><i class="fa fa-pause"></i></a>
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
</div>