<?php

namespace App;

class URLHelper
{
    public static function withParam(string $params, $value): string
    {
        return http_build_query(array_merge($_GET, [$params => $value]));
    }
}