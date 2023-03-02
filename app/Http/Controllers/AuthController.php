<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerView(){
        return view('login');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
        ]);
        //$user = User::query()->create
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=>Hash::make($request->password),
        ]);

        //session()->flash('success', 'Successful registration!');
        Auth::login($user);
        return response()->json(['data'=>$user]);
        //return redirect('/home');
    }

    public function loginForm(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=> ['required', 'email'],
            'password'=> ['required'],
        ]);


        if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ])){
            $user = User::query()->where('email', $request->email)->first();
            return response()->json(['data'=> $user]);
        }
        return response()->json(['message'=>'Incorrect login or password'],401);
    }

    public function logout(){
        Auth::logout();
        return response()->json(['message'=>'Ok'], 204);
    }
}

