<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        $posts = Post::with('person')->orderBy('created_at')->get();
        
        return view('post.index', compact('posts'));        
    }

    public function add(Request $request) {
        return view('post.add');
    }

    public function create(Request $request) {
        $validParam = $request->validate(Post::$rules);

        $post = new Post();
        $post->fill($validParam)->save();

        return redirect()->route('post.index');
    }

    public function person_index(Request $request, Person $person) {
        $posts = Post::whereBelongsTo($person)->get();
        $latest_post = $person->latestPost;
        $oldest_post = $person->oldestPost;
        return view('post.person_index', compact('posts', 'latest_post', 'oldest_post'));
    }
    
    public function even_index(Request $request) {
        $people = Person::whereRaw('id % 2 <> 0')->get();
        $posts = Post::whereBelongsTo($people)->get();
        return view('post.person_index', compact('posts'));
    }
}
