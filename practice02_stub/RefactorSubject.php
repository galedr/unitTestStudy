<?php

class RefactorSubject
{
    protected $method;

    /**
     * @param INumberProvider $provider
     * @notice 對Subject 與相依物件解耦，使其依賴介面而不依賴物件
     */
    public function __construct(INumberProvider $provider)
    {
        $this->method = $provider;
    }

    public function getSquare()
    {
        return $this->method->response() * $this->method->response();
    }
}

interface INumberProvider
{
    public function response();
}

class RefactorNumberProvider implements INumberProvider
{
    public function response()
    {
        rand(1, 10);
    }
}