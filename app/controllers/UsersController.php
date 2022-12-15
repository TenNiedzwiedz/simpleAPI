<?php

namespace app\controllers;

use app\models\User;

class UsersController {

    public function __call( string $name , array $arguments )
    {
        throw new \Exception("$name method not allowed", 400);
    }

    public function get() 
    {
        if(isset($_GET['id'])) {
            return json_encode(User::getOne($_GET['id']));
        } else {
            return json_encode(User::getAll());
        }
    }

    public function post()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if(isset($data['name'])) {
            return json_encode($data);
        } else {
            throw new \Exception('Invalid request', 400);
        }

        
    }

}