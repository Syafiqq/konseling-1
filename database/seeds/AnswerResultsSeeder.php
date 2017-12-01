<?php

use App\Eloquent\AnswerResult;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 01 December 2017, 7:30 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class AnswerResultsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                ['answer_code' => 1, 'category' => 1, 'result' => 0.0],
                ['answer_code' => 1, 'category' => 2, 'result' => 0.0],
                ['answer_code' => 1, 'category' => 3, 'result' => 0.0],
            ],
            [
                ['answer_code' => 2, 'category' => 1, 'result' => 0.0],
                ['answer_code' => 2, 'category' => 2, 'result' => 0.0],
                ['answer_code' => 2, 'category' => 3, 'result' => 0.0],
            ],
            [
                ['answer_code' => 3, 'category' => 1, 'result' => 0.0],
                ['answer_code' => 3, 'category' => 2, 'result' => 0.0],
                ['answer_code' => 3, 'category' => 3, 'result' => 0.0],
            ],
            [
                ['answer_code' => 4, 'category' => 1, 'result' => 0.0],
                ['answer_code' => 4, 'category' => 2, 'result' => 0.0],
                ['answer_code' => 4, 'category' => 3, 'result' => 0.0],
            ]
        ];

        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new AnswerResult();
        foreach ($data as $c1)
        {
            foreach ($c1 as $c2)
            {
                if (!$model->where('answer_code', '=', $c2['answer_code'])->where('category', '=', $c2['category'])->first())
                {
                    $model->insert($c2);
                }
            }
        }
    }
}

?>
