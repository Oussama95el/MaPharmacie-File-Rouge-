<?php

namespace App\Model;

use PDO;
use PDOException;

class LivreurModel
{
    public static function checkLivreur($data)
    {
        $email = $data;
        try {
            $db = DatabaseModel::connect()->prepare('SELECT email , password FROM livereur WHERE email = :email');
            $db->execute(array(":email" => $email));
            return $db->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public static function getAllLivreur(): array
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('SELECT * FROM livereur');
        $db->execute();
        return $db->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addLivreur($data): bool
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('INSERT INTO livereur ( fname, email, password) 
                                                    values (:fname, :email, :password)');

        return $db->execute($data);
    }
    public static function updateLivreur($data): bool
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('UPDATE livereur SET fname = :fname, email = :email WHERE id = :id');
        return $db->execute($data);
    }

    public static function deleteLivreur($id): bool
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('DELETE FROM livereur WHERE id = :id');
        return $db->execute(["id" => $id]);
    }
}