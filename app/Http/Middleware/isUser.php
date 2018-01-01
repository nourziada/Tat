<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->verified == 1) {
                return $next($request);
        }else {
            return redirect()->route('show.verification');
        }

        return redirect()->route('index.home');
    }
}
