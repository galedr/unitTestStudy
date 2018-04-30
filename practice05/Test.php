<?php
require_once 'ClockDriver.php';
require_once 'TimeSink.php';
require_once 'TimeSource.php';
require_once 'DataWarehouse.php';

use PHPUnit\Framework\TestCase;
class ClockExample2Test extends TestCase
{
    public function testClockDriver()
    {
        $data = $this->createMock(DataWarehouseInterface::class);
        $testValue = [30, 30, 12];
        $data->method('getData')->willReturn($testValue);
        $timeSource = new TimeSource();
        $timeSinkA = new TimeSinkA();
        $timeSinkB = new TimeSinkB();

        $classes = [$timeSinkA, $timeSinkB];

        foreach ($classes as $k => $v) {
            $timeSource->setObserver($v);
        }
        $timeSource->setData($data);
        $timeSource->setTime();

        $this->assertEquals([30, 30, 12], $timeSinkA->response());
        $this->assertEquals([30, 30, 12], $timeSinkB->response());
    }

    public function testTimeSourceB()
    {
        $data = $this->createMock(DataWarehouseInterface::class);
        $testValue = [30, 30, 12];
        $data->method('getData')->willReturn($testValue);
        $timeSource = new TimeSourceB();
        $timeSinkA = new TimeSinkA();
        $timeSinkB = new TimeSinkB();

        $classes = [$timeSinkA, $timeSinkB];

        foreach ($classes as $k => $v) {
            $timeSource->setObserver($v);
        }
        $timeSource->setData($data);
        $timeSource->setTime();

        $this->assertEquals([35, 35, 17], $timeSinkA->response());
        $this->assertEquals([35, 35, 17], $timeSinkB->response());
    }
}