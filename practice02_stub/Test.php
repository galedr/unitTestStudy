<?php

require '../vendor/autoload.php';
require 'RefactorSubject.php';
require_once 'Subject.php';

class RefactorSubjectTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @notice stub的概念：當被測試的物件需要注入資料，且hardcore 手動輸入參數比較適合的時候
     * @notice stub 較常被用在驗證目標回傳值，或是目標狀態的改變，不理會目標與相依物件如何互動，而是關注當外部物件傳入資料時怎麼回覆
     */
    public function testGetSquare()
    {
        // 宣告$stub，把相依的物件做成mock
        $stub = $this->createMock(INumberProvider::class);
        // 需告stub 使用的method = response，讓他return 5
        $stub->method('response')->willReturn(5);
        // 宣告被測試的物件，注入stub 取代本來相依的物件
        $testMethod = new RefactorSubject($stub);
        $this->assertEquals(25, $testMethod->getSquare());
    }

    public function testGetSquareAA()
    {
        $t = new Subject();
        $this->assertEquals(4, $t->getSquare(2, 2));
    }
}

