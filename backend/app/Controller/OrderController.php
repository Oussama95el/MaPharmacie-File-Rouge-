<?php

namespace App\Controller;

use App\Model\OrderModel;
use App\router\Request;

class OrderController
{

    public function addOrder()
    {
        $data = Request::getBody();
        $newData = array(
            'ref' =>    strtoupper('OR' . uniqid()) ,
            'status' => $data['status'],
            'livereur_id' => $data['livereur_id'],
            'date_de_commande' => date('Y-m-d H:i:s'),
            'client_id' => $data['client_id'],
            'detail_id' => $data['detail_id']
        );
        $result = OrderModel::addOrder($newData);
        if ($result) {
            echo json_encode($result);
        }
    }
}