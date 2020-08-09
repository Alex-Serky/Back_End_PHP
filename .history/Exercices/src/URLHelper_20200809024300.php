<?php

namespace App;

class URLHelper
{
    public static function withParam(string $params, string $value): string
    {
        return http_build_query(array_merge($_GET, [$params => $value]));
    }
}