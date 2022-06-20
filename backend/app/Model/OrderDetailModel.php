<?php

namespace App\Model;

class OrderDetailModel
{
public static function addOrderDetail($data):string
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('INSERT INTO command_detail (quantity, livereur_id, commande_id, product_id)
                                                      values (:quantity, :livereur_id, :commande_id, :product_id)');
        if ($db->execute($data)) {
            return json_encode('success');
        }else {
            return json_encode('error');
        }
    }
}