<?php

use App\URLHelper;
use PHPUnit\Framework\TestCase;

class URLHelperTest extends TestCase
{
    public function assertURLEquals(string $expected, string $url)
    {
        $this->assertEquals($expected, urldecode($url));
    }

    public function testWithParam()
    {
        $url = URLHelper::withParam([], 'k', 3);
        $this->assertEquals("k=3", $url);
    }

    public function testWithParamWIthArray()
    {
        $url = URLHelper::withParam([], 'k', [3,2,1]);
        $this->assertEquals("k=3,2,1", $url);
    }
}