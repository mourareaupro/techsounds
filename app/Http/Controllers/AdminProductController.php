<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(){
        $products = Product::paginate(50);
        return view('back.products.index', compact('products'));
    }

    public function create(){

        return view('back.products.create');
    }

    public function edit($slug){

        $product = Product::where('slug' , $slug)->first();
        return view('back.products.edit' , compact('product'));
    }


    public function update(Request $request, $id){

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return view('back.products.edit' , compact('product'));
    }
}
