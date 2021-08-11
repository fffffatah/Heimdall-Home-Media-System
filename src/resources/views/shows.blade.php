@include('layouts.header')
<center>
<div style="padding-top:20px;">
<div class="card border-info mb3" style="height:600px;width:1120px">
    <div class="card-header">Shows</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Year</th>
                        <th scope="col">View Episodes</th>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <th scope="col">Delete</th>
                        @endif
                    </tr>
                    @foreach($shows as $show)
                    @if(!(Auth::user()->isagerestricted == 'true' && $show->isagerestricted == 'true'))
                    <tr>
                        <td><img class="card-img-top" src="{{url('upload/showcovers/'.$show->cover)}}" alt="Card image cap" style="height:200px;width:100px"></td>
                        <td>{{$show->title}}</td>
                        <td>{{$show->description}}</td>
                        <td>{{$show->genre}}</td>
                        <td>{{$show->year}}</td>
                        <td><a class="btn btn-outline-primary" href="/episodes/{{$show->id}}"><i class="fas fa-eye"></i> View Episodes</a></td>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <td><a class="btn btn-outline-danger" href="/shows/{{$show->id}}"><i class="fas fa-trash-alt"></i> Remove</a></td>
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