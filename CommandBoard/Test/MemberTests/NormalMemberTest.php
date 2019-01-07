<?php

require_once '../../../vendor/autoload.php';
require_once '../../memberMethods/NormalMember.php';

class NormalMemberTest extends \PHPUnit\Framework\TestCase
{
    public function getUserDataTest()
    {
        $member = new NormalMember();
        $acc = '';
        $pwd = '';
        $member->setLoginInfo($acc, $pwd);
        $member->getUserData();

        $this->assertEquals(false, $this->getUserData());
    }
}