<?php

class CalMethod
{
    protected $arr = [];

    public function setArr($arr = null)
    {
        if (!empty($arr)) {
            $this->arr = $arr;
        } else {
            for ($i = 1; $i <= 100; $i++) {
                $this->arr[] = $i;
            }
        }
    }

    private function getArr()
    {
        return $this->arr;
    }

    public function response()
    {
        $result = '';
        foreach ($this->getArr() as $k => $v) {
            if (($v % (3 * 5)) == 0) {
                $result .= $v . 'FizzBuzz<br>';
            } elseif (($v % 3) == 0) {
                $result .= $v . 'Fizz<br>';
            } elseif (($v % 5) == 0) {
                $result .= $v . 'Buzz<br>';
            } else {
                $result .= $v . '<br>';
            }
        }
        return $result;
    }
}