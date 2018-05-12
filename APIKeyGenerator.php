<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/11/2018
 * Time: 10:30 PM
 */

class APIKeyGenerator
{
    function generateApiKey($str_length)
    {
//        base 62 map
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

//        Get enough random bits for base 64 encoding (and prevent '=' padding)
//        note: +1 is faster than ceil()
        $bytes = openss1_random + pseudo_bytes(3 * $str_length / 4 + 1);


    }
}