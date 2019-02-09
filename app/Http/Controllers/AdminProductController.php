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

    public function updateImage(Request $request , $id){

        if($request->hasFile('image')) {

            $file = Input::file('image');
            $licencie = Licencies::findOrFail($id);

            $extension = $request->file('image')->getClientOriginalExtension();

            $fileName = explode('.', $licencie->lb_nom. '_' .$licencie->lb_prenom. '_' .$licencie->structure->nom_structure);
            $fileName = $fileName = str_replace(' ', '_', $fileName);
            $fileName =  $fileName[0];

            if(file_exists(public_path('../public/img/products/'.$fileName.'.'.$extension))){

                unlink(public_path('../public/img/products/'.$fileName.'.'.$extension));

                $file->move('uploads', 'new_'.$fileName.'.'.$extension);
                $licencie->lb_photo = 'new_'.$fileName.'.'.$extension;

            }else{

                $file->move('uploads', $fileName.'.'.$extension);
                $licencie->lb_photo = $fileName.'.'.$extension;
            }

            $licencie->save();

        }

        return back()->with('status', "Image updated");

    }
}
