<?php

namespace App\Providers;

use App\Models\Help;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.header', function ($view){
           $view->with(['helpId'=>Help::all()->first()->id]);
        });
    }
}
