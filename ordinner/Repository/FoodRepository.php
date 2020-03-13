<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//Food.php';

class FoodRepository extends Repository {

    public function getFood(int $id): ?Food 
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM Foods WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $Food = $stmt->fetch(PDO::FETCH_ASSOC);

        if($Food == false) {
            return null;
        }

        return new Food(
            $Food['image'],
            $Food['type'],
            $Food['price'],
        );
    }

    public function getFoods(int $typeId): array {
         $result = [];
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM `FOOD` WHERE  FOOD.TYPE_ID = :typeId
        ');
        $stmt->bindParam(':typeId', $typeId, PDO::PARAM_STR);
        $stmt->execute();
        $Foods = $stmt->fetchAll(PDO::FETCH_ASSOC);

         foreach ($Foods as $Food) {
                $result[] = new Food(
                $Food['image'],
                $Food['PRICE'],
                $Food['NAME'],
                $Food['ID'],
             );
         }

        return $result;
    }
}