<?php namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class Home extends Controller
{
    public function index()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        dd(Session::get('cbk_msg', null));
    }
}
