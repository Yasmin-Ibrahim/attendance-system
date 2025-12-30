<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function show_login(){
        return view('auth.login');
    }

    public function show_register(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            "name" => "required|string",
            "phone" => "required|digits_between:10,20|unique:users,phone",
            "username" => "required|string|unique:users,username",
            "email" => "required|string|email|unique:users,email",
            "password" => "required|confirmed|min:6",
        ]);

        User::create([
            "name" => $request->name,
            "phone" => $request->phone,
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Done Registeration successfully');

    }

    public function login(Request $request){
        $request->validate([
            "username" => "required|string",
            "password" => "required"
        ]);

        if(Auth::attempt($request->only('username', 'password'))){
            $request->session()->regenerate();
            return redirect()->route('welcome');
        }

        return redirect()->back()->with('fail', 'Wrong username or password');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
