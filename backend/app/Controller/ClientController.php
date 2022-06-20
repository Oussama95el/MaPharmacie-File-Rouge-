<?php

namespace App\Controller;


use App\Model\ClientModel;
use App\router\Request;

class ClientController
{
    use utils;
    public function register()
    {
        $data = Request::getBody();
        $newData = array(
            'email' => $data['email'],
            'fname' => $data['fullName'],
            'password' => password_hash($data['password'], PASSWORD_ARGON2I)
        );
        $result = ClientModel::addClient($newData);
        if ($result) {
            echo json_encode(true);
        }
    }

    public function auth()
    {
        $person = Request::getBody();
        $this->checkCredentiels(ClientModel::checkClient($person['email']),$person);
    }

    public function updateClientInfo()
    {
        $data = Request::getBody();
        $newData = array(
            'adress1' => $data['adress1'],
            'adress2' => $data['adress2'],
            'zip_code' => $data['zip'],
            'tel' => $data['tel'],
            'city' => $data['city'],
            'id' => $data['id']
        );
        ClientModel::updateClientInfo($newData);
    }
    public function getClientById()
    {
        $id = Request::getBody();
        echo json_encode(ClientModel::getClientById($id['id']));
    }
}