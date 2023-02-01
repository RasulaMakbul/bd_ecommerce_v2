<?php

namespace App\Providers;

use App\View\Composers\FrontendComposer;
use Illuminate\Support\Facades\View;
// use Illuminate\View\View;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.inc.frontend.navbar', FrontendComposer::class);
    }
}