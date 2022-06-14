<?php

namespace App\Controller;

use App\Model\ProductModel;
use App\router\Request;
use App\router\Route;


class ProductController
{

    public static function addProduct()
    {
        $data = Request::getBody();
        $newData = array(
            'ref' => strtoupper(substr($data['name'], 0, 3) . uniqid()) ,
            'name' => $data['name'],
            'marque' => $data['marque'],
            'description' => $data['description'],
            'image' => $data['image'],
            'prix_achat' => $data['prix_achat'],
            'prix_vente' => $data['prix_vente'],
            'categorie' => $data['categorie'],
            'date_ajout_produit' => date('Y-m-d H:i:s'),
        );
        return ProductModel::addProduct($newData);
    }
    // function get all products and parse return to json
    public static function getAllProducts()
    {
        $limit = 9;
        $page = Request::queryString("page") ?? 1;
        $category = Request::queryString("category");
        if($category != null){
            $category = intval($category);
        }
        $data = ProductModel::getProducts($limit, intval($page), $category);
        if ($data !== []){
            return Route::json($data);
        }else {
            return Route::json(["message" => "no data"]);
        }
    }
    // function get product by id and parse return to json
    public static function getProductById($id)
    {
        $data = ProductModel::getProductById($id);
        if ($data !== null){
            return Route::json($data);
        }else echo 'No data';
    }
    public static function updateProduct(): bool
    {
        $data = Request::getBody();
        $newData = array(
            'id' => $data['id'],
            'name' => $data['name'],
            'marque' => $data['marque'],
            'description' => $data['description'],
            'image' => $data['image'],
            'prix_achat' => $data['prix_achat'],
            'prix_vente' => $data['prix_vente'],
            'categorie' => $data['categorie'],
        );
        return ProductModel::updateProduct($newData);
    }
    public static function deleteProduct(): bool
    {
        return ProductModel::deleteProduct(Request::get("id"));
    }
    public static function getProductsByCategory()
    {
        $data = ProductModel::getLimitProductsByCategory(Request::get("category"));
        if ($data !== []){
            return Route::json($data);
        }else echo 'No data';
    }
    //function that return total pages of products
    public static function getTotalPages()
    {
        $total = ProductModel::getTotalProducts();
        $totalPages = ceil($total / 9);
        return Route::json($totalPages);
    }

}