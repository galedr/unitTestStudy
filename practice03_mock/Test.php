<?php

require '../vendor/autoload.php';
require 'SubjectThree.php';

class SubjectThreeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @notice 由於測試物件與相依物件來往，需要測試物件是否確實與物件來往，故將Responser 做成mock 物件，藉此測試是否成功回應物件
     * @notice 相較於stub 是自行設定參數進行return 驗證，mock 更多用在測試物件之間的互動
     */
    public function testReact()
    {
        // 宣告$responser，取代被測試物件流程中要call 的物件，並設定method react
        $responser = $this->getMockBuilder(ResponserThree::class)
            ->setMethods(['react'])
            ->getMock();
        // 設定要丟給被測試物件的測試參數
        $testObject = rand(6, 10);
        // 設定被測試物件的期望行為 = 呼叫method react 一次
        $responser->expects($this->once())
            ->method('react');
        // 實體化被測試物件，將mock 與參數注入
        $method = new SubjectThree($responser, $testObject);
        $method->getResult();
    }

    public function testReportError()
    {
        $responser = $this->getMockBuilder(ResponserThree::class)
            ->setMethods(['reportError'])
            ->getMock();
        $responser->expects($this->once())
            ->method('reportError');
        $testObject = rand(1, 5);
        $method = new SubjectThree($responser, $testObject);
        $method->getResult();
    }
}