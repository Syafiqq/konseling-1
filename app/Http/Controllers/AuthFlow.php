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
use App\Eloquent\User;
use App\Services\UserRegistrar;
use Illuminate\Auth\Guard;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait AuthFlow
{
    /**
     * @param UserRegistrar $registrar
     * @param Request $request
     * @param Guard $guard
     * @param string $role
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function registerStore(UserRegistrar $registrar, Request $request, Guard $guard, $role)
    {
        $registrar->setRole($role);
        $validator = $registrar->validator($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        /** @var Builder $coupon */
        $coupon = new Coupon();
        $coupon->where('coupon', '=', $request->get('token', null))->delete();

        $registrar->create($request->all());

        return $this->postLogin($guard, $request, $role);
    }

    /**
     * @param Guard $auth
     * @param Request $request
     * @param string $role
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(Guard $auth, Request $request, $role)
    {
        $this->validate($request, [
            'credential' => 'required|exists:users,credential|max:100',
            'password' => 'required|min:8',
            'role' => "required|in:{$role}",
        ]);

        $credentials = $request->only(['credential', 'password', 'role']);

        if ($auth->attempt($credentials, false))
        {
            return $this->validResponseOrDefault($this->redirectPath(), redirect()->intended($this->redirectPath()), ['notify' => ['Successfully Login']]);
        }
        else
        {
            return $this->validResponseOrDefault($this->loginPath(), redirect($this->loginPath()))
                ->withInput($request->only(['credential', 'password']))
                ->withErrors([
                    'email' => $this->getFailedLoginMessage(),
                ]);
        }
    }

    /**
     * @param \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|string $response
     * @param \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse $default
     * @param null $callback
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function validResponseOrDefault($response, $default, $callback = null)
    {
        $valid = is_string($response) ? $default : $response;

        return $callback ? $valid->with('cbk_msg', $callback) : $valid;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath'))
        {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : $this->defaultRedirectPath();
    }

    /**
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|string
     */
    private function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : $this->defaultLoginPath();
    }

    public function getFailedLoginMessage()
    {
        return 'Akun Tidak Terdaftar';
    }

    public function getLogout(Guard $guard)
    {
        /** @var User $user */
        /** @noinspection PhpUndefinedMethodInspection */
        $role = Auth::user()->getAttribute('role');
        $guard->logout();

        return redirect()->route("$role.auth.login.get")->with('cbk_msg', ['notify' => ['Successfully Logout']]);
    }

    /**
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|string
     */
    abstract public function defaultLoginPath();

    /**
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|string
     */
    abstract public function defaultRedirectPath();
}

?>
