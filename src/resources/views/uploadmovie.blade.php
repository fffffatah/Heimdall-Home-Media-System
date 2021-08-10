@include('layouts.header')
<center>
<div style="padding-top:20px;">
<form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Upload Movie
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Cover</label>
                            <input type="file" value="{{old('cover')}}" name="cover" class="form-control" id="inputGroupFile01">
                        </div>
                        <span style="color:red;">{{$errors->first('cover')}}</span>
                    </li>
                    <li class="list-group-item">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Movie</label>
                            <input type="file" value="{{old('movie')}}" name="movie" class="form-control" id="inputGroupFile01">
                        </div>
                        <span style="color:red;">{{$errors->first('movie')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-control me-2" value="{{old('title')}}" name="title" type="text" placeholder="Title" aria-label="Title">
                        <span style="color:red;">{{$errors->first('title')}}</span>
                    </li>
                    <li class="list-group-item">
                        <textarea name="description" placeholder="Description" value="{{old('description')}}"></textarea>
                        <span style="color:red;">{{$errors->first('description')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-control me-2" value="{{old('year')}}" name="year" type="text" placeholder="Year" aria-label="Year">
                        <span style="color:red;">{{$errors->first('year')}}</span>
                    </li>
                    <li class="list-group-item">
                        <input class="form-control me-2" value="{{old('genre')}}" name="genre" type="text" placeholder="Genre" aria-label="Genre">
                        <span style="color:red;">{{$errors->first('genre')}}</span>
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
                    <button class="btn btn-success" type="submit"><i class="fas fa-upload"></i> Upload</button>
                </div>
            </div>
            </div>
            </form>
            <span style="color:red;"><b>{{session('msg')}}</b></span>
</center>
@include('layouts.footer')