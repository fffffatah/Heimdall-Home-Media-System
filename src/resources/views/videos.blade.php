@include('layouts.header')
<center>
<div style="padding-top:20px;">
<div class="card border-info mb3" style="height:600px;width:1120px">
    <div class="card-header">My Videos</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Play Video</th>
                        <th scope="col">Download</th>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <th scope="col">Delete</th>
                        @endif
                    </tr>
                    @foreach($videos as $video)
                    <tr>
                        <td>{{$video->name}}</td>
                        <td>{{$video->created_at}}</td>
                        <td><a class="btn btn-outline-primary" href="/videoplayer/{{$video->id}}"><i class="fas fa-eye"></i> Play</a></td>
                        <td><a class="btn btn-outline-info" href="{{ url('storage/'.$video->file) }}" download><i class="fas fa-download"></i> Download</a></td>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <td><a class="btn btn-outline-danger" href="/video/{{$video->id}}"><i class="fas fa-trash-alt"></i> Remove</a></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
</div>
</center>
@include('layouts.footer')