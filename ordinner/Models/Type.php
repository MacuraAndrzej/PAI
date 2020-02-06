<?php


class Type {
    public $image;
    public $foodName;
    public $id;

    public function __construct(string $image, string $foodName, int $id)
    {
        $this->image = $image;
        $this->foodName = $foodName;
        $this->id = $id;
    }

    public function getImage(): string 
    {
        return $this->image;
    }

    public function getFoodName(): string
    {
        return $this->foodName;
    }

    public function getId(): int
    {
        return $this->id;
    }
}