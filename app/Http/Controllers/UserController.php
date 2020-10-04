<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Hash;
class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return Inertia::render('UserProfile',['users'=>$users]);
    }
    public function show($id)
    {
        $user = User::find($id);
        
        return Inertia::render('EditUser',['edit_user'=>$user]);
    }

    public function delete($id)
    {
        User::where('id',$id)->delete();
        return response()->json(['success'=>true]);
    }
    ///User edit
    // public function edit(Request $request)
    // {
         
    //     // $id = Auth::user()->id;
    //     $user = User::where('id', $request->id);

    //     if ($request->password) {
    //         $hash = Hash::make($request->password);
    //     } else {
    //         $hash = $user->first()->password;
    //     }
    //     if ($file = $request->file('image')) {
    //         $image_name = uniqid() . str_replace('', "", $file->getClientOriginalName());
    //         $path = '/images/profile/';
    //         $file->move(public_path($path), $image_name);
    //         $image_name_path = $path . $image_name;
    //     } else {
    //         $image_name_path = $user->first()->image;
    //     }
    //     //update user
    //     $user->update([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => $hash,
    //         'image' => $image_name_path,
    //     ]);
    //     return redirect()->back()->with('success', 'Profile Updated Success!');
    // }

}
