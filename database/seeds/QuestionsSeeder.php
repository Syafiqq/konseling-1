<?php

use App\Eloquent\Question;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 01 December 2017, 2:55 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class QuestionsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['question' => 'Question 001', 'category' => 1, 'favour' => 1],
            ['question' => 'Question 002', 'category' => 1, 'favour' => 1],
            ['question' => 'Question 003', 'category' => 1, 'favour' => 2],
            ['question' => 'Question 004', 'category' => 1, 'favour' => 2],
            ['question' => 'Question 005', 'category' => 2, 'favour' => 1],
            ['question' => 'Question 006', 'category' => 2, 'favour' => 1],
            ['question' => 'Question 007', 'category' => 2, 'favour' => 2],
            ['question' => 'Question 008', 'category' => 2, 'favour' => 2],
            ['question' => 'Question 009', 'category' => 3, 'favour' => 1],
            ['question' => 'Question 010', 'category' => 3, 'favour' => 1],
            ['question' => 'Question 011', 'category' => 3, 'favour' => 2],
            ['question' => 'Question 012', 'category' => 3, 'favour' => 2],
        ];

        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new Question();
        foreach ($data as $category)
        {
            if (!$model->where('question', '=', $category['question'])->first())
            {
                $model->insert($category);
            }
        }
    }
}

?>
