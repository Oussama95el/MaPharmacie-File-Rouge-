<?php

namespace App\Controller;


use App\Model\LivreurModel;
use App\router\Request;

class LivreurController
{
    use utils;
    public function auth()
    {
        $livreur = Request::getBody();
        $this->checkCredentiels(LivreurModel::checkLivreur($livreur['email']),$livreur);
    }
    public function getAllLivreur()
    {
        $result = LivreurModel::getAllLivreur();
        if ($result) {
            echo json_encode($result);
        }
    }
    public function addLivreur()
    {
        $data = Request::getBody();
        $newData = array(
            'email' => $data['email'],
            'fname' => $data['fname'],
            'password' => password_hash($data['Password'], PASSWORD_ARGON2I)
        );
        $result = LivreurModel::addLivreur($newData);
        if ($result) {
            echo json_encode($result);
        }
    }
    public function updateLivreur()
    {
        $data = Request::getBody();
        $newData = array(
            'id' => $data['id'],
            'email' => $data['email'],
            'fname' => $data['fname'],
        );
        $result = LivreurModel::updateLivreur($newData);
        if ($result) {
            echo json_encode($result);
        }
    }
    public function deleteLivreur()
    {
        return LivreurModel::deleteLivreur(id: Request::get('id'));
    }
}