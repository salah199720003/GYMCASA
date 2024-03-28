<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StoreUrlIntended
{

        
        public function handle($request, Closure $next)
        {if (!$request->expectsJson() && !$request->is('login') && !$request->is('password/*')) {
            if (!Auth::check()) {
                // Store the intended URL if the user is not logged in
                Session::put('url.intended', Redirect::back()->getTargetUrl());
            }
        }

        return $next($request);
        }
    
}