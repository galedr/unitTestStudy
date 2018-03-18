<?php

class SubjectTwo
{

    /**
     * @return float|int
     * @notice 原始物件，因為耦合，無法獨立對getSquare 做測試
     */
    public function getSquare()
    {
        $method = new DatabaseTwo();
        return $method->response() * $method->response();
    }
}

class RefSubjectTwo
{
    protected $method;

    /**
     * RefSubjectTwo constructor.
     * @param IDataBaseTwo $dataBaseTwo
     * @notice 重構，將呼叫database 的部分解耦，使得可以單獨對getSquare 測試
     */
    public function __construct(IDataBaseTwo $dataBaseTwo)
    {
        $this->method = $dataBaseTwo;
    }
    public function getSquare()
    {
        return $this->method->response() * $this->method->response();
    }
}

interface IDataBaseTwo
{
    public function response();
}

class DatabaseTwo implements IDataBaseTwo
{
    public function response()
    {
        return rand(1, 10);
    }
}