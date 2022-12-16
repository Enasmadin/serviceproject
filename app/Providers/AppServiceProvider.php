<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        
       
            Blade::if('authsubAdmin', function () {
                return auth()->user()->role === 'subadmin';
            });
            Blade::if('subadmin', function ($user) {
                return $user->role === 'subadmin';
            });
            
       
    }
}
