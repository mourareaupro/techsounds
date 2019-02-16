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
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at' , 'DESC')->paginate(5);
        $products = Product::orderBy('created_at' , 'DESC')->paginate(5);
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(1));

        foreach ($analyticsData as $data){
            //dd($data);

        }
        return view('back.index', compact('orders','products', 'analyticsData'));
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
}
