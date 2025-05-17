<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $langs = ['en', 'ar'];
        $accept_language = $request->header('Accept-Language');
        if($accept_language && in_array($accept_language, $langs))
        {
            app()->setLocale($accept_language);
            return $next($request);
        }
        return $next($request);
    }
}
