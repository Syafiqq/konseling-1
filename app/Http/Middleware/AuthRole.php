<?php namespace App\Http\Middleware;

use Closure;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role = $request->route()->getParameter('role');
        if (empty($role))
        {
            abort(404);
        }
        $request->merge(['role' => $role]);

        return $next($request);
    }
}
