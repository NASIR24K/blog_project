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
            
            @if(session()->has('login_error'))
          <div class="alert alert-danger">
           {{ session()->get('login_error') }}
        </div>
           @endif
           
       
            <div class="col-md-6  border">
                <form action="{{route('admin.forget.submit')}}" method="POST" >
                    @csrf
                <div class="form-group">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Enter Email address">
                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                  </div>
                <button type="submit" class="btn btn-primary">Forget Password</button>
                </form>
            </div>
        </div>
    </div>




    <script type="text/javascript" src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}" ></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}" ></script>

</body>
</html>