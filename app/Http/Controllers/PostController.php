<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        $posts = Post::orderBy('created_at')->get();
        return view('post.index', compact('posts'));        
    }

    public function add(Request $request) {
        
    }

    public function create(Request $request) {

    }
}
