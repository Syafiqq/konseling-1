<?php namespace App\Http\Controllers\Student;

use App\Eloquent\Answer;
use App\Eloquent\AnswerDetail;
use App\Eloquent\AnswerResult;
use App\Eloquent\Question;
use App\Eloquent\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Course extends Controller
{

    public function index()
    {
        /** @var User $user */
        $user = \Illuminate\Support\Facades\Auth::user();

        return view("layout.student.course.index.student_course_index_$this->theme", compact('user'));
    }

    public function create()
    {
        /** @var User $user */
        $user = \Illuminate\Support\Facades\Auth::user();

        $questionCategories = Question::where('active', '=', true)->distinct()->lists('category');
        $questions          = Question::where('active', '=', true)->lists('id');

        $answer = new Answer();
        $answer->setAttribute('started_at', Carbon::now());
        $user->answer()->save($answer);

        DB::transaction(function () use ($questionCategories, $answer, $questions) {
            foreach ($questions as $question)
            {
                $answerDetail = new AnswerDetail();
                $answerDetail->setAttribute('question', $question);
                $answer->answer_detail()->save($answerDetail);
            }
            foreach ($questionCategories as $questionCategory)
            {
                $answerResult = new AnswerResult();
                $answerResult->setAttribute('category', $questionCategory);
                $answer->answer_result()->save($answerResult);
            }
        });

    }
}
