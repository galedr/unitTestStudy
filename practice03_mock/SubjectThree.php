<?php

class SubjectThree
{
    protected $value;
    protected $method;

    public function __construct(IResponserThree $responserThree, $value)
    {
        $this->method = $responserThree;
        $this->value = $value;
    }
    public function getResult()
    {
        ($this->value > 5) ? $this->method->react() : $this->method->reportError();
    }
}

interface IResponserThree
{
    public function react();

    public function reportError();
}

class ResponserThree
{
    public function react()
    {
        echo 'subject report true, work through';
    }
    public function reportError()
    {
        echo 'subject report false, error';
    }
}