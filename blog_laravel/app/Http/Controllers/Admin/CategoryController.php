<?php

namespace App\Http\Controllers\Admin;
use App\Models\Models\Category;
use Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
        
        $categories=Category::where('status', 1)->get();
        return view('admin.category.index', compact('categories'));
    }
    
    function create(){
        return view('admin.category.create');
    }

    function submit(Request $request){
        //dd($request->all());
        $request->validate([
          'name'=>'unique:categories,name',
        ]);
        $slug=Str::slug($request->name);
        $category=new Category();
        $category->name=$request->name;
        $category->slug=$slug;
        $category->status=$request->status;
        $category->save();
        return back()->with('message', 'Category create successfully');


    }
}
