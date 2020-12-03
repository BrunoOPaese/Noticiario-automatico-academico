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
        $posts = Post::where('active', 1)->orderBy('post_date', 'DESC')->get();
        $final = [];
        $counter = 0;
        foreach($posts as $k => $post) {
            if($post->category->active != 1) unset($posts[$k]); 
            else {
                $counter ++;
                $final[] = $posts[$k];
            }
            if($counter == 3) break;
        }
        
        return view('home', [
            'posts' => $final
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
