<?php

require_once 'Controllers//BoardController.php';
require_once 'Controllers//SecurityController.php';
require_once 'Controllers//OrderControler.php';
require_once 'Controllers//KitchenController.php';
require_once 'Controllers//MenuController.php';
require_once 'Controllers//AdminController.php';
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
            'orders' => [
                'controller' => 'OrderControler',
                'action' => 'getOrders'
            ],
            'ready' => [
                'controller' => 'OrderControler',
                'action' => 'readyOrder'
            ],
            'kitchen' => [
                'controller' => 'KitchenController',
                'action' => 'kitchen'
            ],
            'menu' => [
                'controller' => 'menuController',
                'action' => 'menu'
            ],
            'admin' => [
                'controller' => 'AdminController',
                'action' => 'admin'
            ],
            'users' => [
                'controller' => 'AdminController',
                'action' => 'users'
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