@include('layouts.header')
<center>
<div style="padding-top:20px;">
<div class="card border-info mb3" style="height:600px;width:1120px">
    <div class="card-header">Galleries</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">View Photos</th>
                        {{--@if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <th scope="col">Delete</th>
                        @endif--}}
                    </tr>
                    @foreach($galleries as $gallery)
                    <tr>
                        <td>{{$gallery->title}}</td>
                        <td>{{$gallery->description}}</td>
                        <td>{{$gallery->created_at}}</td>
                        <td><a class="btn btn-outline-primary" href="/photos/{{$gallery->id}}"><i class="fas fa-eye"></i> View Photos</a></td>
                        {{--@if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <td><a class="btn btn-outline-danger" href="/gallery/{{$gallery->id}}"><i class="fas fa-trash-alt"></i> Remove</a></td>
                        @endif--}}
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
</div>
</center>
@include('layouts.footer')