<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function index(){
        return view('registration');
    }

    public function registration(RegistrationRequest $request)
    {
        $img = $request->file('avatar');
        $user=new User;
        $user->fullname = $request->firstname;
        $user->username = $request->lastname;
        $user->password = $request->username;
        $user->type = 'admin';
        $user->level = '2';
        $user->isagerestricted = 'false';
        $user->avatar = uniqid().".".$img->getClientOriginalExtension();
        if($user->save()){
            $request->session()->flash('msg', 'Admin Account Created');
        }
        else{
            $request->session()->flash('msg', 'Admin Account Creation Failed');
        }
        return redirect()->route('login.index');
    }
}
