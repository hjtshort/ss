<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(LoginRequest $request)
    {
        if(Auth::attempt(array('email'=>$request->email,'password'=>$request->password),false))
        {
            return redirect()->route('index');
        }else{
            return back()->with(['errorLogin'=>'Email hoặc Password không đúng!']);
        }
    }
    public function logout()
    {
        if (Auth::check()){
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->route('login');
        }
    }
}
