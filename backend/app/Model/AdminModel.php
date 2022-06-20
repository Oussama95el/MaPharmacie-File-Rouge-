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

}