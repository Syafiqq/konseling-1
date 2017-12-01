<?php namespace App\Http\Controllers\Student;

use App\Eloquent\User;
use App\Eloquent\UserStudents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class Profile extends Controller
{
    /**
     * @var UserStudents
     */
    private $student;


    /**
     * Profile constructor.
     */
    public function __construct()
    {
        parent::__construct();
        /** @var User $user */
        /** @noinspection PhpUndefinedMethodInspection */
        $this->student = \Illuminate\Support\Facades\Auth::user()->getAttribute('student');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        var_dump(Session::get('cbk_msg', null));

        return view("layout.student.profile.edit.student_profile_edit_$this->theme", ['student' => $this->student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        /** @noinspection PhpUndefinedMethodInspection */
        var_dump(Session::get('cbk_msg', null));

        $this->validate($request, [
            'school' => 'required',
            'grade' => 'required',
        ]);

        $student = $request->only(['school', 'grade']);

        $this->student->update($student);

        return redirect()->back()->with('cbk_msg', 'Perubahan Berhasil');
    }
}
