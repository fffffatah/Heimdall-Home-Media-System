<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\NewPassRequest;

class RegistrationController extends Controller
{
    public function index(){
        return view('registration');
    }

    public function registration(RegistrationRequest $request)
    {
        $img = $request->file('avatar');
        $user = new User;
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->type = 'admin';
        $user->isagerestricted = 'false';
        $user->avatar = uniqid().".".$img->getClientOriginalExtension();
        if($user->save()){
            $img->move('upload/avatars', $user->avatar);
            $request->session()->flash('msg', 'Admin Account Created');
        }
        else{
            $request->session()->flash('msg', 'Admin Account Creation Failed');
        }
        return redirect()->route('login.index');
    }

    public function setPassIndex(){
        return view('setpass');
    }

    public function setNewPass(NewPassRequest $request){
        $user = User::where('username',$request->username)->first();
        if($user->password == 'default'){
            $user->password = Hash::make($request->password);
            $user->save();
            $request->session()->flash('msg', 'New Password Set!');
        }
        else{
            $request->session()->flash('msg', 'User Already Set their Password');
        }
        return redirect()->route('login.index');
    }
}
