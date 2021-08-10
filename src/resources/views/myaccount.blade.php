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
                    <img class="card-img-top" src="{{ asset('upload/avatars/'.Auth::user()->avatar) }}" alt="Card image cap" style="height:100px;width:100px">
                    </li>
                    <li class="list-group-item">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Avatar</label>
                            <input type="file" value="{{old('avatar')}}" name="avatar" class="form-control" id="inputGroupFile01">
                        </div>
                        <span style="color:red;">{{$errors->first('avatar')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-control me-2" value="{{Auth::user()->fullname}}" name="fullname" type="text" placeholder="Fullname" aria-label="Fullname">
                        <span style="color:red;">{{$errors->first('fullname')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-control me-2" name="username" value="{{Auth::user()->username}}" type="text" placeholder="Username" aria-label="Username">
                        <span style="color:red;">{{$errors->first('username')}}</span>
                    </li>
                </ul>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit"><i class="fas fa-user-edit"></i> Update</button>
                </div>
            </div>
            </div>
            </form>
            <span style="color:red;"><b>{{session('msg')}}</b></span>
</center>
@include('layouts.footer')