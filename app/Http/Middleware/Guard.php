<?php

namespace LBC\Http\Middleware;

class Guard
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param null $guard
	 * @return mixed
	 */
	public function handle($request, \Closure $next, $guard = null)
	{
        $path = $request->path();

        $notGuarded = ['register', 'login', 'logout'];

	    if (auth()->check() || in_array($path, $notGuarded)) {
            return $next($request);
        }

		if ($path !== 'logout' && !fnmatch('checkmail', $path)) {
			if ($request->ajax() || $request->wantsJson()) {
				return response('unauthorized', 401);
			} else {
				if ($path !== 'login') {
					return redirect()->guest('/login');
				}
			}
		}

		return $next($request);
	}
}
