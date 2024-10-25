<?php

namespace App\Repository\Web;

use App\Interfaces\CategoryInterface;
use App\Interfaces\CrudInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Category::create($validatedData);
        return redirect()->route('categories.indexWeb')->with(['successCreate' => 'تم إضافة النوع بنجاح']);
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::findOrFail($id);
        $category->update($validatedData);
        return redirect()->route('categories.indexWeb')->with(['successUpdate' => 'تم تعديل النوع بنجاح']);
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.indexWeb')->with('successDelete', 'تم حذف النوع بنجاح');
    }
}
