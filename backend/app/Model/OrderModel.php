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

    public static function getOrderByStatus($status): bool|array
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('SELECT command.* , client.fname, livereur.fname as livreur_fname FROM command INNER JOIN client ON command.client_id = client.id INNER JOIN livereur ON command.livereur_id = livereur.id WHERE command.status = :status');
        $db->bindValue(':status',$status);
        $db->execute();
        return $db->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function updateOrder($livereur,$id): bool
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('UPDATE command SET livereur_id = :livereur WHERE id = :id');
        $db->bindParam(':livereur',$livereur);
        $db->bindParam(':id',$id);
        return $db->execute();

    }

    public static function updateOrderStatus($id,$status): bool
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('UPDATE command SET status = :status WHERE id = :id');
        $db->bindParam(':status',$status);
        $db->bindParam(':id',$id);
        return $db->execute();

    }

    public static function fetchInvalidOrders($status): bool|array
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('SELECT command.* , client.fname FROM command INNER JOIN client ON command.client_id = client.id  WHERE status != :status');
        $db->bindValue(':status',$status);
        $db->execute();
        return $db->fetchAll(PDO::FETCH_ASSOC);
    }

    //function that return inner join livreur and command where id = $id
    public static function getOrderById($id): bool|array
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('SELECT command.* , client.fname, livreur.fname as livreur_fname FROM command INNER JOIN client ON command.client_id = client.id INNER JOIN livreur ON command.livereur_id = livreur.id WHERE command.id = :id');
        $db->bindParam(':id',$id);
        $db->execute();
        return $db->fetch(PDO::FETCH_ASSOC);
    }
}