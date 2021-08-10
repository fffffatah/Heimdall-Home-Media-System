@include('layouts.header')
<center>
<div style="padding-top:20px;">
<div class="card border-info mb3" style="height:600px;width:1120px">
    <div class="card-header">Users</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">#SR</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Type</th>
                        <th scope="col">Age Restriction</th>
                        <th scope="col">Remove</th>
                    </tr>
                    @foreach($users as $user)
                    @if($user->type != 'admin')
                    <tr>
                        <td>{{$loop->iteration-1}}</td>
                        <td>{{$user->fullname}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->type}}</td>
                        <td>{{$user->isagerestricted}}</td>
                        <td><a class="btn btn-outline-danger" href="/users/{{$user->id}}">Remove</a></td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
</div>
</center>
@include('layouts.footer')