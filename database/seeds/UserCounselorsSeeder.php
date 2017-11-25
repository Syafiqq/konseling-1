<?php

use App\Eloquent\User;
use App\Eloquent\UserCounselors;
use App\Generators\DefaultAvatarGenerator;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 19 November 2017, 6:48 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class UserCounselorsSeeder extends Seeder
{
    use DefaultAvatarGenerator;

    public function run()
    {
        $nip = '125150200111112';
        /** @var \Illuminate\Database\Query\Builder $user */
        $user = new User();
        if (!$user->where('credential', '=', $nip)->first())
        {
            $user->setAttribute('credential', $nip);
            $user->setAttribute('name', 'Admin');
            $user->setAttribute('gender', 'male');
            $user->setAttribute('role', 'counselor');
            $user->setAttribute('avatar', $this->generate($user->getAttribute('gender')));
            $user->setAttribute('password', bcrypt('12345678'));
            $user->save();

            $counselor = new UserCounselors();
            $counselor->setAttribute('school', 'UM');
            $counselor->setAttribute('school_head', 'UM Head');
            $counselor->setAttribute('school_head_credential', 'UM Credential');

            $user->counselor()->save($counselor);
        }
    }
}

?>
