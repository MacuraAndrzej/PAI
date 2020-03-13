<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//User.php';

class UserRepository extends Repository {

    public function getUser(string $email): ?User 
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE ID = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['ID']
        );
    }

    public function getUsers(): array {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE email != :email;
        ');
        $stmt->bindParam(':email', $_SESSION['id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);



        return $users;
    }
    public function createUser(string $email,string $pass,string $role)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM users WHERE email = :email;
    ');
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user == false) {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO `users`(`ID`, `Name`, `Role`, `email`, `password`) VALUES (null,:role,:role,:email,:password);
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->bindParam(':password', $pass, PDO::PARAM_STR);
        $stmt->execute();
        }
    }
}