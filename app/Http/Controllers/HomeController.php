<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('active', 1)->take(3)->orderBy('post_date', 'DESC')->get();
        foreach($posts as $k => $post) {
            if($post->category->active != 1) {
                unset($posts[$k]);
            }
        }
        return view('home', [
            'posts' => $posts
        ]);
    }

    public function post($id) {
        $post = Post::find($id);
        return view('readpost', [
            'post' => $post
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
