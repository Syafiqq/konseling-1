<?php namespace App\Http\Controllers\Counselor;

use App\Eloquent\Coupon;
use App\Eloquent\User;
use App\Generators\CouponGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class Home extends Controller
{
    use CouponGenerator;

    public function index()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        var_dump(Session::get('cbk_msg', null));
    }

    public function couponGenerator()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        /** @var User $user */
        $user = \Illuminate\Support\Facades\Auth::user();
        $code = $this->generate();
        while (1)
        {
            try
            {
                $coupon = new Coupon(['coupon' => $code]);
                $user->coupon()->save($coupon);
                break;
            }
            catch (QueryException $ignored)
            {
            }
            $code = $this->generate();
        }
        $redirect = redirect()->intended(route('counselor.home.dashboard'))->with('cbk_msg', ['message' => "Kode : $code", 'notify' => 'Kode Berhasil Ditambahkan']);

        return $redirect;
    }
}
