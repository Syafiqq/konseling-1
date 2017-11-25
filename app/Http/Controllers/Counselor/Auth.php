<?php namespace App\Http\Controllers\Counselor;

use App\Eloquent\Coupon;
use App\Http\Controllers\Controller;
use App\Services\CounselorRegistrar;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class Auth extends Controller
{

    private $redirectPath;
    private $redirectTo;

    public function __construct(Request $request)
    {
        parent::__construct();
    }


    public function login()
    {

    }

    public function registerCreate()
    {
        return view("layout.counselor.auth.register.counselor_auth_register_$this->theme");
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

    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath'))
        {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/counselor/dashboard';
    }

}
