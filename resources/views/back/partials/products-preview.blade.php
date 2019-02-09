<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Latest Products</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <th></th>
                <th>Name</th>
                <th>Price</th>
                <th>Downloads</th>
                <th>Demo</th>
                <th>Size</th>
                <th>Actions</th>
                <tbody>
                @if($products->count())
                    @foreach($products as $product)
                        <tr>
                            <td colspan="1"><a href="#"><img class="checkout-table-img" src="{{asset('/img/'.$product->image)}}" style="width: 50px; height: 50px" alt="Card image cap"></a></td>
                            <td>{{$product->name}}</td>
                            <td class="text">@if($product->price === 0.00) <span class="text-info">Free</span> @else{{ presentPrice($product->price) }}@endif</td>
                            <td>{{$product->downloads}}</td>
                            <td>@if($product->audio)Yes @else No @endif</td>
                            <td>@if($product->size){{$product->size}} @else Unknow @endif</td>
                            <td>{!! link_to_route('admin.edit.product', 'Edit', [$product->slug], ['class' => 'btn btn-primary']) !!}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="11">
                            <div class="alert alert-info">
                                <h4><i class="icon fa fa-info"></i> No results !  </h4>
                            </div>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
</div>
