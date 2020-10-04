<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        return Inertia::render('Auth/Login');
    }
    public function postLogin(Request $request)
    {

        
            $request->validate([

                'email' => 'required',
                'password' => 'required|min:6',

            ]);
            $credential = $request->only('email', 'password');
            if (Auth::attempt($credential)) {
                return redirect('/')->with('success', 'Welcome ' . Auth::user()->name); //session put with
            }
            else{
                return redirect('/')->with('error','Fail');
            }
       
    }
    public function register()
    {
        return Inertia::render('Auth/Register');
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        // image upload

        $image = $request->file('image');
        $image_name = uniqid() . str_replace('', "", $image->getClientOriginalName());
        $image_path = '/images/profile/';
        $image->move(public_path('images/profile'), $image_name);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $image_path . $image_name
        ]);
        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {
            return Redirect::route('home');
        }
    }
    public function logout()
    {
        Auth::logout();
        return Redirect::route('login');
    }
}
