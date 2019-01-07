<?php
/**
 * Created by PhpStorm.
 * User: galedr
 * Date: 2018/6/30
 * Time: 下午4:12
 */

interface IComments
{
    public function getAuthorityByUserId(int $id): array;
}