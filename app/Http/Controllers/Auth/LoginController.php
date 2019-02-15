<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use http\Url;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Auth\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Artesaos\SEOTools\Facades\SEOMeta;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        SeoMeta::setTitle('Login');
        $this->middleware('guest')->except('logout');
        Session::put('backUrl', \Illuminate\Support\Facades\URL::previous());
    }

    public function redirectTo()
    {
        Alert::success('You are logged in', 'Have fun :)');
        return Session::get('backUrl') ? Session::get('backUrl') :   $this->redirectTo;
    }

}
