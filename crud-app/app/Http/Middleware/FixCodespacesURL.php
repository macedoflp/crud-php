<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class FixCodespacesURL
{
    public function handle(Request $request, Closure $next)
    {
        // Força HTTPS e remove porta duplicada
        URL::forceRootUrl(config('app.url'));
        URL::forceScheme('https');

        return $next($request);
    }
}
