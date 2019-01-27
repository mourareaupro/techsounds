<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();
        $products = Product::paginate(4);

        $featured_product = Product::where('featured' , 1)->first();

        $free_products = Product::where('price', '0.00')->paginate(4);

        $topdownloads = Product::orderBy('downloads' , 'DESC')->get();

        return view('home' , compact('products' , 'user' , 'featured_product' , 'free_products' , 'topdownloads'));
    }
}
