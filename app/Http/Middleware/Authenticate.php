<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }

    }

    public function handle($request, Closure $next)
    {

        if(!Auth::check() )
            return redirect()->to('/login');

        if(Auth::check() &&  Auth::user()->type == 'real_estate'
            && Auth::user()->real_estate != null
            && Auth::user()->real_estate->status == '0'){
                return redirect()->route('logout')->with('errors', ['noPermission']);
            }
        return $next($request);
    }


}
