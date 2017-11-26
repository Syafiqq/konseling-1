<?php

use App\Eloquent\User;
use App\Eloquent\UserStudents;
use App\Generators\DefaultAvatarGenerator;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 25 November 2017, 11:30 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class UserStudentsSeeder extends Seeder
{
    use DefaultAvatarGenerator;

    /**
     *
     */
    public function run()
    {
        $nisn = '10000';
        /** @var \Illuminate\Database\Query\Builder $user */
        $user = new User();
        if (!$user->where('credential', '=', $nisn)->first())
        {
            $user->setAttribute('credential', $nisn);
            $user->setAttribute('name', 'Student');
            $user->setAttribute('gender', 'male');
            $user->setAttribute('role', 'student');
            $user->setAttribute('avatar', $this->generate($user->getAttribute('gender')));
            $user->setAttribute('password', bcrypt('12345678'));
            $user->save();

            $counselor = new UserStudents();
            $counselor->setAttribute('school', 'UM');

            $user->student()->save($counselor);
        }
    }
}

?>
