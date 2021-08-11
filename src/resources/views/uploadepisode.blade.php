@include('layouts.header')
<center>
<div style="padding-top:20px;">
<form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Upload Episode
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">Episode</label>
                            <input type="file" value="{{old('episode')}}" name="episode" class="form-control" id="inputGroupFile01">
                        </div>
                        <span style="color:red;">{{$errors->first('episode')}}</span>
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
                        <input class="form-control me-2" value="{{old('season')}}" name="season" type="number" placeholder="Season" aria-label="Season">
                        <span style="color:red;">{{$errors->first('season')}}</span>
                    </li>
                    <li class="list-group-item">
                        <select class="form-select" name="show" aria-label="Default select example">
                            <option selected disabled>Select Show</option>
                            @foreach($shows as $show)
                            <option value="{{$show->id}}">{{$show->title}}</option>
                            @endforeach
                        </select>
                        <span style="color:red;">{{$errors->first('show')}}</span>
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