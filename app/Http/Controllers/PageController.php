<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;
use App\Models\User;
use Hash;
class PageController extends Controller
{
    //
    public function home()
    {
        return Inertia::render('Home');
    }

    ///Edit Profile
    public function editProfile()
    {
        return Inertia::render('EditUser');
    }
    public function postEditProfile(Request $request)
    {
        
        //check password && image && user update
        //Fetch User
        $id = Auth::user()->id;
        $user = User::where('id', $id);

        if ($request->password) {
            $hash = Hash::make($request->password);
        } else {
            $hash = $user->first()->password;
        }
        if ($file = $request->file('image')) {
            $image_name = uniqid() . str_replace('', "", $file->getClientOriginalName());
            $path = '/images/profile/';
            $file->move(public_path($path), $image_name);
            $image_name_path = $path . $image_name;
        } else {
            $image_name_path = $user->first()->image;
        }
        //update user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hash,
            'image' => $image_name_path,
        ]);
        return redirect()->back()->with('success', 'Profile Updated Success!');
    }

    /**
     * About 
     */
    public function about()
    {
        return Inertia::render('About');
    }
}
