<?php
/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 26 November 2017, 12:13 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Http\Controllers;


use App\Eloquent\Coupon;
use App\Services\UserRegistrar;
use Illuminate\Auth\Guard;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

trait AuthFlow
{
    /**
     * @param Guard $auth
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(Guard $auth, Request $request)
    {
        $this->validate($request, [
            'credential' => 'required|exists:users,credential|max:100',
            'password' => 'required|min:8',
            'role' => "required|in:{$this->getRole()}",
        ]);

        $credentials = $request->only(['credential', 'password', 'role']);

        if ($auth->attempt($credentials, false))
        {
            return redirect()->intended($this->redirectPath());
        }
        else
        {
            abort(404);
        }
    }

    public function registerStore(UserRegistrar $registrar, Request $request, Guard $guard)
    {
        $validator = $registrar->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        /** @var Builder $coupon */
        $coupon = new Coupon();
        //$coupon->where('coupon', '=', $request->get('token', null))->delete();

        $registrar->create($request->all());

        return $this->postLogin($guard, $request);
    }
}

?>
