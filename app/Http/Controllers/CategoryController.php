<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Http\Requests\CategoryRequest;

use App\Models\category;

class CategoryController extends Controller
{
    public function index() {
        $categories = category::all();
        return view('category.home' , [
            'categories' => $categories,
        ]);
    }

    public function create() {
        return view('category.create');
    }

    public function store(CategoryRequest $request) {
        category::create([
            'name' => $request->input('name'),
            'slug' => Str::slug('category-'.$request->input('name')),
        ]);

        return redirect()->route('category.index')->with([
            'success' => 'New Category Create',
        ]);
    }

    public function edit($slug) {
        $category = category::where('slug' ,$slug)->first();
        return view('category.edit' , [
            'category' => $category,
        ]);
    }

    public function update(CategoryRequest $request , $slug) {
        $category = category::where('slug' , $slug)->first();

        $category->update([
            'name' => $request->input('name'),
            'slug' => Str::slug('category-'.$request->input('name')),
        ]);

        return redirect()->route('category.index')->with([
            'success' => 'New Updating!!',
        ]);
    }

    public function destroy($slug) {
        // $category = category::where('slug' , $slug)->first();
        // $category->delete();
        $to_delete = category::where('slug',$slug)->first();
        $to_delete->delete();
        // return redirect()->route('computers.index');
        return redirect()->route('category.index')->with([
            'success' => 'Category Delete!!',
        ]);
    }
}
