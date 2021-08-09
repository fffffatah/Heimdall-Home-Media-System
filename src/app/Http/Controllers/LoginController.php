<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(LoginRequest $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], (($request->remember=='true')?true:false)) ){
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
        }
        else
        {
            $request->session()->flash('msg', 'Invaild Username or Password');
            return redirect()->route('login.index');
        }
    }

    
}
