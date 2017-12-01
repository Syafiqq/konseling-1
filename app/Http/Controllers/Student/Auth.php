<?php namespace App\Http\Controllers\Student;

use App\Http\Controllers\AuthFlow;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class Auth extends Controller
{
    use AuthFlow
    {
        registerStore as private _registerStore;
    }

    private $role = 'student';

    public function getLogin()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        var_dump(Session::get('cbk_msg', null));

        return view("layout.student.auth.login.student_auth_login_$this->theme");
    }

    public function registerCreate()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        var_dump(Session::get('cbk_msg', null));

        return view("layout.student.auth.register.student_auth_register_$this->theme");
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
        return redirect()->route('student.auth.login.get', [$this->role]);
    }
}
