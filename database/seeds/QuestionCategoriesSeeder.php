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
            ['name' => 'Kategori 1', 'description' => 'Menentukan pencapaian target akademik'],
            ['name' => 'Kategori 2', 'description' => 'Menentukan tujuan akademik secara objektif'],
            ['name' => 'Kategori 3', 'description' => 'Menentukan metode / strategi pencapaian tujuan akademik'],
            ['name' => 'Kategori 4', 'description' => 'Mengelola waktu pelaksanaan akademik'],
            ['name' => 'Kategori 5', 'description' => 'Mencari sumber yang dibutuhkan untuk mendukung pencapaian tujuan akademik'],
            ['name' => 'Kategori 6', 'description' => 'Melaksanakan tanggung jawab akademik']
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
