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


class UserRegistrar implements Registrar
{
    private $role;

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
            'role' => "required|in:{$this->role}",
            'password' => 'required|confirmed|min:8',
            'token' => "required|exists:coupons,coupon,usage,{$this->role}",
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
        /** @var User $model */
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

    public function setRole($role)
    {
        $this->role = $role;
    }
}

?>
