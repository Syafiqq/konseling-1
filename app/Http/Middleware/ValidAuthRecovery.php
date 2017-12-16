<?php namespace App\Http\Middleware;

use App\Eloquent\User;
use Closure;

class ValidAuthRecovery
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
        $credential = $request->get('credential', null);
        $token      = $request->get('token', null);
        $user       = User::where('credential', '=', $credential)->where('lost_password', '=', $token)->first();
        if ($user === null)
        {
            abort(404);
        }
        $request->route()->setParameter('user', $user);

        return $next($request);
    }

}
