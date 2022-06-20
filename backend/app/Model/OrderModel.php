<?php

namespace App\Model;

use PDO;

class OrderModel
{
    public static function addOrder($data):string
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('INSERT INTO command (ref , status, date_de_commande, client_id)
                                                     values (:ref , :status, :date_de_commande, :client_id)');
        if ($db->execute($data)) {
            $db = $connect->prepare('SELECT id FROM command order by id desc limit 1');
            $db->execute();
            $result = $db->fetch(PDO::FETCH_ASSOC);
            return json_encode($result);
        }else {
            return json_encode('error');
        }
    }
}