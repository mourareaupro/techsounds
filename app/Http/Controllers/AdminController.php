<?php

namespace App\Http\Controllers;

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

        return view('back.products.index');
    }

    public function addProduct(){

        return view('back.products.create');
    }

    public function posts(){

        return view('back.posts.index');
    }

    public function addPost(){

        return view('back.posts.create');
    }

    public function users(){

        return view('back.users.index');
    }

    public function orders(){

        return view('back.orders.index');
    }
}
