<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Counselors extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var string
     */
    protected $table = 'counselor_accounts';
    /**
     * @var array
     */
    protected $dates = [];
    /**
     * @var array
     */
    protected $guarded = ['id', 'user'];
    /**
     * @var array
     */
    protected $fillable = ['school', 'school_head', 'school_head_credential'];
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

    public function user()
    {
        return $this->belongsTo('App\Eloquent\User', 'user', 'id');
    }

    /**
     * @return string
     */
    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }
}
