<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->admin == 0) {
                return $next($request);
        }else {
            return redirect()->route('index.home');
        }

        return redirect()->route('index.home');
    }
}
