<?php

require_once '../vendor/autoload.php';
require_once 'index09.php';

class Test09 extends \PHPUnit\Framework\TestCase
{
    public function testGetResult()
    {
        $method = new Index09(4, 100);

        $this->assertEquals(190, $method->getResult());
    }
}