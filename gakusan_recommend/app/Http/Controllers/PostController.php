<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('welcome');
    }
}
