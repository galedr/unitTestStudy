<?php

$method = new Index09(2, 100);
echo $method->getResult();

class Index09
{
    protected $price;
    protected $quantity;

    public function __construct($quantity, $price)
    {
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function getResult()
    {
        return $this->quantity * ($this->price - ($this->price * $this->getDisCountPercent()));
    }

    private function getDisCountPercent()
    {
        $quantity = ($this->quantity > 5) ? 5 : $this->quantity;
        switch ($quantity) {
            case 2:
                return 0.05;
                break;
            case 3:
                return 0.1;
                break;
            case 4:
                return 0.2;
                break;
            case 5:
                return 0.25;
                break;
        }
    }
}