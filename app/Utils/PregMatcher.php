<?php

namespace App\Utils;

class PregMatcher
{
    public static function getYoutubeCode($link)
    {
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $link, $matches);
        return isset($matches[1]) ? $matches[1] : null;
    }
}