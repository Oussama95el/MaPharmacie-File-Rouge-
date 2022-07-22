<?php

namespace App\Model;

use PDO;

class OrderDetailModel
{
        public static function addOrderDetail($data):string
        {
            $connect = DatabaseModel::connect();
            $db = $connect->prepare('INSERT INTO command_detail (quantity,  command_id, product_id)
                                                          values (:quantity, :command_id, :product_id)');
            if ($db->execute($data)) {
                return json_encode('success');
            }else {
                return json_encode('error');
            }
        }

        public static function getOrderDetailByOrder($id): bool|array
        {
            $connect = DatabaseModel::connect();
            $db = $connect->prepare('SELECT product.name, product.prix_vente, product.ref, command_detail.quantity, command_detail.product_id FROM `command_detail` INNER JOIN product ON command_detail.product_id = product.id WHERE command_detail.command_id = :id');
            $db->bindParam(':id',$id);
            $db->execute();
            return $db->fetchAll(PDO::FETCH_ASSOC);
        }

}