@include('layouts.header')
<center>
<div style="padding-top:20px;">
<div class="card border-info mb3" style="height:600px;width:1120px">
    <div class="card-header">Album - {{$album->title}}</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Song</th>
                        <th scope="col">Play</th>
                        <th scope="col">Download</th>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <th scope="col">Delete</th>
                        @endif
                    </tr>
                    @foreach($songs as $song)
                    <tr>
                        <td>{{$song->title}}</td>
                        <td>
                            <audio controls>
                                <source src="{{ url('storage/'.$song->song) }}" type="audio/mpeg">
                                Your browser does not support the audio.
                            </audio>
                        </td>
                        <td><a class="btn btn-outline-info" href="{{ url('storage/'.$song->song) }}" download><i class="fas fa-download"></i> Download</a></td>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <td><a class="btn btn-outline-danger" href="/song/{{$song->id}}"><i class="fas fa-trash-alt"></i> Remove</a></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
</div>
</center>
@include('layouts.footer')