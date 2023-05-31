<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Credentials', 'true');
        $response->headers->set('crossDomain', 'true');
        $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:8000', '*', );
        $response->headers->set('Access-Control-Expose-Headers', 'Content-Length, X-JSON');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN, Origin, X-Auth-Token, *');
        return $response;
    }
}
