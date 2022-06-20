<?php

namespace App\Controller;

use App\Model\OrderDetailModel;
use App\router\Request;

class OrderDetailController
{
    public function addOrderDetail()
    {
        $data = Request::getBody();
        $newData = array(
            'quantity' => $data['quantity'],
            'livereur_id' => $data['livereur_id'],
            'commande_id' => $data['commande_id'],
            'product_id' => $data['product_id']
        );
        $result = OrderDetailModel::addOrderDetail($newData);
        if ($result) {
            echo json_encode($result);
        }
    }

}