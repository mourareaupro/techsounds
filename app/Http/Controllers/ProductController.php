<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\UserDownload;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $categories = Category::all();

        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = 'Featured';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('products.index')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }

    public function indexSamples(){

        SEOMeta::setTitle('Samples');
        //SEOMeta::setDescription('Download Royalty Free Ableton Live Templates and learn the latest music production techniques.');
        SEOMeta::addKeyword(['Techno samples', 'techno soundbank' , 'music samples']);

        $categorie = Category::where('slug' , 'samples')->first();

        $products = Product::with('categories')->whereHas('categories', function ($query) use ($categorie) {
            $query->where('slug', $categorie->slug);
        })->get();

        return view('products.index')->with([
            'products' => $products,
            'categoryName' => $categorie->name,
        ]);
    }

    public function indexSynths(){

        SEOMeta::setTitle('Synth Presets');
        //SEOMeta::setDescription('Download Royalty Free Ableton Live Templates and learn the latest music production techniques.');
        SEOMeta::addKeyword(['Techno Courses', 'Music courses' , 'Techno courses']);
        $categorie = Category::where('slug' , 'synths')->first();

        $products = Product::with('categories')->whereHas('categories', function ($query) use ($categorie) {
            $query->where('slug', $categorie->slug);
        })->get();

        return view('products.index')->with([
            'products' => $products,
            'categoryName' => $categorie->name,
        ]);


    }

    public function indexCourses(){

        SEOMeta::setTitle('Courses');
        //SEOMeta::setDescription('Download Royalty Free Ableton Live Templates and learn the latest music production techniques.');
        SEOMeta::addKeyword(['Techno Courses', 'Music courses' , 'Techno courses' , 'techno tutorial']);

        $categorie = Category::where('slug' , 'courses')->first();

        $products = Product::with('categories')->whereHas('categories', function ($query) use ($categorie) {
            $query->where('slug', $categorie->slug);
        })->get();

        return view('products.index')->with([
            'products' => $products,
            'categoryName' => $categorie->name,
        ]);

    }

    public function indexTemplates(){

        SEOMeta::setTitle('Ableton Templates');
        SEOMeta::setDescription('Download Royalty Free Ableton Live Templates and learn the latest music production techniques.');
        SEOMeta::addKeyword(['ableton', 'ableton templates' , 'abelton techno']);

        $categorie = Category::where('slug' , 'templates')->first();

        $products = Product::with('categories')->whereHas('categories', function ($query) use ($categorie) {
            $query->where('slug', $categorie->slug);
        })->get();

        return view('products.index')->with([
            'products' => $products,
            'categoryName' => $categorie->name,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        SEOMeta::setTitle($product->name);
        SEOMeta::setDescription($product->description);
        SEOMeta::addKeyword(['samples', 'techno music samples']);

        return view('products.show' , compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download(Product $product){

        $user_download = UserDownload::where('user_id' , auth()->user()->id)->where('product_id' , $product->id)->exists();

        if(!$user_download && $product->file){

            $user_download = new UserDownload();
            $user_download->user_id = auth()->user()->id;
            $user_download->product_id = $product->id;
            $user_download->save();

            $product->downloads = $product->downloads + 1;
            $product->save();

            return Storage::disk('s3')->download($product->file);

        }else{

            die;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function freeDownload(Product $product){

        $user_download = UserDownload::where('user_id' , auth()->user()->id)->where('product_id' , $product->id)->exists();

        if(!$user_download && $product->file && Storage::disk('s3')->exists($product->file)){

            $user_download = new UserDownload();
            $user_download->user_id = auth()->user()->id;
            $user_download->product_id = $product->id;
            $user_download->save();

            $product->downloads = $product->downloads + 1;
            $product->save();

            return Storage::disk('s3')->download($product->file);

        }else{

            Alert::error('Download error', 'you already downloaded this sample pack');
            return back();
        }
    }


    public function getAjaxProduct(Request $request, $id){

        $product = Product::where('id', $id)->firstOrFail();

        $view = view('products.ajaxView',compact('product'))->render();

        return response()->json(['html'=>$view]);
    }
}
