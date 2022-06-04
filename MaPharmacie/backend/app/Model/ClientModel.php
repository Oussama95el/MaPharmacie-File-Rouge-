<?php

namespace App\Model;


use PDO;
use PDOException;

class ClientModel
{

    static public function addClient($data): bool
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('INSERT INTO client ( fname, email, password) 
                                                    values (:fname, :email, :password)');
        return $db->execute($data);
    }


    public static function checkClient($data)
    {
        $email = $data;
        try {
            $db = DatabaseModel::connect()->prepare('SELECT email , password FROM client WHERE email = :email');
            $db->execute(array(":email" => $email));
            return $db->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
}