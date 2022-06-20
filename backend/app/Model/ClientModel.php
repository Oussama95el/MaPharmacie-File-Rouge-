<?php

namespace App\Model;


use PDO;
use PDOException;

class ClientModel
{

    static public function addClient($data): bool
    {
        var_dump($data);
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('INSERT INTO client ( fname, email, password)
                                                      values (:fname, :email, :password)');
        return $db->execute($data);
    }


    public static function checkClient($data)
    {
        $email = $data;
        try {
            $db = DatabaseModel::connect()->prepare('SELECT * FROM client WHERE email = :email');
            $db->execute(array(":email" => $email));
            return $db->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }
    //function that return client by id
    public static function getClientById($id)
    {
        try {
            $db = DatabaseModel::connect()->prepare('SELECT * FROM client WHERE id = :id');
            $db->bindParam(':id', $id);
            $db->execute();
            return $db->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }


    public static function updateClientInfo($data)
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('UPDATE client SET adress1 = :adress1, adress2 = :adress2 , zip_code = :zip_code, city = :city, tel = :tel WHERE id = :id');
        $db->execute($data);
    }
}