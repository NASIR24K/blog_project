<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    <h1>Admin Login</h1>
    <div class="container">
        <div class="row m-5 justify-content-center">
            
        {{--   @if(Session::has('login_error'))
            <div class="alert alert-error">
                {{Session::get('login_error')}}
            @php
            Session::forget('login_error');
            @endphp --}}
            @if(session()->has('login_error'))
          <div class="alert alert-danger">
           {{ session()->get('login_error') }}
        </div>
           @endif
           
       
            <div class="col-md-6  border">
            <div class="form-group">
                <form action="{{route('admin.login.submit')}}" method="POST" >
                    @csrf
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4">
                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4" >
                    @if ($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                  </div>
                  <button type="submit" class="btn btn-primary mt-3 ">login</button>
                  <a href="" class="btn btn-secondary">Forget_password</a>
                </form>
            </div>
        </div>
    </div>




    <script type="text/javascript" src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}" ></script>

</body>
</html>