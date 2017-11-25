<?php namespace App\Eloquent;

use App\Generators\DefaultAvatarGenerator;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class CounselorAccount extends Model implements Authenticatable
{
    use DefaultAvatarGenerator;
    /**
     * @var bool
     */
    public $timestamps = true;
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
    protected $guarded = ['id', 'credential', 'password', 'remember_token', 'created_at', 'updated_at'];
    /**
     * @var array
     */
    protected $fillable = ['name', 'gender', 'school', 'school_head', 'school_head_credential', 'avatar'];
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

    /**
     * @return string
     */
    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
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
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /** Get User Role
     *
     * @return string
     */
    public function getRole()
    {
        return 'counselor';
    }
}
