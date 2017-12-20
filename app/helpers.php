<?php
if (!function_exists('createNoncestr')){
    function createNoncestr($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }
}
if (!function_exists('setUserToken')){
    function setUserToken($key,$value)
    {
        \Illuminate\Support\Facades\Redis::set($key,$value);
    }
}
if (!function_exists('getUserToken')) {
    function getUserToken($key)
    {
        $uid = \Illuminate\Support\Facades\Redis::get($key);
        if (!isset($uid)){
            return false;
        }
        return $uid;
    }
}
function getRandomFloat($min = 0, $max = 1) {
      //if ($max < $min) {
  //  return false;
  //}
  $rl = mt_rand() / mt_getrandmax();
  //echo $min . ‘+(‘ . $rl . ‘*‘ . ($max - $min).‘)‘; echo ‘ = ‘;
   return ($min + ($rl * ($max - $min)));
 }