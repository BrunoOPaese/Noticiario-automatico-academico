<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::orderBy('post_date', 'desc')->get();

        return view('posts', [
            'posts' => $post
        ]); 
    }
    public function create()
    {
        $categories = Category::where('active', 1)->get();
        $post = new Post();
        return view('post', [
            'post' => $post,
            'categories' => $categories
        ]);
    }
    public function destroy(Request $request, $id)
    {
        print_r($id);
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('post', [
            'post' => $post,
            'categories' => $categories
        ]);
    }
    public function store(Request $request){
        $post = new post();

        $rules = [
            'title' => 'required|min:3|max:255',
            'sumary' => 'required|min:3|max:255',
            'text' => 'required|min:3'
        ];

        $messages = [
            'title.required' => 'O título deve estar preenchido',
            'title.min' => 'O título deve ter no mínimo 3 caracteres',
            'title.max' => 'O título deve ter no máximo 255 caracteres',
            'sumary.required' => 'O resumo deve estar preenchido',
            'sumary.min' => 'O resumo deve ter no mínimo 3 caracteres',
            'sumary.max' => 'O resumo deve ter no máximo 255 caracteres',
            'text.required' => 'O texto deve estar preenchido',
            'text.min' => 'O texto deve ter no mínimo 3 caracteres',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->post_date = $request->input('post_date');
        $post->category_id = $request->input('category_id');
        $post->sumary = $request->input('sumary');
        $post->active = $request->input('active') == 'on' ? true : false;
        

        $post->save();
        return redirect()->route('posts.index');
    }
    public function update(Request $request, $id){
        $post = Post::find($id);

        $rules = [
            'title' => 'required|min:3|max:255',
            'sumary' => 'required|min:3|max:255',
            'text' => 'required|min:3'
        ];

        $messages = [
            'title.required' => 'O título deve estar preenchido',
            'title.min' => 'O título deve ter no mínimo 3 caracteres',
            'title.max' => 'O título deve ter no máximo 255 caracteres',
            'sumary.required' => 'O resumo deve estar preenchido',
            'sumary.min' => 'O resumo deve ter no mínimo 3 caracteres',
            'sumary.max' => 'O resumo deve ter no máximo 255 caracteres',
            'text.required' => 'O texto deve estar preenchido',
            'text.min' => 'O texto deve ter no mínimo 3 caracteres',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->post_date = $request->input('post_date');
        $post->category_id = $request->input('category_id');
        $post->sumary = $request->input('sumary');
        $post->active = $request->input('active') == 'on' ? true : false;
        

        $post->save();
        return redirect()->route('posts.index');
    }
}
