@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

    <div class="container">

        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <hr class="line-info">
        <h2 class="text-white">Checkout</h2>

        <div class="row">
            <div class="col-6">
                    <div class="spacer"></div>

                    <ul class="nav nav-pills nav-pills-primary" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
                                Pay with credit card (Stripe)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
                                Paypal
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content tab-space">
                        <div class="tab-pane active" id="link1" aria-expanded="true">

                        <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                            {{ csrf_field() }}

                            <!--<div class="form-group">
                                <label for="email">Email Address</label>
                                @if (auth()->user())
                                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                                @else
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                @endif
                            </div>-->

                            <div class="form-group">
                                <label for="name_on_card">Name on Card</label>
                                <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="" required>
                            </div>

                            <div class="form-group">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- a Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <div class="spacer"></div>
                            <button type="submit" id="complete-order" class="btn btn-info btn-round bt full-width">Complete Order</button>
                        </form>

                        </div>
                        <div class="tab-pane" id="link2" aria-expanded="false">
                            @if ($paypalToken)
                                <form method="post" id="paypal-payment-form" action="{{ route('checkout.paypal') }}">
                                    @csrf
                                    <section>
                                        <div class="bt-drop-in-wrapper">
                                            <div id="bt-dropin"></div>
                                        </div>
                                    </section>
                                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                                    <button class="btn btn-info btn-round bt full-width" type="submit"><span>Pay with PayPal</span></button>
                                </form>
                            @endif
                        </div>
                    </div>


                    <!-- payment logos -->
                    <div class="row text-center">
                        <div class="col-sm-2"><span class="text-white"><i class="fab fa-cc-stripe fa-3x"></i></span></div>
                        <div class="col-sm-2"><span class="text-white"><i class="fab fa-cc-visa fa-3x"></i></span></div>
                        <div class="col-sm-2"><span class="text-white"><i class="fab fa-cc-mastercard fa-3x"></i></span></div>
                        <div class="col-sm-2"><span class="text-white"><i class="fab fa-cc-paypal fa-3x"></i></span></div>
                    </div>
                    <!-- -->
            </div>
            <div class="col-6">
                <hr class="line-info">
                    <h3>Your Order</h3>

                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td><img class="checkout-table-img" src="https://geo-media.beatport.com/image/6b73336c-5da1-4f89-8ad7-f50c07ebe997.jpg" alt="Card image cap"></td>
                            <td>{{ $item->model->name }}</td>
                            <td class="text">{{ presentPrice($item->subtotal) }} €</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

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
                        {{ presentPrice(Cart::subtotal()) }} €<br>
                        @if (session()->has('coupon'))
                            -{{ presentPrice($discount) }} <br>&nbsp;<br>
                            <hr>
                            {{ presentPrice($newSubtotal) }} <br>
                        @endif
                        {{ presentPrice($newTax) }} €<br>
                        <span class="cart-totals-total">{{ presentPrice($newTotal) }} €</span>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>

    <div class="spacer"></div>

@endsection

@section('scripts')
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        (function(){
            // Create a Stripe client
            var stripe = Stripe('{{ config('services.stripe.key') }}');
            // Create an instance of Elements
            var elements = stripe.elements();
            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#e4faff',
                    lineHeight: '18px',
                    fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });
            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                // Disable the submit button to prevent repeated clicks
                document.getElementById('complete-order').disabled = true;
                var options = {
                    name: document.getElementById('name_on_card').value
                }
                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        // Enable the submit button
                        document.getElementById('complete-order').disabled = false;
                    } else {
                        // Send the token to your server
                        stripeTokenHandler(result.token);
                    }
                });
            });
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                // Submit the form
                form.submit();
            }
            // PayPal Stuff
            var form = document.querySelector('#paypal-payment-form');
            var client_token = "{{ $paypalToken }}";
            braintree.dropin.create({
                authorization: client_token,
                selector: '#bt-dropin',
                paypal: {
                    flow: 'vault'
                }
            }, function (createErr, instance) {
                if (createErr) {
                    console.log('Create Error', createErr);
                    return;
                }
                // remove credit card option
                var elem = document.querySelector('.braintree-option__card');
                elem.parentNode.removeChild(elem);
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    instance.requestPaymentMethod(function (err, payload) {
                        if (err) {
                            console.log('Request Payment Method Error', err);
                            return;
                        }
                        // Add the nonce to the form and submit
                        document.querySelector('#nonce').value = payload.nonce;
                        form.submit();
                    });
                });
            });
        })();
    </script>
@endsection

