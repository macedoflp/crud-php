<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->booted(function () {
            View::composer('*', function ($view) {
                $view->with('usuarios', User::all());
            });
        });
    }
}
