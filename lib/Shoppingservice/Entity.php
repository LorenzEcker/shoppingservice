<?php


namespace Shoppingservice;


class Entity extends BaseObject{
    private $userId;

    public function __construct(int $id) {
        $this->userId = intval($id);
    }

    public function getUserId() : int {
        return $this->userId;
    }
}