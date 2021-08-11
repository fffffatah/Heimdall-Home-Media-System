@include('layouts.header')
<center>
<div style="padding-top:20px;">
<div class="card border-info mb3" style="height:600px;width:1120px">
    <div class="card-header">{{$show->title}} - {{$episode->title}}</div>
        <div class="card-body">
        <video width="900" height="500" controls>
            <source src="{{url('storage/'.$episode->episode)}}" type="video/mp4">
            Your browser does not support the video.
        </video>
        </div>
    </div>
</div>
</center>
@include('layouts.footer')