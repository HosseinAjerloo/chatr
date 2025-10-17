<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
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
        View::composer(['panel.layouts.aside','panel.layouts.header'], function ($view) {
            $activeUsers = DB::table('sessions')
                ->distinct()
                ->join('users', 'sessions.user_id', '=', 'users.id')
                ->where('sessions.last_activity', '>', Carbon::now()->subMinutes(5)->timestamp)
                ->get();
            $view->with(['user'=>Auth::user(),'activeUsers'=>$activeUsers]);
        });

    }
}

