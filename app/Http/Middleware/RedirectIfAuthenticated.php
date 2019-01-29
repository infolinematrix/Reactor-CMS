<?php

namespace ReactorCMS\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {


<<<<<<< HEAD
        switch ($guard) {
            case 'api':
                //dd("NO GUARD FOUND api");
                return redirect()->route('reactor.dashboard');
                //return redirect()->route('user.dashboard');
        break;
            case 'web':
                //dd("NO GUARD FOUND web");
                return redirect()->route('user.dashboard');
        break;
            case 'admin':
                //dd("NO GUARD FOUND admin");
                return redirect()->route('reactor.dashboard');
        break;
            default:
                //dd("NO GUARD FOUND");
        }

        /*if (Auth::guard($guard)->check()) {


            dd($guard);
            return redirect()->route('reactor.dashboard');
        }*/
=======
        if (Auth::guard($guard)->check()) {
            return redirect()->route('reactor.dashboard');
        }
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c

        return $next($request);
    }


}
