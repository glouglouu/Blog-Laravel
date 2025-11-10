<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if a locale is stored in session
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            // Validate that it's a supported language
            if (in_array($locale, ['en', 'fr', 'de'])) {
                App::setLocale($locale);
            } else {
                // If invalid locale, use default
                App::setLocale(config('app.locale', 'fr'));
            }
        } else {
            // If no locale in session, use default from config
            App::setLocale(config('app.locale', 'fr'));
        }
        
        return $next($request);
    }
}

