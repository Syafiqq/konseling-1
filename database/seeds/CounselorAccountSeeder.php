<?php

use App\Eloquent\CounselorAccount;
use App\Generators\DefaultAvatarGenerator;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 19 November 2017, 6:48 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class CounselorAccountSeeder extends Seeder
{
    use DefaultAvatarGenerator;

    public function run()
    {
        $nip = '125150200111112';
        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new CounselorAccount;
        if (!$model->where('credential', '=', $nip)->first())
        {
            $model->setAttribute('credential', $nip);
            $model->setAttribute('name', 'Admin');
            $model->setAttribute('gender', 'male');
            $model->setAttribute('avatar', $this->generate($model->getAttribute('gender')));
            $model->setAttribute('school', 'UM');
            $model->setAttribute('school_head', 'UM Head');
            $model->setAttribute('school_head_credential', 'UM Credential');
            $model->setAttribute('password', bcrypt('12345678'));
            $model->save();
        }
    }
}

?>
