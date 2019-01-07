<?php

require_once '../vendor/autoload.php';
require_once 'Subject.php';

class TestCase_RT01 extends \PHPUnit\Framework\TestCase
{
    public function test_rt01()
    {
        $mock = $this->createMock(Model::class);
        $mock->method('getArt')->willReturn(1);
        $method = new DealArticle($mock);
        $no = 1;
        $rs = $method->response($no);
        $es_rs = ['no' => 1, 'title' => 'title_1'];
        $this->assertEquals($es_rs, $rs);
    }
}