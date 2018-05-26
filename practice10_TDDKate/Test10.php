<?php

//建立一個購物車應用程式，必須要能夠根據會員的等級，提供不同的折扣方式。
//1. 如果是 VIP 會員，只要購物滿 500 元，就一律有 8 折優惠
//2. 如果是 一般會員 (Normal)，除了購物必須要滿 1000 元，而且購買超過 3 件商品才能擁有 85 折優惠
require_once '../vendor/autoload.php';
require_once 'index10.php';

class TestShoppingCart extends \PHPUnit\Framework\TestCase
{
    public function testGetResult()
    {
        $mock = $this->createMock(MemberModel::class);
        $mock->method('getMemberLevel')->willReturn('VIP');
        $method = new ShoppingCart($mock);
        $method->setMember('NORMAL');
        $method->setPrice(500);
        $method->setQuantity(4);

        $expect = 500;

        $this->assertEquals($expect, $method->getResult());
    }
}