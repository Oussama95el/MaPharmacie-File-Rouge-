<?php

namespace App\Controller;

use App\Model\CategoryModel;
use App\router\Request;
use App\router\Route;
use mysql_xdevapi\Result;

class CategoryController
{
    public static function addCategory()
    {
        $data = Request::getBody();
        $result = CategoryModel::addCat($data);
        if ($result) {
            echo json_encode($result);
        }
    }

    public static function updateCategory()
    {
        $data = Request::getBody();
        $result = CategoryModel::updateCat($data);
        if ($result){
            echo "successfully updated ";
        }else{
            echo "error";
        }
    }

    public static function geAllCategories()
    {
//        var_dump(CategoryModel::getAllCat());
         $data = CategoryModel::getAllCat();
         if ($data !== []){
         return Route::json($data);
         }else echo 'No data';
    }

    public static function deleteCategory()
    {
        return CategoryModel::deleteCategory(Request::get('id'));
    }
}