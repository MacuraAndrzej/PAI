<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//Food.php';
require_once __DIR__.'//..//Repository//FoodRepository.php';
require_once __DIR__.'//..//Repository//TypeRepository.php';
require_once __DIR__.'//..//Repository//OrderRepository.php';

class OrderControler extends AppController {

    public function insertOrder()
    {   
        $foodId = (int)$_POST['foodId'];
        $orderId = (int)$_POST['orderId'];
        $count = (int)$_POST['count'];
        $repo = new OrderRepository();
        $repo->insertOrder($foodId,$count,$orderId);


    }
    public function getOrderID()
    {   
        header('Content-type: application/json');
        http_response_code(200);

        $repo = new OrderRepository();
        $id = $repo->newOrder();

        echo json_encode($id);
    }
    public function getFoods()
    {   
        $typeId = $_POST['typeId'];
        $foodRepository = new FoodRepository();
        
        header('Content-type: application/json');
        http_response_code(200);
        
        $food = $foodRepository->getFoods($typeId);
        echo $food ? json_encode($food) : '';
    }
}