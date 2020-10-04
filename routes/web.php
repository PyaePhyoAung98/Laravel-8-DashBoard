<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {

    //Home
    Route::get('/', [PageController::class, 'home'])->name('home');
    
    //UserPofile
    Route::get('/users/profile', [UserController::class, 'index'])->name('users.profile');

   // Route::get('/user/profile/{id}', [UserController::class, 'show'])->name('user.profile.show','{id}');

    // Route::post('/user/profile', [UserController::class, 'edit'])->name('user.edit');
    
    //Delete User
    Route::get('/user/delete/{id}',[UserController::class,'delete'])->name('user.delete');

    //About
    Route::get('/about', [PageController::class, 'about'])->name('about');



    ///Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //Settings
     Route::get('/settings', [SettingController::class, 'index'])->name('settings');

    //Edituser
    Route::get('/profile/edit', [PageController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/edit', [PageController::class, 'postEditProfile'])->name('postEditProfile');



});


//NotLogin
Route::group(['middleware' => 'NotLogin'], function () {
    ////Register///
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');

    #Login#
    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');
    
});

