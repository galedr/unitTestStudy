<?php
/**
 * Created by PhpStorm.
 * User: galedr
 * Date: 2018/6/30
 * Time: 下午2:50
 */
require_once '../../../vendor/autoload.php';
require_once '../../CommentBoardMethods/FoodComment.php';
require_once '../../Repository/FoodCommentsRepository.php';

class FoodCommentTest extends \PHPUnit\Framework\TestCase
{

    /** @var FoodComment $commentMethod */
    protected $commentMethod;
    protected $mock;

    public function setUp()
    {
        parent::setUp();
        $this->mock = $this->getMockBuilder(FoodCommentsRepository::class)->getMock();
        $this->commentMethod = new FoodComment($this->mock);
    }

    public function testGetComments()
    {
        $articles = $this->commentMethod->getComments();
        $this->assertEquals([], $articles);
    }

    public function testDelete()
    {
        $test_id = 0;
        $result = $this->commentMethod->delete($test_id);
        $this->assertEquals(false, $result);
    }

    public function testGetArticle()
    {
        $array = [
            'id' => 1,
            'author' => 'abcd',
            'title' => 'ccc',
            'content' => 'dcba',
            'viewed_at' => '2018-01-01 00:00:00',
            'created_at' => '2017-12-31 23:59:59',
            'updated_at' => '2018-01-02 07:22:30'
        ];

        $article = $this->commentMethod->getArticle();
        $this->assertEquals($array, $article);
    }

    public function testUpdate()
    {
        $id = 0;
        $bool = $this->commentMethod->update($id);
        $this->assertTrue($bool, 123);

        $id = 10;
        $bool = $this->commentMethod->update($id);
        $this->assertTrue($bool, 123);
    }

    public function testInsert()
    {
        $article = [];
        $this->commentMethod->insert($article);
        $this->assertEquals([], $article);
    }
}
