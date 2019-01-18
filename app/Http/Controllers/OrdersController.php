<?php

namespace App\Http\Controllers;

use App\Models\Order;
use PDF;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()->orders()->with('products')->get();

        return view('orders.index')->with('orders', $orders);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if (auth()->id() !== $order->user_id) {
            return back()->withErrors('You do not have access to this!');
        }

        $products = $order->products;
        $orders = auth()->user()->orders()->with('products')->get();

        return view('orders.show')->with([
            'order' => $order,
            'products' => $products,
            'user' => auth()->user(),
            'orders' => $orders,
        ]);
    }

    public function invoicePDF(Order $order){

        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('invoices.invoicePDF', $data);

        return $pdf->download($order->order_number.'_invoice.pdf');

    }

}
