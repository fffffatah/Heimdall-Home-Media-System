<html>
    <head>
        <title>Heimdall - Home Media</title>
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    </head>
    <body>
        <center>
        <form action="" method="post">
                @csrf
            <div class="d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Login
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <input class="form-control me-2" name="username" value="{{old('username')}}" type="text" placeholder="Username" aria-label="Username">
                        <span style="color:red;">{{$errors->first('username')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-control me-2" name="password" type="password" placeholder="Password" aria-label="Password">
                        <span style="color:red;">{{$errors->first('password')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input" type="checkbox" value="true" name="remember" id="flexCheckDefault"> Remember Me
                    </li>
                    <li class="list-group-item"><a href="#"><U>First Time? Set New Password.</U></a></li>
                </ul>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit"><i class="fas fa-login"></i> Login</button><span style="padding-right:5px;"></span><a class="btn btn-outline-primary" href="{{route('registration.registration')}}">Register</a>
                </div>
            </div>
            </div>
            </form>
            <span style="color:red;"><b>{{session('msg')}}</b></span>
        </center>
    </body>
</html>