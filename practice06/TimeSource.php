<?php

require_once 'ClockDriver.php';

class TimeSinkRegister
{
    protected $observer = [];

    public function setObserver(TimeSinkInterface $timeSink)
    {
        $this->observer[] = $timeSink;
    }
    public function setTime()
    {
        foreach ($this->observer as $k => $v) {
            $v->setTime($this);
        }
    }
}

interface TimeSourceInterface
{
    public function setData(DataWarehouseInterface $dataWarehouse);
}

class TimeSource extends TimeSinkRegister implements TimeSourceInterface
{
    protected $data = [];

    public function setData(DataWarehouseInterface $dataWarehouse)
    {
        $this->data = $dataWarehouse->getData();
    }
    public function getData()
    {
        return $this->data;
    }
}

class TimeSourceB extends TimeSinkRegister implements TimeSourceInterface
{
    protected $data = [];

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