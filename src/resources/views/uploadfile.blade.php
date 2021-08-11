@include('layouts.header')
<center>
<div style="padding-top:20px;">
<form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Upload Myfile
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">File</label>
                            <input type="file" value="{{old('file')}}" name="file" class="form-control" id="inputGroupFile01">
                        </div>
                        <span style="color:red;">{{$errors->first('file')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-control me-2" value="{{old('name')}}" name="name" type="text" placeholder="Name" aria-label="Name">
                        <span style="color:red;">{{$errors->first('name')}}</span>
                    </li>
                    <li class="list-group-item">
                        <select class="form-select" name="storage" aria-label="Default select example">
                            <option selected disabled>Select Storage</option>
                            @foreach($storages as $storage)
                            <option value="{{basename($storage)}}">{{basename($storage)}}</option>
                            @endforeach
                        </select>
                        <span style="color:red;">{{$errors->first('storage')}}</span>
                    </li>
                </ul>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit"><i class="fas fa-upload"></i> Upload</button>
                </div>
            </div>
            </div>
            </form>
            <span style="color:red;"><b>{{session('msg')}}</b></span>
</center>
@include('layouts.footer')