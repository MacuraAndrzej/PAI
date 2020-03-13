<?php


class AdminController extends AppController {
    public function admin()
    {
        $userRepository = new UserRepository();
        $this->render('admin', ['user' => $userRepository->getUser($_SESSION['id'])]);
    }

    public function users()
    {   
        $userRepository = new UserRepository();
        
        header('Content-type: application/json');
        http_response_code(200);
        
        $users = $userRepository->getUsers();
        echo $users ? json_encode($users) : '';
    }
    public function createUser(string $email,string $pass,string $role)
    {
        $userRepository = new UserRepository();
        $userRepository->createUser($email,$pass,$role);
    }
}