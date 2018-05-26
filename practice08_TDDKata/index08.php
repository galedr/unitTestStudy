<?php

$method = new Index08();
$method->setRange([0, 100]);
echo $method->fizzBuzz();

class Index08
{
    protected $range = [];

    public function setRange(array $range)
    {
        $this->range = $range;
    }

    private function getRange()
    {
        return $this->range;
    }

    public function fizzBuzz()
    {
        if (empty($this->getRange())) {
            exit;
        }
        $str = '';
        $range = $this->getRange();
        for ($i = $range[0]; $i <= $range[1]; $i++) {
            $str .= $this->getDecodeStr($i);
        }
        return $str;
    }

    private function getDecodeStr($num)
    {
        $result = '';
        if (($num % 3) == 0) {
            $result .= 'fizz';
        }
        if (($num % 5) == 0) {
            $result .= 'buzz';
        }
        return $num . $result . '<br>';
    }
}