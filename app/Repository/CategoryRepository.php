<?php

namespace App\Repository;

use App\Interfaces\CategoryInterface;
use App\Interfaces\CrudInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository
{
    public function index(){
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }
    public function create(){
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::create($validatedData);
        return view('categories.index',with(['success' => 'Category created successfully']));
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::findOrFail($id);
        $category->update($validatedData);
        return view('categories.index',with(['success' => 'Category updated successfully']));
    }
    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return view('categories.index',with(['success' => 'Category deleted successfully']));
    }
}
