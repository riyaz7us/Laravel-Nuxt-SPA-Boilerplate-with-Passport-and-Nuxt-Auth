<?php

namespace App\Http\Middleware;

use Closure;

class checkAdmin
{
    /**
     * Checks whether the user is admin.
     *
     * @param  \Illuminate\Http\Request  $request->user
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->user()->hasRole(['admin'])){
            return response()->json(['Unauthorized'=>401]);
        }
        return $next($request);
    }
}
