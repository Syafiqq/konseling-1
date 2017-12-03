<?php namespace App\Http\Controllers\Counselor;

use App\Eloquent\User;
use App\Eloquent\UserStudents;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Session;

class Report extends Controller
{
    public function index()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        var_dump(Session::get('cbk_msg', null));

        $reports = User::with(['student', 'answer' => function (HasMany $query) {
            $query->latest('finished_at');
        }])->where('role', '=', 'student')->get();

        return view("layout.counselor.report.list.counselor_report_list_$this->theme", ['reports' => $reports]);
    }

    public function activation($id)
    {
        /** @var UserStudents $student */
        $student = UserStudents::where('user', '=', $id)->first();
        $student->setAttribute('active', true);
        $student->save();

        return redirect()->back()->with('cbk_msg', ['notify' => ['Siswa Berhasil Diaktifkan']]);
    }
}
