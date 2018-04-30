<?php

require_once 'ClockDriver.php';
require_once 'TimeSink.php';
require_once 'TimeSource.php';
require_once 'DataWarehouse.php';

$timeSource = new TimeSource();
$timeSinkA = new TimeSinkA();
$timeSinkB = new TimeSinkB();
$data = new DataWarehouse();

$classes = [$timeSinkA, $timeSinkB];

foreach ($classes as $k => $v) {
    $timeSource->setObserver($v);
}

$timeSource->setData($data);
$timeSource->setTime();

print_r($timeSinkA->response());