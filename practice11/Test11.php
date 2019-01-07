<?php

require_once '../vendor/autoload.php';
require_once 'index11.php';

class Test11 extends \PHPUnit\Framework\TestCase
{
    public function testIndex11()
    {
        $fill = [
            [
                'id' => 1,
                'title' => 'test1',
                'summary' => 'abcde',
                'page_view' => 100,
            ],
            [
                'id' => 2,
                'title' => 'test2',
                'summary' => 'abcdefg',
                'page_view' => 50,
            ],
            [
                'id' => 3,
                'title' => 'test3',
                'summary' => 'abc',
                'page_view' => 60,
            ]
        ];
        $fail4 = [
            'status' => 400
        ];
        $fail5 = [
            'status' => 500
        ];
        $exp = [
            'highest_pv' => 100,
            'avg_pv' => 70,
            'articles' => [
                [
                    'title' => 'test1',
                    'summary' => 'abcde',
                    'letter_count' => 5,
                    'page_view' => 100,
                ],
                [
                    'title' => 'test3',
                    'summary' => 'abc',
                    'letter_count' => 3,
                    'page_view' => 60,
                ],
                [
                    'title' => 'test2',
                    'summary' => 'abcdefg',
                    'letter_count' => 7,
                    'page_view' => 50,
                ],
            ]
        ];
        $failExp = [
            'status' => 'error',
            'des' => 'error'
        ];
        $mock = $this->createMock(Model11::class);
        $mock->method('getData')->willReturn($fill);
        $method = new Index11($mock);
        $this->assertEquals($exp, $method->execute());

        $mock_fail4 = $this->createMock(Model11::class);
        $mock_fail4->method('getData')->willReturn($fail4);
        $method_fail_4 = new Index11($mock_fail4);
        $this->assertEquals($failExp, $method_fail_4->execute());

        $mock_fail5 = $this->createMock(Model11::class);
        $mock_fail5->method('getData')->willReturn($fail5);
        $method_fail_5 = new Index11($mock_fail5);
        $this->assertEquals($failExp, $method_fail_5->execute());
    }
}