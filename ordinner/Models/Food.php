<?php


class Food {
    public $image;
    public $price;
    public $name;
    public $id;

    public function __construct(string $image, int $price, string $name,int $id)
    {
        $this->image = $image;
        $this->price = $price;
        $this->name = $name;
        $this->id = $id;
    }

    public function getImage(): string 
    {
        return $this->image;
    }

    public function getprice(): int
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getId(): int
    {
        return $this->id;
    }
}