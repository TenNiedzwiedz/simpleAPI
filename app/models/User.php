<?php

namespace app\models;

use app\core\Application;

class User {
    private int $id;
    private string $name;

    public static function getOne(int $id)
    {
        $sql = "SELECT * 
                FROM users
                WHERE id = :id";

        $statement = Application::$app->db->prepare($sql);

        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetchObject(static::class);
    }

    public static function getAll()
    {
        $sql = "SELECT *
                FROM users";

        $statement = Application::$app->db->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_CLASS, static::class);
    }
}