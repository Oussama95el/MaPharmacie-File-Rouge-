<?php

namespace App\Model;

use PDO;

abstract class CategoryModel
{
    static public function addCat($data)
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('INSERT INTO categorie (nom) 
                                                    values (:nom)');
        return $db->execute($data);
    }
    static public function updateCat($data)
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('UPDATE categorie SET nom = :nom WHERE id = :id ');
        return $db->execute($data);
    }

    /**
     * @return array
     */
    static public function getAllCat():array
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('SELECT * FROM categorie');
        $db->execute();
        return $db->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function deleteCategory($id): bool
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('DELETE FROM categorie WHERE id = :id');
        return $db->execute(["id" => $id]);
    }


    abstract public static function addProduct($data);
    abstract public static function getProductById($id);
    abstract public static function updateProduct($data);
    abstract public static function deleteProduct($id);
}