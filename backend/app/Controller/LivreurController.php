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
}