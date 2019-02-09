<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Latest Orders</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin">
                <th>Order</th>
                <th>Customer</th>
                <th>Price</th>
                <th>Date</th>
                <th>Actions</th>
                <tbody>
                @if($orders->count())
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->order_number}}</td>
                            <td>{{$order->user->email}}</td>
                            <td>{{ presentPrice($order->billing_total) }}</td>
                            <td>{{presentDate($order->created_at)}}</td>
                            <td>
                                <a class="nav-link btn btn-default d-none d-lg-block" href="{{route('orders.invoice' , $order)}}">
                                    <i class="tim-icons icon-cloud-download-93"></i> Invoice
                                </a>
                            </td>
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
