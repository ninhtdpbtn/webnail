<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 9/30/2020
 * Time: 5:28 PM
 */

namespace App\Services;


class BookingService
{

    public function test($af, $b, $c)
    {
        return $af + $b + $c;
    }

    public static function testStatic($a, $b, $c)
    {
        return $a + $b + $c;
    }

}