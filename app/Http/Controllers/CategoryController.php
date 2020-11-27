<?php

namespace App\Http\Controllers;

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
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->destroy();
        return redirect()->route('categories.index');
    }
    public function edit($id)
    {
        $category = Category::find($id);

        return view('category', [
            'category' => $category
        ]);
    }
}
