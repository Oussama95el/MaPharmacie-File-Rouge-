<?php

namespace App\Model;



use PDO;
use PDOException;

class AdminModel
{
    public static function checkAdmin($data)
    {
        $email = $data;
        try {
            $db = DatabaseModel::connect()->prepare('SELECT email , password FROM admin WHERE email = :email');
            $db->execute(array(":email" => $email));
            return $db->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public static function addLivreur($data)
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('INSERT INTO livereur ( fname, email, password) 
                                                    values (:fname, :email, :password)');

        return $db->execute($data);
    }
}