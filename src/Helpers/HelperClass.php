<?php

namespace App\Helpers;

class HelperClass
{
    public static function getHash(): string{
        $bytes = random_bytes(20);
        $base64 = base64_encode($bytes);
        $randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz01234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2);
        return rtrim(strtr($base64, '+/', $randomletter), '=');
    }
}