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
        $count = (int)$_POST['count'];
        $repo = new OrderRepository();
        $repo->insertOrder($foodId,$count);


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
    public function getOrders()
    {
        $orderRepository = new OrderRepository();
        
        header('Content-type: application/json');
        http_response_code(200);
        
        $orders = $orderRepository->getOrders();
        echo $orders ? json_encode($orders) : '';

    }
    public function readyOrder()
    {
        $orderId = (int)$_POST["orderId"];
        $repo = new OrderRepository();
        $repo->readyOrder($orderId);

    }
}