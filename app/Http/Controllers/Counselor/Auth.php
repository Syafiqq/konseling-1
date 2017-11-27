<?php namespace App\Http\Controllers\Counselor;

use App\Http\Controllers\AuthFlow;
use App\Http\Controllers\Controller;

class Auth extends Controller
{
    use AuthFlow
    {
        registerStore as private _registerStore;
    }

    private $role = 'counselor';

    public function getLogin()
    {
        return view("layout.counselor.auth.login.counselor_auth_login_$this->theme");
    }

    public function registerCreate()
    {
        return view("layout.counselor.auth.register.counselor_auth_register_$this->theme");
    }

    /**
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|string
     */
    public function defaultRedirectPath()
    {
        return "/{$this->role}/dashboard";
    }

    /**
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|string
     */
    public function defaultLoginPath()
    {
        return redirect()->route('counselor.auth.login.get', [$this->role]);
    }
}
