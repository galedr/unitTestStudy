<?php

//建立一個購物車應用程式，必須要能夠根據會員的等級，提供不同的折扣方式。
//1. 如果是 VIP 會員，只要購物滿 500 元，就一律有 8 折優惠
//2. 如果是 一般會員 (Normal)，除了購物必須要滿 1000 元，而且購買超過 3 件商品才能擁有 85 折優惠

//@memberLevel
//@quantity
//@price

class ShoppingCart
{
    protected $member;
    protected $price;
    protected $quantity;
    protected $model;

    public function __construct(MemberModel $memberModel)
    {
        $this->model = $memberModel;
    }

    public function setMember($acc)
    {
        if (empty($acc) and !is_string($acc)) {
            exit;
        }
        $this->member = $acc;
    }

    public function setPrice($price)
    {
        if (empty($price) and !is_numeric($price)) {
            exit;
        }
        $this->price = $price;
    }

    public function setQuantity($num)
    {
        if (empty($num) and !is_numeric($num)) {
            exit;
        }
        $this->quantity = $num;
    }

    public function getResult()
    {
        $level = $this->model->getMemberLevel($this->member);
        if (empty($level)) {
            echo 'you can not buy, mother fucker';
            exit;
        }
        switch ($level) {
            case 'VIP' :
                return $this->getVipResult();
                break;
            case 'NORMAL' :
                return $this->getNormalResult();
                break;
        }
    }

    private function getVipResult()
    {
        $total = $this->quantity * $this->price;
        return ($total >= 500) ? $total * 0.8 : $total;
    }

    private function getNormalResult()
    {
        if ($this->quantity <= 3) {
            return $this->quantity * $this->price;
        }
        $total = $this->quantity * $this->price;
        return ($total >= 1000) ? $total * 0.85 : $total;
    }
}

class MemberModel
{
    public function getMemberLevel($acc)
    {
        return 'VIP';
    }
}