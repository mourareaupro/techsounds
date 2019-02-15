<!-- section right -->
<div class="col-md-4">
    <div class="card charts">
        <div class="card-body">
            <div class="card-title">
                <hr class="line-info">
                <h1 class="text-white">
                    TOP DOWNLOADS
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
                                            <img src="{{asset('/img/'.$product->image)}}" alt="{{$product->name}}"></a>
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
                                    <a href="{{route('product.show' , $product->slug)}}" class="text-white">{{$product->name}}</a>

                                    <div class="track_chart_actions">
                                        @if(!$product->freeDownload())
                                            <a id="add-to-cart-{{ $product->id }}" class="btn-add-to-basket" data-id="{{ $product->id }}">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span class="price pull-right">{{presentPrice($product->price)}}</span>
                                            </a>
                                        @else
                                            <form action="{{route('product.free' , $product->id)}}" method="get">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn-free-download">
                                                    <i class="text-white tim-icons icon-cloud-download-93"> </i>
                                                    <span class="text-white price pull-right">&nbsp;&nbsp;  Free download</span>
                                                </button>
                                            </form>
                                        @endif
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
