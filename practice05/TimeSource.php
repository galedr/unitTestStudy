<?php

require_once 'ClockDriver.php';

abstract class TimeSourceInterface
{
    protected $observer = [];
    protected $data = [];

    public function setObserver(TimeSinkInterface $timeSink)
    {
        $this->observer[] = $timeSink;
    }

    abstract public function setTime();
    abstract public function setData(DataWarehouseInterface $dataWarehouse);
}

class TimeSource extends TimeSourceInterface
{
    public function setTime()
    {
        foreach ($this->observer as $k => $v) {
            $v->setTime($this);
        }
    }
    public function setData(DataWarehouseInterface $dataWarehouse)
    {
        $this->data = $dataWarehouse->getData();
    }
    public function getData()
    {
        return $this->data;
    }
}

class TimeSourceB extends TimeSourceInterface
{
    public function setTime()
    {
        foreach ($this->observer as $k => $v) {
            $v->setTime($this);
        }
    }
    public function setData(DataWarehouseInterface $dataWarehouse)
    {
        $this->data = $dataWarehouse->getData();
    }
    public function getData()
    {
        return $this->changeData();
    }

    private function changeData()
    {
        $result = [];
        foreach ($this->data as $k => $v) {
            $result[$k] = (int)$v + 5;
        }
        return $result;
    }
}