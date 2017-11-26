<?php namespace App\Http\Middleware;

use App\Contracts\Roleable;
use Closure;

abstract class AuthRole implements Roleable
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
}
