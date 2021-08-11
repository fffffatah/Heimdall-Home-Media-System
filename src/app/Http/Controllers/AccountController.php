<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AccountUpdateRequest;
use App\Http\Requests\PasswordChangeRequest;
use Illuminate\Support\Facades\Hash;
use File;


class AccountController extends Controller
{
    public function index(){
        return view('myaccount');
    }

    public function changePassIndex(){
        return view('changepass');
    }

    public function settingIndex(){
        $files = File::directories(public_path('storage'));
        return view('settings')->with('storages',$files);
    }

    public function updateUser(AccountUpdateRequest $request){
        $user = User::find(Auth::id());
        $img = $request->file('avatar');
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->avatar = uniqid().".".$img->getClientOriginalExtension();
        if($user->save()){
            $img->move('upload/avatars', $user->avatar);
            $request->session()->flash('msg', 'Account Updated');
        }
        else{
            $request->session()->flash('msg', 'Account Updation Failed');
        }
        return redirect()->route('myaccount.index');
    }

    public function changePass(PasswordChangeRequest $request){
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        if($user->save()){
            $request->session()->flash('msg', 'Password Changed Successfully');
        }
        else{
            $request->session()->flash('msg', 'Could Not Change Password');
        }
        return redirect()->route('changepass.index');
    }
}
