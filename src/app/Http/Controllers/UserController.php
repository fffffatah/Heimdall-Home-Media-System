<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AddUserRequest;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users')->with('users', $users);
    }

    public function addUserIndex(){
        return view('adduser');
    }

    public function addUser(AddUserRequest $request){
        $img = $request->file('avatar');
        $user = new User;
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->password = 'default';
        $user->type = $request->type;
        $user->isagerestricted = $request->isagerestricted;
        $user->avatar = uniqid().".".$img->getClientOriginalExtension();
        if($user->save()){
            $request->session()->flash('msg', 'User Account Created');
        }
        else{
            $request->session()->flash('msg', 'User Account Creation Failed');
        }
        return redirect()->route('adduser.index');
    }

    public function deleteUser($id){
        User::destroy($id);
        return redirect()->route('users.index');
    }
}
