<?php


class Order {
    public $Id;
    public $name;
    public $quantity;
    public $userId;
    public $status;

    public function __construct(int $Id, string $name, string $quantity,int $userId,string $status)
    {
        $this->Id = $Id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->userId = $userId;
        $this->status = $status;
    }
    public function getId(): int
    {
        return $this->id;
    }
}