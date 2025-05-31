<?php

namespace App\Helpers;

class ArticleHelper
{
    public static function summary($text, $length = 10)
    {
        return substr($text, 0, $length);
    }
}
