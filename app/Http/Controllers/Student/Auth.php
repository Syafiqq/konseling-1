<?php namespace App\Http\Controllers\Student;

use App\Http\Controllers\AuthFlow;
use App\Http\Controllers\Controller;

class Auth extends Controller
{
    use AuthFlow
    {
        registerStore as private _registerStore;
    }

    private $role = 'student';

    public function getLogin()
    {
        return view("layout.student.auth.login.student_auth_login_$this->theme");
    }

    public function registerCreate()
    {
        return view("layout.student.auth.register.student_auth_register_$this->theme");
    }

    public function getLost()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        var_dump(\Illuminate\Support\Facades\Session::get('cbk_msg', null));
        $this->theme = 'default';

        return view("layout.student.auth.lost.student_auth_lost_$this->theme");
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
