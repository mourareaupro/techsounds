@component('mail::message')
# Order Received

Thank you for your order.

**Order ID:** {{ $order->id }}

**Order Email:** {{ $order->billing_email }}

**Order Name:** {{ $order->billing_name }}

**Order Total:** ${{ round($order->billing_total / 100, 2) }}

**Items Ordered**

@component('mail::table')
@foreach ($order->products as $product)
Name: {{ $product->name }} <br>
Price: ${{ round($product->price)}} <br>
@endforeach
@endcomponent

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
