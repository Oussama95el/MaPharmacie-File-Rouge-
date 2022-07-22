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
            'status' => "Pending",
            'date_de_commande' => date('Y-m-d H:i:s'),
            'client_id' => $data['id']
        );
        $result = OrderModel::addOrder($newData);
        if ($result) {
            echo json_encode($result);
        }
    }
    public function fetchOrdersByStatus(){
        $data = Request::getBody();
        $result = OrderModel::getOrderByStatus($data['status']);
        echo json_encode($result);
    }
    public function updateOrderLivereur()
    {
        $data =  Request::getBody();
        $livereur = $data['livereur'];
        $id = $data['orderID'];
        $result = OrderModel::updateOrder($livereur, $id);
        echo json_encode($result);
    }
    public function InvalidOrders()
    {
        $data = Request::getBody();
        $result = OrderModel::fetchInvalidOrders($data['status']);
        echo json_encode($result);
    }

    public function updateStatus()
    {
        $data = Request::getBody();
        $id = $data['id'];
        $status = $data['status'];
        $result = OrderModel::updateOrderStatus($id,$status);
        echo json_encode($result);
    }
}