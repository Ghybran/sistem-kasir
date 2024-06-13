<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if(Auth::user()->role == 'admin'){
            return $request->expectsJson() ? null : route('dashboard-admin');
        }elseif(Auth::user()->role == 'master'){
            return $request->expectsJson() ? null : route('dashboard-master');
        }else
        return $request->expectsJson() ? null : route('login');
    }
}
