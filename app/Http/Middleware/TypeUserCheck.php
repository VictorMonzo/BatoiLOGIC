<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TypeUserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $type_user)
    {
        if (auth()->user()->type_user === 3) return $next($request);
        if (auth()->user()->type_user === intval($type_user)) return $next($request);
        return redirect('/');
    }
}
