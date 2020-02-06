<?php

require_once 'Controllers//BoardController.php';
require_once 'Controllers//SecurityController.php';
require_once 'Controllers//OrderControler.php';

class Routing {
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            'board' => [
                'controller' => 'BoardController',
                'action' => 'getFood'
            ],
            'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'logout' => [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ],
            'food' => [
                'controller' => 'OrderControler',
                'action' => 'getFoods'
            ],
            'order' => [
                'controller' => 'OrderControler',
                'action' => 'insertOrder'
            ],
            'orderId' => [
                'controller' => 'OrderControler',
                'action' => 'getOrderID'
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'login';

        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}