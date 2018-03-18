<?php

require '../../vendor/autoload.php';
require 'SubjectTwo.php';

class TestTwo extends \PHPUnit\Framework\TestCase
{
    public function testGetSquare()
    {
        $mock = $this->createMock(IDataBaseTwo::class);
        $test = 4;
        $except = 16;
        $mock->method('response')->willReturn($test);
        $method = new RefSubjectTwo($mock);
        $this->assertEquals($except, $method->getSquare());
    }
}