<?php

require '../../vendor/autoload.php';
require 'SubjectOne.php';

class TestOne extends \PHPUnit\Framework\TestCase
{
    public function testGetSquare()
    {
        //TODO SubjectOne Test
        $test = 2;
        $expect = [$test];
        $method = new SubjectOne();
        $this->assertEquals($expect, $method->getSquare($test));
//        if ($method->getSquare($test) == $expect) {
//            return true;
//        } else {
//            return false;
//        }
    }
}