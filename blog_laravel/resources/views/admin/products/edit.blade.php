@extends('layouts.admin');
@section('content')

<section>
<div class="container">
  <div class="row mb-2">
    <div class="col-sm-2">

    </div>
    <div class="col-sm-10">
      <h1>General Form</h1>
    </div>
    <div class="col-sm-12">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">General Form</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
</section>



<div class="container ">
  
 
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-10">
      @if(session()->has('message'))
      <div class="alert alert-danger">
       {{ session()->get('message') }}
      </div>
      @endif
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Product<a class="btn btn-info btn-sm" href="{{route('admin.product.index')}}" >back</a>
          </h3>
        </div>
        <form action="{{route('admin.product.update'.$product->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
         
          <div class="card-body">
            <div class="form-group">
              <label for="name_all">Product Name</label>
              <input type="text" name="name" class="form-control" id="name_all" value="{{$product->name}}">
              @error('name')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="price">Product Price</label>
              <input type="number" step="0.1" name="price" class="form-control" id="price" value="{{$product->price}}">
              @error('price')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="stock">Product Stock</label>
              <input type="text" name="stock" class="form-control" id="stock" value="{{$product->stock}}">
              @error('stock')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="image">Product image</label>
              <input type="file" name="image" class="form-control" id="image" value="{{$product->image}}">
              @error('image')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <img src="{{asset('assets/images/products/'.$product->image)}}" id="view_image" width="100px" height="100px" alt="">
            <div class="form-group">
              <label for="Category"> Category</label>
              <select name="category_id"class="form-control"  id="category_id">
                <option value="" selected disabled>Select Category</option>
                @foreach($all_category as $category)
                  <option value="{{$category->id}}" {{$product->id==$category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
              </select>
              @error('category_id')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="details">Product Details</label>
              <textarea name="details" id="details" class="form-control" value="{{$product->details}}"></textarea>
              @error('details')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="status">Status</label>
         <select name="status" id="status" class="form-control">
             <option value="1">Active</option>
             <option value="0">Deactive</option>
         </select>
              @error('status')
              <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
              </div>
            </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary ">Submit</button>
          </div>
        </form>
      </div>
     </div>
   </div>
 </div>
@endsection

@section( 'scripts')
 <script>
   $(document).on('change', '#image', function(){
     var file=event.target.file[0];
     var reader= new fileReader();
     reader.onload=function(e){
      
       $('#view_image').attr('src', e.target.result);
     }
     reader.readAsDataURL(file);
   });
 </script>
 @endsection