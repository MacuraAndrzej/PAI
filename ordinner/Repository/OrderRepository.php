<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//Food.php';
class OrderRepository extends Repository {

public function insertOrder(int $foodId,int $count,int $orderid) 
{
    $stmt = $this->database->connect()->prepare('
    INSERT INTO `food_order`(`ID`, `foodID`, `quantity`, `ORDERID`) VALUES (NULL,:foodId,:count,:orderid)
    ');
    $stmt->bindParam(':foodId', $foodId, PDO::PARAM_STR);
    $stmt->bindParam(':count', $count, PDO::PARAM_STR);
    $stmt->bindParam(':orderid', $orderid, PDO::PARAM_STR);
    $stmt->execute();


       
}
public function newOrder() 
{
    $stmt = $this->database->connect()->prepare('
    INSERT INTO `full_order`(`ID`, `Date`, `Status`) VALUES (NULL,:date,"not_used")
    ');
    $date = date('Y-m-d H:i:s');
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->execute();
    $stmt = $this->database->connect()->prepare('
            SELECT * FROM full_order WHERE Status = "not_used"
        ');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $ID = $result['ID'];
    $stmt = $this->database->connect()->prepare('
    UPDATE full_order SET Status= "ordered" WHERE Status = "not_used"
    ');
    $stmt->execute();
    return $ID;

       
}
}