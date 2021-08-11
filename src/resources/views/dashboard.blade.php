@include('layouts.header')
<center>
<div style="padding-top:20px;">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Hello - {{Auth::user()->fullname}}
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <label for="">Username: {{Auth::user()->username}}</label>
                    </li>
                    <li class="list-group-item">
                        <label for="">Account Type: {{Auth::user()->type}}</label>
                    </li>
                    <li class="list-group-item">
                        <label for="">Age Restriction: {{((Auth::user()->isagerestricted == 'true')?'Enabled':'Disabled')}}</label>
                    </li>
            </div>
</center>
@include('layouts.footer')