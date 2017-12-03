<?php namespace App\Eloquent;

use App\Generators\DefaultAvatarGenerator;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use DefaultAvatarGenerator;
    /**
     * @var bool
     */
    public $timestamps = true;
    /**
     * @var string
     */
    protected $table = 'users';
    /**
     * @var array
     */
    protected $dates = [];
    /**
     * @var array
     */
    protected $guarded = ['id', 'credential', 'role', 'password', 'remember_token', 'created_at', 'updated_at'];
    /**
     * @var array
     */
    protected $fillable = ['name', 'gender', 'avatar'];
    /**
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
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
     * @return null|string
     */
    public function getGenderTranslation()
    {
        switch ($this->getAttribute('gender'))
        {
            case 'male' :
                $translatedGender = 'Laki - Laki';
            break;
            case 'female' :
                $translatedGender = 'Wanita';
            break;
            default :
                $translatedGender = null;
            break;
        }

        return $translatedGender;
    }

    public function coupon()
    {
        return $this->hasMany('App\Eloquent\Coupon', 'assignee', 'id');
    }

    public function counselor()
    {
        return $this->hasOne('App\Eloquent\UserCounselors', 'user', 'id');
    }

    public function student()
    {
        return $this->hasOne('App\Eloquent\UserStudents', 'user', 'id');
    }

    public function answer()
    {
        return $this->hasMany('App\Eloquent\Answer', 'user', 'id');
    }

    /**
     * @return bool
     */
    public function isDetailReportValid()
    {
        //Fuck it, Change to better guard than this
        return ((count($this->getAttribute('answer')) === 1) && (!is_null($this->getAttribute('answer')->last()->getAttribute('finished_at')))) || (count($this->getAttribute('answer')) > 1);
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->getAttribute('password');
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->getAttribute($this->getRememberTokenName());
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->setAttribute($this->getRememberTokenName(), $value);
    }

    /**
     * @return string
     */
    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }
}
