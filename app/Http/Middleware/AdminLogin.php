<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin.user')) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
