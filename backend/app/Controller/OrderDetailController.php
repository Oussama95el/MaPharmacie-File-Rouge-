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
            'command_id' => $data['order_id'],
            'product_id' => $data['product_id']
        );
        $result = OrderDetailModel::addOrderDetail($newData);
        if ($result) {
            echo json_encode($result);
        }
    }

}