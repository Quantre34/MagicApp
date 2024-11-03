<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App;

class Lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //$_SESSION['Locale'] = 'tr';
        if (empty($_SESSION['Locale'])) {
            $_SESSION['Locale'] = 'en';
        }
        App::setlocale($_SESSION['Locale']);
        return $next($request);
    }
}
