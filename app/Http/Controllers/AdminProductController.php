<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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


        if ($request->has('updateImage')) {

            $file = Input::file('image');

            if($file){
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileName = explode('.', $request->file('image')->getClientOriginalName());
                $fileName =  $fileName[0];
                $file->move('img/products', $fileName.'.'.$extension);
                $product->image = 'products/'.$fileName.'.'.$extension;
                $product->save();

                return view('back.products.edit' , compact('product'));
            }
        }

        $product->update($request->all());


        return view('back.products.edit' , compact('product'));
    }
}
