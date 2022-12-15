<?php

namespace app\controllers;

class UsersController {

    public function __call( string $name , array $arguments )
    {
        throw new \Exception("$name method not allowed", 400);
    }

    public function get() 
    {
        return json_encode([
            'id' => 1,
            'username' => 'John'
        ]);
    }

}