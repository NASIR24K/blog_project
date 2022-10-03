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
          <h3 class="card-title">Add Category<a class="btn btn-info btn-sm" href="{{route('admin.category.index')}}" >back</a>
          </h3>
        </div>
        <form action="{{route('admin.category.submit')}}" method="POST">
          @csrf
         
          <div class="card-body">
            <div class="form-group">
              <label for="name">Category Name</label>
              <input type="text" name="name" class="form-control" id="name" value="">
              @error('name')
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