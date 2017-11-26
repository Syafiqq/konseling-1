<?php namespace App\Http\Controllers\Counselor;

use App\Http\Controllers\AuthFlow;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PathRedirector;

class Auth extends Controller
{
    use PathRedirector, AuthFlow;

    public function getLogin()
    {
        return view("layout.counselor.auth.login.counselor_auth_login_$this->theme");
    }

    public function registerCreate()
    {
        return view("layout.counselor.auth.register.counselor_auth_register_$this->theme");
    }

    public function redirectPath()
    {
        $this->redirect('/counselor/dashboard');
    }
}
