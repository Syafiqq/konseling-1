<?php
/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 26 November 2017, 1:12 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Services;


class StudentRegistrar extends UserRegistrar
{

    /**
     * @return string
     */
    public function getRole()
    {
        return 'student';
    }
}

?>
