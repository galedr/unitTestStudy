<?php
/**
 * Created by PhpStorm.
 * User: galedr
 * Date: 2018/6/30
 * Time: 下午2:45
 */
require_once 'AbstractComments.php';
require_once '../Repository/FoodCommentsRepository.php';
class FoodComment extends AbstractComments
{
    private $repository;
    private $authority = [];

    public function __construct(FoodCommentsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAuthority($userId = null)
    {
        return $this->authority = $this->repository->getAuthorityByUserId($this->getUserId());
    }

    /**
     * @param array $file
     * @return bool
     * @throws Exception
     */
    public function update(array $file): bool
    {
        if (in_array($this->getAuthority(), [1], true)) {
            throw new Exception('沒有更新權限');
        }

        return $this->repository->update($file);
    }

    /**
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function delete(int $id): bool
    {
        if (in_array($this->getAuthority(), [2], true)) {
            throw new Exception('沒有刪除權限');
        }

        return $this->repository->delete($id);
    }

    /**
     * @return array
     */
    public function getArticle(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return []; // 回傳文章陣列，包含登入使用者是否可對美單篇文章進行update
    }

    /**
     * @param array $article
     * @return bool
     * @throws Exception
     */
    public function insert(array $article): bool
    {
        if (in_array($this->getAuthority(), [3], true)) {
            throw new Exception('沒有刪除權限');
        }

        return $this->repository->delete($article);
    }
}