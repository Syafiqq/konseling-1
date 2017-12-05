<?php namespace App\Http\Controllers\Student;

use App\Eloquent\Answer;
use App\Eloquent\AnswerDetail;
use App\Eloquent\AnswerResult;
use App\Eloquent\Question;
use App\Eloquent\QuestionOption;
use App\Eloquent\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

        return redirect(route('student.course.start.edit', [1]))->with('cbk_msg', ['notify' => ['Selamat Mengerjakan']]);
    }

    /**
     * @param int $question
     * @param AnswerDetail $answer
     * @return \Illuminate\View\View
     */
    public function startEdit($question, AnswerDetail $answer)
    {
        var_dump(Session::get('cbk_msg', null));

        $question = intval($question);
        $answers  = \Illuminate\Support\Facades\Auth::user()->getAttribute('answer')->last()->answer_detail()->skip($question - 2)->take(3)->get();
        $current  = $answer;
        $prev     = null;
        $next     = null;

        /** @var Answer $answer */
        foreach ($answers as $answer)
        {
            $answer_question = intval($answer->getAttribute('question'));
            if ($answer_question === ($question - 1))
            {
                $prev = $answer;
            }
            else if ($answer_question === ($question + 1))
            {
                $next = $answer;
            }
        }
        unset($answers);

        $question = Question::where('id', '=', $question)->first();
        $options  = QuestionOption::all();
        $summary  = \Illuminate\Support\Facades\Auth::user()->getAttribute('answer')->last()->answer_detail()->get(['id', 'question', 'answer']);

        return view("layout.student.course.start.student_course_start_$this->theme", compact('prev', 'current', 'next', 'question', 'options', 'summary'));
    }

    public function startUpdate($question, AnswerDetail $answer, Request $request)
    {
        /** @var Question $question */
        $question = Question::where('id', '=', intval($question))->first();
        $scale    = QuestionOption::all()->count();
        $answer->setAttribute('answer', $request->get('answer'));
        $answer->setAttribute('favour', $question->getAttribute('favour'));
        $answer->setAttribute('scale', $scale);
        if (is_null($answer->getAttribute('answered_at')))
        {
            $answer->setAttribute('answered_at', Carbon::now());
        }
        else
        {
            $answer->setAttribute('updated_at', Carbon::now());
        }
        $answer->save();

        return redirect()->back()->with('cbk_msg', ['notify' => ['Jawaban Berhasil Disimpan']]);
    }
}
