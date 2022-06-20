<?php

namespace App\Controller;

use App\Model\AdminModel;
use App\router\Request;

class AdminController
{
    use utils;

    public function auth()
    {
        $admin = Request::getBody();
        $this->checkCredentiels(AdminModel::checkAdmin($admin['email']),$admin);
    }
}