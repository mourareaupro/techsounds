<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\IpUtils;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMaintenance(Request $request, Application $app)
    {
        $maintenance = $app->isDownForMaintenance();
        $ipChecked = true;
        $ip = $request->ip();
        if($maintenance) {
            $data = json_decode(file_get_contents($app->storagePath().'/framework/down'), true);
            $ipChecked = isset($data['allowed']) && IpUtils::checkIp($ip, (array) $data['allowed']);
        }
        return view ('maintenance.maintenance', compact ('maintenance', 'ip', 'ipChecked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMaintenance(Request $request)
    {
        if($request->maintenance) {
            Artisan::call ('down', $request->ip ? ['--allow' => $request->ip()] : []);
        } else {
            Artisan::call ('up');
        }
        return redirect()->route('maintenance.index')->with ('ok', __ ('Le mode a bien été actualisé.'));
    }


    public function products(){
        $products = Product::paginate(50);
        return view('back.products.index', compact('products'));
    }

    public function addProduct(){

        return view('back.products.create');
    }

    public function editProduct($slug){

        $product = Product::where('slug' , $slug)->first();
        return view('back.products.edit' , compact('product'));
    }

    public function posts(){

        $posts = Post::paginate(50);
        return view('back.posts.index' , compact('posts'));
    }

    public function addPost(){

        return view('back.posts.create');
    }

    public function users(){

        $users = User::paginate(50);
        return view('back.users.index', compact('users'));
    }

    public function showUser($id){

        $user = User::findOrFail($id);
        return view('back.users.show', compact('user'));
    }

    public function orders(){

        $orders = Order::paginate(50);
        return view('back.orders.index' , compact('orders'));
    }
}
