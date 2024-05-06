<?php

namespace Aznoqmous\ContaoLyraBundle\Helpers;

class StringHelper {
    public static function generateUuid($input=null, int $length = 8){
        $input = $input ?: microtime();
        return str_split(md5($input), $length)[0];
    }
}