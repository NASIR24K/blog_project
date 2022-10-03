<?php

namespace App\Http\Controllers\Admin;
use App\Models\Models\Product;
use App\Models\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    function index(){
        $products=Product::get();
        return view('admin.products.index', compact('products'));
    }
    
    function create(){
        $all_category=Category::where('status', 1)->get();
        return view('admin.products.create', compact('all_category'));
    }

    function submit(Request $request){
     //dd($request->all());
     $request->validate([
        'name'=>'unique:products,name',
         'category_id'=>'required',
         'price'=>'required|min:0',
         'stock'=>'required|min:0',
         'image'=>'required|mimes:jpg,png',
         'details'=>'required',
     ]);
     
       $data= $request->all();
       $data['slug']=Str::slug($request->name);
       //$slug=Str::slug($request->name);

     if($request->hasFile('image')){
       $image=$request->image;
       $img_name=Str::random(6). '.' .$image->getClientOriginalExtension();
       $image->move('assets/images/products', $img_name);
       $data['image']=$img_name;
     }
     $product= new product();
     $product->create($data);
     return back()->with('message', 'Product create successfully');

/*      $product->name=$request->name;
     $product->slug=$slug;
     $product->price=$request->price;
     $product->stock=$request->stock;
     $product->category_id=$request->category_id;
     $product->image=$img_name;
     $product->status=$request->status;
     $product->details=$request->details;
     $product->save(); */
     //return back()->withSuccessMessage('Insert Data Successfully');
    }
    function edit($slug){
      $all_category=Category::where('status', 1)->get();
      $product=Product::where('slug', $slug)->first();
      return view('admin.products.edit', compact('all_category', 'product'));
    }

    function update(Request $request, $id){
       
      $request->validate([
        'name'=>'unique:products,name'.$id,
         'category_id'=>'required',
         'price'=>'required|min:0',
         'stock'=>'required|min:0',
         'image'=>'required|mimes:jpg,png',
         'details'=>'required',
     ]);
     $data= $request->all();
     $data['slug']=Str::slug($request->name);
     $product=Product::where('id', $id)->first();

   if($request->hasFile('image')){
     @unlink('assets/images/products/',$product->id);
     $image=$request->image;
     $img_name=Str::random(6). '.' .$image->getClientOriginalExtension();
     $image->move('assets/images/products', $img_name);
     $data['image']=$img_name;
   }
   $product->update($data);
    return back()->withSuccessMessage('Insert Data Successfully');

    }
}
