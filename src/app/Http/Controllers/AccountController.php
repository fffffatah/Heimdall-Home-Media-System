<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AccountUpdateRequest;

class AccountController extends Controller
{
    public function index(){
        return view('myaccount');
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
}
