<?php

require_once 'TimeSink.php';
require_once 'TimeSource.php';

interface ClockDriverObserver
{
    public function update($time);
}

class ClockDriver implements ClockDriverObserver
{
    protected $time;
    protected $sink;
    protected $source;

    public function __construct(TimeSinkInterface $sink, TimeSourceInterface $source)
    {
        $this->sink = $sink;
        $this->source = $source;
    }

    public function update($time)
    {
        $this->time = $time;
    }

    private function getTime()
    {
        return $this->time;
    }

    public function showClock()
    {
        echo $this->getTime();
    }
}