<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $data = Category::all();
        return view('admin.category.index',compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        Category::create($request->all());
        return back()->with('success','Data berhasil ditambahkan!');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        Category::find($category->id)->update($request->all());
        return back()->with('success','Data berhasil diupdate!');
    }

    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return back()->with('success','Data berhasil dihapus!');
    }
}
