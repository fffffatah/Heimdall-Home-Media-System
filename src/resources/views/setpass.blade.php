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
                    Set New Password
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <input class="form-control me-2" name="username" value="{{old('username')}}" type="text" placeholder="Username" aria-label="Username">
                        <span style="color:red;">{{$errors->first('username')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-control me-2" name="password" type="text" placeholder="Password" aria-label="Password">
                        <span style="color:red;">{{$errors->first('password')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-control me-2" name="password_confirmation" type="text" placeholder="Password" aria-label="Password">
                        <span style="color:red;">{{$errors->first('password')}}</span>
                    </li>
                </ul>
                <div class="card-footer">
                    <a class="btn btn-outline-danger" href="{{route('login.index')}}"><i class="fas fa-arrow-circle-left"></i> Back</a><span style="padding-right:5px;"></span><button class="btn btn-success" type="submit"><i class="fas fa-login"></i><i class="fas fa-check-circle"></i> Set</button>
                </div>
            </div>
            </div>
            </form>
            <span style="color:red;"><b>{{session('msg')}}</b></span>
        </center>
    </body>
</html>