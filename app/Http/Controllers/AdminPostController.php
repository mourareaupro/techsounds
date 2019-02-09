<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(){

        $posts = Post::paginate(50);
        return view('back.posts.index' , compact('posts'));
    }

    public function create(){

        return view('back.posts.create');
    }
}
