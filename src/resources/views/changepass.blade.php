@include('layouts.header')
<center>
<div style="padding-top:20px;">
<form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    My Profile
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <input class="form-control me-2" name="current_password" type="password" placeholder="Current Password" aria-label="Password">
                        <span style="color:red;">{{$errors->first('current_password')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-control me-2" name="password" type="text" placeholder="Password" aria-label="Password">
                        <span style="color:red;">{{$errors->first('password')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-control me-2" name="password_confirmation" type="text" placeholder="Confirm Password" aria-label="Password">
                        <span style="color:red;">{{$errors->first('password')}}</span>
                    </li>
                </ul>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit"><i class="fas fa-user-edit"></i> Change</button>
                </div>
            </div>
            </div>
            </form>
            <span style="color:red;"><b>{{session('msg')}}</b></span>
</center>
@include('layouts.footer')