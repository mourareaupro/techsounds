<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserDownload;
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
        $products = Product::all();
        
        return view('products.index' , compact('products'));
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
    public function show(Product $product)
    {
        return view('product.show' , compact('product'));
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

        if(!$user_download && $product->file){

            $user_download = new UserDownload();
            $user_download->user_id = auth()->user()->id;
            $user_download->product_id = $product->id;
            $user_download->save();

            $product->downloads = $product->downloads + 1;
            $product->save();

            return Storage::disk('s3')->download($product->file);

        }else{

            Alert::error('Download error', 'file not found');
            return back();
        }
    }
}
