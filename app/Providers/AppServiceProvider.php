<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Inertia::share('flash',function(){
            return[
                'success'=>Session::get('success'),//Session::put('s','wel')
                'error'=>Session::get('error')
            ];
        });

        ///Auth usr_data share
        Inertia::share([
            'auth_user'=>function(){
                return Auth::user();
            }
        ]);
    }
    
}
