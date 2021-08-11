@include('layouts.header')
<center>
<div style="padding-top:20px;">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Connected Storages
                </div>
                <ul class="list-group">
                    @foreach($storages as $storage)
                    <li class="list-group-item">
                        <label for="">{{basename($storage)}}</label>
                    </li>
                    @endforeach
            </div>
</center>
@include('layouts.footer')