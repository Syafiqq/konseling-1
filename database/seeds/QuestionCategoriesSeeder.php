<?php

use App\Eloquent\QuestionCategory;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 01 December 2017, 1:35 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class QuestionCategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'c-1', 'description' => 'Category-1'],
            ['name' => 'c-2', 'description' => 'Category-2'],
            ['name' => 'c-3', 'description' => 'Category-3']
        ];

        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new QuestionCategory();
        foreach ($data as $category)
        {
            if (!$model->where('name', '=', $category['name'])->first())
            {
                $model->insert($category);
            }
        }
    }

}

?>
