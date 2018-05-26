<?php

require_once '../vendor/autoload.php';
require_once 'index08.php';

class Test08 extends \PHPUnit\Framework\TestCase
{
    public function testFizzBuzz()
    {
        $method = new Index08();
        $testRange = [10, 15];
        $method->setRange($testRange);
        $except = '10buzz<br>11<br>12fizz<br>13<br>14<br>15fizzbuzz<br>';

        $this->assertEquals($except, $method->fizzBuzz());
    }
}