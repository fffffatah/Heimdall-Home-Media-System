@include('layouts.header')
<center>
<div style="padding-top:20px;">
<form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Add New user
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Avatar</label>
                            <input type="file" value="{{old('avatar')}}" name="avatar" class="form-control" id="inputGroupFile01">
                        </div>
                        <span style="color:red;">{{$errors->first('avatar')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-control me-2" value="{{old('fullname')}}" name="fullname" type="text" placeholder="Fullname" aria-label="Fullname">
                        <span style="color:red;">{{$errors->first('fullname')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-control me-2" name="username" value="{{old('username')}}" type="text" placeholder="Username" aria-label="Username">
                        <span style="color:red;">{{$errors->first('username')}}</span>
                    </li>
                    <li class="list-group-item">
                        <select class="form-select" name="type" aria-label="Default select example">
                            <option selected disabled>Select User Type</option>
                            <option value="user">User</option>
                            <option value="kid">Kid</option>
                        </select>
                        <span style="color:red;">{{$errors->first('type')}}</span>
                    </li>
                    <li class="list-group-item">
                    <select class="form-select" name="isagerestricted" aria-label="Default select example">
                            <option selected disabled>Age Restricted?</option>
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                        <span style="color:red;">{{$errors->first('isagerestricted')}}</span>
                    </li>
                </ul>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit"><i class="fas fa-user-plus"></i> Add</button>
                </div>
            </div>
            </div>
            </form>
            <span style="color:red;"><b>{{session('msg')}}</b></span>
</center>
@include('layouts.footer')