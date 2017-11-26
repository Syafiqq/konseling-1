<?php namespace App\Http\Controllers\Student;

use App\Contracts\RedirectResolver;
use App\Contracts\Roleable;
use App\Http\Controllers\AuthFlow;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PathRedirector;
use App\Services\StudentRegistrar;
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
        return view("layout.student.auth.login.student_auth_login_$this->theme");
    }

    public function registerCreate()
    {
        return view("layout.student.auth.register.student_auth_register_$this->theme");
    }

    public function registerStore(StudentRegistrar $registrar, Request $request, Guard $guard)
    {
        return $this->_registerStore($registrar, $request, $guard);
    }


    public function redirectPath()
    {
        return $this->redirect('/student/dashboard');
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return 'student';
    }
}
