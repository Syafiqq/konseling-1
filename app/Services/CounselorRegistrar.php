<?php
/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 20 November 2017, 6:44 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Services;


use App\Eloquent\User;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Support\Facades\Validator;

class CounselorRegistrar implements Registrar
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        /** @var \Illuminate\Validation\Factory $validator */
        $validator = Validator::getFacadeRoot();

        return $validator->make($data, [
            'credential' => 'required|max:100|unique:users',
            'name' => 'required|max:100',
            'gender' => 'required|in:male,female',
            'role' => 'required|in:counselor',
            'password' => 'required|confirmed|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function create(array $data)
    {
        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new User;
        $model->setAttribute('credential', $data['credential']);
        $model->setAttribute('name', $data['name']);
        $model->setAttribute('gender', $data['gender']);
        $model->setAttribute('role', $data['role']);
        $model->setAttribute('avatar', $model->generate($model->getAttribute('gender')));
        $model->setAttribute('password', bcrypt($data['password']));

        $model->save();

        return $model;
    }
}

?>
