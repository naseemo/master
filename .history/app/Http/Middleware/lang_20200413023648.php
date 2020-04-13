<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {if(!Session::has('lang')){
        Session::put('lang','en');
    }
    App()->setlocale(Session::get('lang'));
        return $next($request);
    }
}