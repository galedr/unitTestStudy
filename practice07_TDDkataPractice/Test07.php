<?php
require_once 'CalMethod.php';

use PHPUnit\Framework\TestCase;
class Test07 extends TestCase
{
    public function testCal()
    {
        $expact = '3Fizz<br>5Buzz<br>15FizzBuzz<br>';
        $cal = new CalMethod();
        $cal->setArr([3, 5, 15]);

        $this->assertEquals($expact, $cal->response());
    }
}