<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProtectRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) // Same As Admin Middleware
    {
        if ($request->user() && $request->user()->status != '1')
        {
            return new Response(view('pages.unauthorized'));
        }
        return $next($request);
    }
}
