<?php

namespace App\Model;

class OrderModel
{
    public static function addOrder($data):string
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('INSERT INTO commande (ref , status, livereur_id, date_de_commande, client_id, detail_id)
                                                     values (:ref , :status, :livereur_id, :date_de_commande, :client_id, :detail_id)');
        if ($db->execute($data)) {
            return json_encode('success');
        }else {
            return json_encode('error');
        }
    }
}