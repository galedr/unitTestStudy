<?php

require '../vendor/autoload.php';
require 'Subject.php';

class StringParserTest extends \PHPUnit\Framework\TestCase
{
    public function testParse()
    {
        $string = 'tag1,tag2,tag3';
        $parser = new StringParser();
        $this->assertInternalType('array', $parser->parse($string));
    }
}

class StringParseWhenEmptyTest extends \PHPUnit\Framework\TestCase
{
    public function testParse()
    {
        $parser = new StringParser();
        $this->assertInternalType('array', $parser->parse(''));
    }
}