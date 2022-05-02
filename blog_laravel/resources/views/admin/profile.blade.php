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
    @if(session()->has('message'))
    <div class="alert alert-danger">
     {{ session()->get('message') }}
    </div>
    @endif
    <div class="col-sm-10">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Admin profile</h3>
          
        </div>
        <form action="{{route('admin.profile.submit')}}" method="POST" enctype="multipart/form-data">
          @csrf
         
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputName">Name</label>
              <input type="text" name="name" class="form-control" id="exampleInputName" value="{{$admin->name}}">
              @error('name')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$admin->email}}">
              @error('email')
              <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  
                </div>
                @if($admin->image)
                <img src="{{asset('assets/images/'.$admin->image)}}" alt="" class="">
                @endif
                @error('image')
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