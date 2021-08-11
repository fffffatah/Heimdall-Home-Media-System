@include('layouts.header')
<center>
<div style="padding-top:20px;">
<div class="card border-info mb3" style="height:600px;width:1120px">
    <div class="card-header">{{$gallery->title}} - Photos</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Photo</th>
                        <th scope="col">Date</th>
                        <th scope="col">View Photo</th>
                        <th scope="col">Download</th>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <th scope="col">Delete</th>
                        @endif
                    </tr>
                    @foreach($photos as $photo)
                    <tr>
                        <td><img class="card-img-top" src="{{ url('storage/'.$photo->photo) }}" alt="Card image cap" style="height:100px;width:100px"></td>
                        <td>{{$photo->created_at}}</td>
                        <td><a class="btn btn-outline-primary" href="{{ url('storage/'.$photo->photo) }}" target="_blank"><i class="fas fa-eye"></i> View</a></td>
                        <td><a class="btn btn-outline-info" href="{{ url('storage/'.$photo->photo) }}" download><i class="fas fa-download"></i> Download</a></td>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <td><a class="btn btn-outline-danger" href="/photo/{{$photo->id}}"><i class="fas fa-trash-alt"></i> Remove</a></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
</div>
</center>
@include('layouts.footer')