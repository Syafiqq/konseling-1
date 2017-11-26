<?php
/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 25 November 2017, 11:44 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Services;


use App\Eloquent\User;
use Illuminate\Support\Facades\Validator;

trait UserCustomRegistrar
{
    public function generateValidator(array $data, $role = 'student')
    {
        /** @var \Illuminate\Validation\Factory $validator */
        $validator = Validator::getFacadeRoot();

        return $validator->make($data, [
            'credential' => 'required|max:100|unique:users',
            'name' => 'required|max:100',
            'gender' => 'required|in:male,female',
            'role' => "required|in:$role",
            'password' => 'required|confirmed|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function generateUser(array $data)
    {
        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new User;
        $model->setAttribute('credential', $data['credential']);
        $model->setAttribute('name', $data['name']);
        $model->setAttribute('gender', $data['gender']);
        $model->setAttribute('role', $data['role']);
        $model->setAttribute('avatar', $model->generate($model->getAttribute('gender')));
        $model->setAttribute('password', bcrypt($data['password']));

        return $model;
    }
}

?>
