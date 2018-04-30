<?php

interface TimeSinkInterface
{
    public function setTime(TimeSourceInterface $timeSource);
    public function response();
}
class TimeSinkA implements TimeSinkInterface
{
    protected $time;

    public function setTime(TimeSourceInterface $timeSource)
    {
        $this->time = $timeSource->getData();
    }

    private function getTime()
    {
        return $this->time;
    }

    public function response()
    {
        return $this->getTime();
    }
}
class TimeSinkB implements TimeSinkInterface
{
    protected $time;

    public function setTime(TimeSourceInterface $timeSource)
    {
        $this->time = $timeSource->getData();
    }

    private function getTime()
    {
        return $this->time;
    }

    public function response()
    {
        return $this->getTime();
    }
}