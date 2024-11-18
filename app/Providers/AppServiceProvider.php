<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate; // Gunakan ini
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('insert', function(User $user){
            return $user->email == 'user@user.com';
        }); // Pastikan ada titik koma di sini
    }
}
