<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//Food.php';
require_once __DIR__.'//..//Repository//FoodRepository.php';
require_once __DIR__.'//..//Repository//TypeRepository.php';

class BoardController extends AppController {

    public function getFood()
    {   
        #$foodRepo = new FoodRepository();
        #$foods = $foodRepo->getFoods("soup");
        $typeRepo = new TypeRepository();
        $types = $typeRepo->getTypes();

        $this->render('board', ['types' => $types]);
    }
}