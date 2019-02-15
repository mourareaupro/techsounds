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

                @if (Cart::count() > 0)

                    <hr class="line-info">
                    <h1 class="text-white">Cart</h1>

                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Price</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (Cart::content() as $item)
                            <tr>
                                <td><a href="{{route('product.show' , $item->model->slug)}}"><img class="checkout-table-img" src="https://geo-media.beatport.com/image/6b73336c-5da1-4f89-8ad7-f50c07ebe997.jpg" alt="Card image cap"></a></td>
                                <td><a href="{{route('product.show' , $item->model->slug)}}" class="text-white">{{ $item->model->name }}</a></td>
                                <td class="text">{{ presentPrice($item->subtotal) }}</td>
                                <td class="td-actions text-right">

                                <!--<button id="delete-cart-item" type="button" class="btn btn-danger btn-simple btn-icon btn-sm" data-id="{{ $item->rowId }}"><i class="tim-icons icon-simple-remove"></i></button>-->

                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" rel="tooltip" class="btn btn-danger btn-simple btn-icon btn-sm">
                                                <i class="tim-icons icon-simple-remove"></i>
                                            </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>



                @if (! session()->has('coupon'))


                        <div class="row">
                            <div class="col-12 col-md-8"></div>
                            <div class="col-6 col-md-4">
                                <div class="form-inline">
                                    <p></p>
                                    <form action="{{ route('coupon.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="text" class="form-control col-lg-6" id="coupon_code">
                                        <button type="submit" class="btn btn-info btn-round bt pull-right">Apply</button>
                                    </form>
                                </div> <!-- end have-code-container -->
                            </div>
                        </div>

                        <div class="spacer"></div>

                        <div class="row">
                            <div class="col-sm-8">
                            </div>
                            <div class="col cart-totals-subtotal">
                                Subtotal <br>
                                @if (session()->has('coupon'))
                                    Code ({{ session()->get('coupon')['name'] }})
                                    <form action="{{ route('coupon.destroy') }}" method="POST" style="display:block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" style="font-size:14px;">Remove</button>
                                    </form>
                                    <hr>
                                    New Subtotal <br>
                                @endif
                                Tax ({{config('cart.tax')}}%)<br>
                                <span class="cart-totals-total">Total</span>
                            </div>
                            <div class="cart-totals-subtotal">
                                {{ presentPrice(Cart::subtotal()) }}<br>
                                @if (session()->has('coupon'))
                                    -{{ presentPrice($discount) }} <br>&nbsp;<br>
                                    <hr>
                                    {{ presentPrice($newSubtotal) }} <br>
                                @endif
                                {{ presentPrice($newTax) }}<br>
                                <span class="cart-totals-total">{{ presentPrice($newTotal) }}</span>
                            </div>
                        </div>

                        <div class="spacer"></div>

                        <div class="row">
                            <div class="col-sm-8">
                            </div>
                            <div class="col">
                                <a href="{{ route('checkout.index') }}" class="btn btn-info btn-round bt pull-right">Proceed to Checkout</a>
                            </div>
                        </div>
                @endif

            @else


            <h3 class="text-info">No items in Cart!</h3>

                <div class="text-left"><a href="{{ route('home') }}" class="button">Start Shopping</a></div>
            @endif
        </div>
@endsection

@section('scripts')
@include('products.js.ajax-cart')
@endsection
