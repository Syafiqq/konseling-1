<?php namespace App\Http\Controllers\Counselor;

use App\Contracts\RedirectResolver;
use App\Contracts\Roleable;
use App\Http\Controllers\AuthFlow;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PathRedirector;
use App\Services\CounselorRegistrar;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;

class Auth extends Controller implements Roleable, RedirectResolver
{
    use PathRedirector, AuthFlow
    {
        registerStore as private _registerStore;
    }

    public function getLogin()
    {
        return view("layout.counselor.auth.login.counselor_auth_login_$this->theme");
    }

    public function registerCreate()
    {
        return view("layout.counselor.auth.register.counselor_auth_register_$this->theme");
    }

    public function registerStore(CounselorRegistrar $registrar, Request $request, Guard $guard)
    {
        return $this->_registerStore($registrar, $request, $guard);
    }

    public function redirectPath()
    {
        return $this->redirect('/counselor/dashboard');
    }

    public function getRole()
    {
        return 'counselor';
    }
}
