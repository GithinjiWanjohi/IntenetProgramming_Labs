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

        // convert base 64 to base 62 by mapping + and / to something from the base 62 map
        // use the first two random bytes for new characters
        $repl = unpack('C2', $bytes);

        $first = $chars[$repl[1]%62];
        $second = $chars[$repl[2]%62];
        return strtr(substr(base64_encode($bytes), 0 , $str_length. '+/', "$first$second"));
    }

    function saveApiKey(){
        /*Write code that will save the Api Key for the user
        This function returns true if the key is saved
        False if otherwise*/
        return true;
    }

    function generateResponse($api_key){
        if($this->saveApiKey()){
            $res = ['success' => 1, 'message' => $api_key];
        }else{
            $res = ['success' => 0, 'message' => 'Something went wrong. Please regenerate the API key'];
        }
        return json_encode($res);
    }
}