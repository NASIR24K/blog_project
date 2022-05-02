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
        <span class="alert alert-danger ">  {{ session()->get('message') }}</span>
        @endif
    
    
        @if(session()->has('success'))
        <span class="alert alert-success">  {{ session()->get('success') }}</span>
        @endif
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Reset password</h3>
          
        </div>
        <form action="{{route('admin.reset.submit')}}" method="POST">
          @csrf
         
          <div class="card-body">
            <div class="form-group">
              <label for="old_password">Old Password</label>
              <input type="text" name="old_password" class="form-control" id="old_password" >
              @error('old_password')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="new_password">New Password</label>
              <input type="password" name="new_password" class="form-control" id="new_password">
              @error('new_password')
              <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                @error('confirm_password')
                <span class="text-danger">{{$message}}</span>
              @enderror
              </div>
              
            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>
        </form>
 
      </div>
     </div>
   </div>
 </div>
 
 












@endsection