<?php
/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 25 November 2017, 11:41 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Services;


use App\Eloquent\User;
use Illuminate\Contracts\Auth\Registrar;

class StudentRegistrar implements Registrar
{
    use UserCustomRegistrar;

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return $this->generateValidator($data, 'student');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function create(array $data)
    {
        /** @var User $model */
        $model = $this->generateUser($data);

        $model->save();

        return $model;
    }
}

?>
