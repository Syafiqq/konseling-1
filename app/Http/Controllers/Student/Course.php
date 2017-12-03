<?php namespace App\Http\Controllers\Student;

use App\Eloquent\User;
use App\Http\Controllers\Controller;

class Course extends Controller
{

    public function index()
    {
        /** @var User $user */
        $user = \Illuminate\Support\Facades\Auth::user();

        return view("layout.student.course.index.student_course_index_$this->theme", compact('user'));
    }

}
