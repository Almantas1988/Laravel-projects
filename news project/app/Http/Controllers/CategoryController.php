<?php

namespace App\Http\Controllers;

use App\Category;
use App\NewsCategories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        //
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
        $category = Category::find($id);

        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
