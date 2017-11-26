<?php namespace App\Http\Controllers\Student;

use App\Http\Controllers\AuthFlow;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PathRedirector;

class Auth extends Controller
{
    use PathRedirector, AuthFlow;

    public function getLogin()
    {
        return view("layout.student.auth.login.student_auth_login_$this->theme");
    }

    public function registerCreate()
    {
        return view("layout.student.auth.register.student_auth_register_$this->theme");
    }

    public function redirectPath()
    {
        $this->redirect('/student/dashboard');
    }
}
