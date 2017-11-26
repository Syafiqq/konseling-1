<?php
/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 26 November 2017, 12:58 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Services;


class CounselorRegistrar extends UserRegistrar
{
    /**
     * @return string
     */
    public function getRole()
    {
        return 'counselor';
    }
}

?>
