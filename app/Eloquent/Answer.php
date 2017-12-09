<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public static $exerciseWindow = 7;
    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var string
     */
    protected $table = 'answers';
    /**
     * @var array
     */
    protected $dates = ['started_at', 'finished_at'];
    /**
     * @var array
     */
    protected $guarded = ['id', 'user', 'started_at', 'finished_at'];
    /**
     * @var array
     */
    protected $fillable = [];
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

    public function answer_result()
    {
        return $this->hasMany('App\Eloquent\AnswerResult', 'answer_code', 'id');
    }

    public function answer_detail()
    {
        return $this->hasMany('App\Eloquent\AnswerDetail', 'answer_code', 'id');
    }

    public function getResultAnalytics($accumulation)
    {
        $accumulation = doubleval($accumulation);
        $analytics    = [];
        if (($accumulation >= 0.0) && ($accumulation <= 33.3))
        {
            $analytics['interval']    = '0 - 33%';
            $analytics['class']       = 'Rendah';
            $analytics['description'] = ['key' => 'Ini Adalah Key : ', 'value' => ['Deskripsi Rendah']];
        }
        else if (($accumulation > 33.3) && ($accumulation <= 66.6))
        {
            $analytics['interval']    = '34 - 66%';
            $analytics['class']       = 'Sedang';
            $analytics['description'] = ['key' => 'Ini Adalah Key : ', 'value' => ['Deskripsi Sedang']];
        }
        else if (($accumulation > 66.6) && ($accumulation <= 100.0))
        {
            $analytics['interval']    = '67 - 100%';
            $analytics['class']       = 'Tinggi';
            $analytics['description'] = ['key' => 'Ini Adalah Key : ', 'value' => ['Deskripsi Tinggi']];
        }
        else
        {
            $analytics['interval']    = '-';
            $analytics['class']       = '-';
            $analytics['description'] = ['key' => '-', 'value' => ['-']];
        }

        return $analytics;
    }

    /**
     * @return string
     */
    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }

}
