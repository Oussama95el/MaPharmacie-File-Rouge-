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
            echo json_encode($result);
        }
    }

    public function auth()
    {
        $person = Request::getBody();
        $this->checkCredentiels(ClientModel::checkClient($person['email']),$person);
    }

}