<?php

use App\Eloquent\CounselorAccount;
use App\Eloquent\Coupon;
use App\Eloquent\User;
use App\Generators\CouponGenerator;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 19 November 2017, 5:21 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class CouponSeeder extends Seeder
{
    use CouponGenerator;

    public function run()
    {
        $nip = '125150200111112';
        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new User;
        /** @var User $admin */
        if ($admin = $model->where('credential', '=', $nip)->first())
        {
            $count = 6;
            while (--$count)
            {
                while (1)
                {
                    try
                    {
                        $coupon = new Coupon(['coupon' => $this->generate()]);
                        $admin->coupon()->save($coupon);
                        break;
                    }
                    catch (Illuminate\Database\QueryException $ignored)
                    {
                    }
                }
            }
        }
    }
}

?>
