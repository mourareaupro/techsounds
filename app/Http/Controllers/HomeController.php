<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SEO;

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
        SEO::setTitle('Sample Packs, Synth Presets, Templates,Courses for Electronic Music Producers');
        SEO::setDescription('Download techno sample packs, presets, loops. All professionally produced, royalty free and ready to drop into your projects.');
        SEO::opengraph()->setUrl('https://www.techsoundsplus.com');
        SEO::opengraph()->addProperty('type', 'website');
        SEO::twitter()->setSite('@techsoundsplus');

        $user = Auth::user();
        $products = Product::paginate(4);

        $featured_product = Product::where('featured' , 1)->first();

        $free_products = Product::where('price', '0.00')->paginate(4);

        $topdownloads = Product::orderBy('downloads' , 'DESC')->get();

        return view('home' , compact('products' , 'user' , 'featured_product' , 'free_products' , 'topdownloads'));
    }
}
