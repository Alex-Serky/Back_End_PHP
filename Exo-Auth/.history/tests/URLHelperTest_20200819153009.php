<?php

use App\URLHelper;
use PHPUnit\Framework\TestCase;

class URLHelperTest extends TestCase
{
    public function testWithParam()
    {
        $url = URLHelper::withParam([], 'k', 3);
        $this->assertEquals("k=3", $url);
    }
}