@include('layouts.header')
<center>
<div style="padding-top:20px;">
<div class="card border-info mb3" style="height:600px;width:1120px">
    <div class="card-header">Albums</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Artist</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Year</th>
                        <th scope="col">View Songs</th>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <th scope="col">Delete</th>
                        @endif
                    </tr>
                    @foreach($albums as $album)
                    @if(!(Auth::user()->isagerestricted == 'true' && $album->isagerestricted == 'true'))
                    <tr>
                        <td><img class="card-img-top" src="{{url('upload/albumarts/'.$album->cover)}}" alt="Card image cap" style="height:100px;width:100px"></td>
                        <td>{{$album->title}}</td>
                        <td>{{$album->artist}}</td>
                        <td>{{$album->genre}}</td>
                        <td>{{$album->year}}</td>
                        <td><a class="btn btn-outline-primary" href="/songs/{{$album->id}}"><i class="fas fa-eye"></i> View Songs</a></td>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <td><a class="btn btn-outline-danger" href="/album/{{$album->id}}"><i class="fas fa-trash-alt"></i> Remove</a></td>
                        @endif
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
</div>
</center>
@include('layouts.footer')