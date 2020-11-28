<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('categories', [
            'categories' => $category
        ]); 
    }
    public function create()
    {
        $category = new Category();
        return view('category', [
            'category' => $category
        ]);
    }
    public function destroy(Request $request, $id)
    {
        print_r($id);
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
    public function edit($id)
    {
        $category = Category::find($id);

        return view('category', [
            'category' => $category
        ]);
    }
    public function store(Request $request){
        $category = new Category();

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

        $category->name = $request->input('name');
        $category->active = $request->input('active') == 'on' ? true : false;
        $category->description = $request->input('description');

        $category->save();
        return redirect()->route('categories.index');
    }
    public function update(Request $request, $id){
        $category = Category::find($id);

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

        $category->name = $request->input('name');
        $category->active = $request->input('active') == 'on' ? true : false;
        $category->description = $request->input('description');

        $category->save();
        return redirect()->route('categories.index');
    }
}
