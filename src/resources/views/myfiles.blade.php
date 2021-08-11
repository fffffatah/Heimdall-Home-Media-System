@include('layouts.header')
<center>
<div style="padding-top:20px;">
<div class="card border-info mb3" style="height:600px;width:1120px">
    <div class="card-header">My Files</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Download</th>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <th scope="col">Delete</th>
                        @endif
                    </tr>
                    @foreach($myfiles as $myfile)
                    <tr>
                        <td>{{$myfile->name}}</td>
                        <td>{{$myfile->created_at}}</td>
                        <td><a class="btn btn-outline-info" href="{{ url('storage/'.$myfile->file) }}" download><i class="fas fa-download"></i> Download</a></td>
                        @if(Auth::user()->type == 'admin' || Auth::user()->type == 'user')
                        <td><a class="btn btn-outline-danger" href="/myfile/{{$myfile->id}}"><i class="fas fa-trash-alt"></i> Remove</a></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
</div>
</center>
@include('layouts.footer')