<?php
/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 26 November 2017, 12:13 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Http\Controllers;


use App\Eloquent\Coupon;
use App\Services\CounselorRegistrar;
use Illuminate\Auth\Guard;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

trait AuthFlow
{
    /**
     * @param Guard $auth
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(Guard $auth, Request $request)
    {
        $this->validate($request, [
            'credential' => 'required|exists:users,credential|max:100',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only(['credential', 'password']);

        if ($auth->attempt($credentials, false))
        {
            return redirect()->intended($this->redirectPath());
        }
        else
        {
            abort(404);
        }
    }

    public function registerStore(CounselorRegistrar $registrar, Request $request)
    {
        $validator = $registrar->validator($request->all());

        $validator->after(function (Validator $validator) use ($request) {
            /** @var Builder $coupon */
            $coupon = new Coupon();
            if (is_null($coupon = $coupon->where('coupon', '=', $request->get('token', null))->first()))
            {
                $validator->errors()->add('coupon', 'Kode Registrasi Tidak Valid');
            }
            else
            {
                //$coupon->delete();
            }
        });

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $registrar->create($request->all());

        return redirect($this->redirectPath());
    }
}

?>
