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
        dd(Session::get('cbk_msg', ''));
    }

    public function couponGenerator()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        /** @var User $user */
        $user = \Illuminate\Support\Facades\Auth::user();
        while (1)
        {
            try
            {
                $coupon = new Coupon(['coupon' => $this->generate()]);
                $user->coupon()->save($coupon);
                break;
            }
            catch (QueryException $ignored)
            {
            }
        }
        $redirect = redirect()->intended(route('counselor.home.dashboard'))->with('cbk_msg', 'Kupon Berhasil Ditambahkan');

        return $redirect;
    }
}
