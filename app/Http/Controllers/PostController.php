<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('posts', [
            'posts' => $post
        ]); 
    }
    public function create()
    {
        $post = new Post();
        return view('post', [
            'post' => $post
        ]);
    }
    public function destroy(Request $request, $id)
    {
        print_r($id);
        $post = post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
    public function edit($id)
    {
        $post = post::find($id);

        return view('post', [
            'post' => $post
        ]);
    }
    public function store(Request $request){
        $post = new post();

        $rules = [
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255'
        ];

        $messages = [
            'name.required' => 'O nome deve estar preenchido',
            'name.min' => 'O nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O nome deve ter no máximo 255 caracteres',
            'description.required' => 'A descrição deve estar preenchido',
            'description.min' => 'A descrição deve ter no mínimo 3 caracteres',
            'description.max' => 'A descrição deve ter no máximo 255 caracteres',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $post->name = $request->input('name');
        $post->active = $request->input('active') == 'on' ? true : false;
        $post->description = $request->input('description');

        $post->save();
        return redirect()->route('categories.index');
    }
    public function update(Request $request, $id){
        $post = post::find($id);

        $rules = [
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255'
        ];

        $messages = [
            'name.required' => 'O nome deve estar preenchido',
            'name.min' => 'O nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O nome deve ter no máximo 255 caracteres',
            'description.required' => 'A descrição deve estar preenchido',
            'description.min' => 'A descrição deve ter no mínimo 3 caracteres',
            'description.max' => 'A descrição deve ter no máximo 255 caracteres',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $post->name = $request->input('name');
        $post->active = $request->input('active') == 'on' ? true : false;
        $post->active = $request->input('active') == 'on' ? true : false;
        $post->description = $request->input('description');

        $post->save();
        return redirect()->route('categories.index');
    }
}
