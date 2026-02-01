<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClearSessionCookies
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $cookies = ['laravel_session', 'XSRF-TOKEN'];
        foreach ($cookies as $cookie) {
            $response->headers->clearCookie($cookie);
        }
        return $response;
    }
}
