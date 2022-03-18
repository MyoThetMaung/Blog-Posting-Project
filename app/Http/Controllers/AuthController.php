<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        
        $formData = request()->validate([
            'username' => 'required | max:255 | min:3 | unique:users',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:5'
        ]);
        $user = User::create($formData);
        auth()->login($user);                                                                                  //log in now
        return redirect('/')->with('success','User '.$user->username.' created successfully');        //if refresh, session will disappear
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','Logged out successfully');
    }

    public function login(){
        return view('auth.login');
    }

    public function post_login(){
        $formData = request()->validate([
            'email' => 'required | max:255 | min:3 | exists:users',                                                  //checking email exists or not
            'password' => 'required | min:3'
        ]);
        if(auth()->attempt($formData)){                                                                     //checking email and password with database done by attemp fucntion
            if(auth()->user()->is_admin){
                return redirect('/admin/blogs');
            }else{
                return redirect('/')->with('success','Logged in successfully');  
            }     
        }else{
            return redirect('/login')->withErrors(['email'=>'Invalid email or password']);                 //checking errors message
        }
    }
}
