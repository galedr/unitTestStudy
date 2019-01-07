<?php

class DealArticle
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function response($no)
    {
        $rs = $this->model->getArt();
        return [
            'no' => $rs,
            'title' => 'title_' . $rs
        ];
    }
}

class Model
{
    public function getArt()
    {
        return 1;
    }
}