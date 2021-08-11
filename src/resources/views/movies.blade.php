@include('layouts.header')
<center>
<div style="padding-top:20px;">
<div class="card border-info mb3" style="height:600px;width:1120px">
    <div class="card-header">Movies</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Year</th>
                        <th scope="col">Play</th>
                        <th scope="col">Download</th>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <th scope="col">Delete</th>
                        @endif
                    </tr>
                    @foreach($movies as $movie)
                    @if(!(Auth::user()->isagerestricted == 'true' && $movie->isagerestricted == 'true'))
                    <tr>
                        <td><img class="card-img-top" src="{{url('upload/moviecovers/'.$movie->cover)}}" alt="Card image cap" style="height:200px;width:100px"></td>
                        <td>{{$movie->title}}</td>
                        <td>{{$movie->description}}</td>
                        <td>{{$movie->genre}}</td>
                        <td>{{$movie->year}}</td>
                        <td><a class="btn btn-outline-primary" href="/movieplayer/{{$movie->id}}"><i class="fas fa-play"></i> Play</a></td>
                        <td><a class="btn btn-outline-info" href="{{ url('storage/'.$movie->movie) }}" download><i class="fas fa-download"></i> Download</a></td>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <td><a class="btn btn-outline-danger" href="/movies/{{$movie->id}}"><i class="fas fa-trash-alt"></i> Remove</a></td>
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