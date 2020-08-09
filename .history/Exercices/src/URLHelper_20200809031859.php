<?php

namespace App;

class URLHelper
{
    public static function withParam($params, $value):
    {
        return http_build_query(array_merge($_GET, [$params => $value]));
    }
}