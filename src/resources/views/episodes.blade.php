@include('layouts.header')
<center>
<div style="padding-top:20px;">
<div class="card border-info mb3" style="height:600px;width:1120px">
    <div class="card-header">Episodes - {{$show->title}}</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Season</th>
                        <th scope="col">Play</th>
                        <th scope="col">Download</th>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <th scope="col">Delete</th>
                        @endif
                    </tr>
                    @foreach($episodes as $episode)
                    <tr>
                        <td>{{$episode->title}}</td>
                        <td>{{$episode->description}}</td>
                        <td>{{$episode->season}}</td>
                        <td><a class="btn btn-outline-primary" href="/tvplayer/{{$episode->id}}"><i class="fas fa-play"></i> Play</a></td>
                        <td><a class="btn btn-outline-info" href="{{ url('storage/'$episode->episode) }}" download><i class="fas fa-download"></i> Download</a></td>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <td><a class="btn btn-outline-danger" href="/episode/{{$episode->id}}"><i class="fas fa-trash-alt"></i> Remove</a></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
</div>
</center>
@include('layouts.footer')