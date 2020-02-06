<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//Type.php';

class TypeRepository extends Repository {

    public function getType(int $id): ?Type 
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM Types WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $Type = $stmt->fetch(PDO::FETCH_ASSOC);

        if($Type == false) {
            return null;
        }

        return new  Type(
            $Type['image'],
            $Type['FOOD_NAME'],
            $Type['ID'],
        );
    }

    public function getTypes(): array {
         $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM food_type');
        $stmt->execute();
        $Types = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($Types as $Type) {
            $result[] = new Type(
            $Type['image'],
            $Type['FOOD_NAME'],
            $Type['ID'],
         );
     }

    return $result;
    }
}