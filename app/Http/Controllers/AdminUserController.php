<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(){

        $users = User::paginate(50);
        return view('back.users.index', compact('users'));
    }

    public function show($id){

        $user = User::findOrFail($id);
        return view('back.users.show', compact('user'));
    }
}
