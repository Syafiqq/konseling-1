<?php
/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 19 November 2017, 5:03 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var string
     */
    protected $table = 'coupons';
    /**
     * @var array
     */
    protected $dates = [];
    /**
     * @var array
     */
    protected $guarded = ['id', 'assignee', 'created_at'];
    /**
     * @var array
     */
    protected $fillable = ['coupon'];
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @return mixed
     */
    public function getRouteKey()
    {
        return $this->getAttribute('id');
    }

    /**
     * @return string
     */
    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }
}

?>
