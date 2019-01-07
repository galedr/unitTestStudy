<?php

abstract class AbstractComments
{
    protected $user_id = null;
    abstract public function getAuthority();
    abstract public function insert(array $article);
    abstract public function update(array $file);
    abstract public function delete(int $id);
    abstract public function getComments();
    abstract public function getArticle();

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param null $userId
     */
    public function setUserId($userId = null)
    {
        if (is_numeric($userId)) {
            $this->user_id = $userId;
        }
    }
}