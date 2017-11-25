<?php namespace App\Http\Middleware;

use Closure;

abstract class AuthRole
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
        $request->merge(['role' => $this->getRole()]);

        return $next($request);
    }

    public abstract function getRole();
}
