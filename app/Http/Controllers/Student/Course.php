<?php namespace App\Http\Controllers\Student;

use App\Eloquent\Answer;
use App\Eloquent\AnswerDetail;
use App\Eloquent\AnswerResult;
use App\Eloquent\Question;
use App\Eloquent\QuestionOption;
use App\Eloquent\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Course extends Controller
{

    public function index()
    {
        var_dump(Session::get('cbk_msg', null));

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

        return redirect(route('student.course.start', [1]))->with('cbk_msg', ['notify' => ['Selamat Mengerjakan']]);
    }

    /**
     * @param int $question
     * @param Collection $answers
     */
    public function start($question, Collection $answers)
    {
        $question = intval($question);
        $prev     = $current = $next = null;
        /** @var Answer $answer */
        foreach ($answers as $answer)
        {
            $answer_question = intval($answer->getAttribute('question'));
            if ($answer_question === ($question - 1))
            {
                $prev = $answer;
            }
            else if ($answer_question === ($question))
            {
                $current = $answer;
            }
            else if ($answer_question === ($question + 1))
            {
                $next = $answer;
            }
        }
        unset($answers);

        $question = Question::where('id', '=', $question)->first();
        $options  = QuestionOption::all();

        dd([$prev, $current, $next, $question, $options]);
    }
}
