<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $category=Category::all();
        return view('admin.category.index',compact('category'));
     }
    public function store(Request $request) {
        $category=new Category();
        $category->name=$request->category;
        $category->save();
        return redirect('/category')->with('success', 'Category saved!');
      
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/category')->with('success', 'Category deleted!');
    }

    //
}
