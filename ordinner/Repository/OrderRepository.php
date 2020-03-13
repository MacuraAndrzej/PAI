<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//Food.php';
require_once __DIR__.'//..//Models//Order.php';
class OrderRepository extends Repository {

public function insertOrder(int $foodId,int $count) 
{
    $userId = $_SESSION["id"];
    $stmt = $this->database->connect()->prepare('
    INSERT INTO `food_order`(`ID`, `foodID`, `quantity`, `USER_ID`,`STATUS`) VALUES (NULL,:foodId,:count,:userId,"ORDERED")
    ');
    $stmt->bindParam(':foodId', $foodId, PDO::PARAM_STR);
    $stmt->bindParam(':count', $count, PDO::PARAM_STR);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
    $stmt->execute();


       
}
public function getOrders()
{
    $stmt = $this->database->connect()->prepare('
    SELECT * FROM `food_order` f,`food` WHERE STATUS = "ORDERED" and f.foodID = food.ID
    ');
    $stmt->execute();
    $Orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($Orders as $Order) {
           $result[] = new Order(
           $Order['ID'],
           $Order['NAME'],
           $Order['quantity'],
           $Order['USER_ID'],
           $Order['STATUS'],
        );
    }

   return $result;

}
public function readyOrder(int $orderId)
{
    $stmt = $this->database->connect()->prepare('
    UPDATE `food_order` SET `STATUS`="ready" WHERE foodid=:orderId
    ');
    $stmt->bindParam(':orderId', $orderId, PDO::PARAM_STR);
    $stmt->execute();
   
}

}