<?php namespace App\Http\Middleware;

use App\Eloquent\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class ValidOpenedCourseQuestion
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
        $question = $request->route()->getParameter('question', 0);

        /** @var User $user */
        $user   = Auth::user();
        $answer = $user->getAttribute('answer')->last()->answer_detail()->skip($question - 2)->take(3)->get();
        if (count($answer) <= 1)
        {
            abort(404);
        }
        $request->route()->setParameter('answer', $answer);

        return $next($request);
    }

}