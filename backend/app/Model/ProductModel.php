<?php

namespace App\Model;

use PDO;

class ProductModel extends CategoryModel
{
    static public function addProduct($data):bool
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('INSERT INTO product  (ref,name, marque, image, description, prix_achat,prix_vente ,categorie, date_ajout_produit) 
                                                    values (:ref, :name, :marque, :image, :description, :prix_achat, :prix_vente,:categorie, :date_ajout_produit)');
        return $db->execute($data);
    }
    public static function getProducts(int $limit,int $page,int|null $category): bool|array
    {
        // TODO: Implement getProduct() method.
        // inner join product and categorie
        $connect = DatabaseModel::connect();
        $offset = ($page - 1) * $limit;
        $defaultQuery = 'SELECT product.*,categorie.nom FROM product INNER JOIN categorie ON product.categorie = categorie.id limit :limit offset :offset';
        $db = $connect->prepare($defaultQuery);
            $db->bindValue(':limit', $limit, PDO::PARAM_INT);
            $db->bindValue(':offset', $offset, PDO::PARAM_INT);
            $db->execute();

        if($category) {
            $filteredQuery =  'SELECT product.*,categorie.nom FROM product INNER JOIN categorie ON product.categorie = categorie.id WHERE categorie.id = :category limit :limit offset :offset';
                $db = $connect->prepare($filteredQuery);
                $db->bindValue(':category', $category, PDO::PARAM_INT);
                $db->bindValue(':limit', $limit, PDO::PARAM_INT);
                $db->bindValue(':offset', $offset, PDO::PARAM_INT);
                $db->execute();
                return $db->fetchAll(PDO::FETCH_ASSOC);
        }
        return $db->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function updateProduct($data): bool
    {
        // TODO: Implement updateProduct() method.
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('UPDATE product SET name = :name, marque = :marque, image = :image, description = :description, prix_achat = :prix_achat, prix_vente = :prix_vente, categorie = :categorie WHERE id = :id');
        return $db->execute($data);
    }

    public static function deleteProduct($id): bool
    {
        // TODO: Implement deleteProduct() method.
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('DELETE FROM product WHERE id = :id');
        return $db->execute(["id" => $id]);

    }

    public static function getProductById($id): bool
    {
        // TODO: Implement getProductById() method.
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('SELECT * FROM product WHERE id = :id');
        $db->execute($id);
        return $db->fetch(PDO::FETCH_ASSOC);
    }

 // function that get products by category
    public static function getProductsByCategory($id): bool
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('SELECT * FROM product,categorie WHERE product.categorie = categorie.id');
        $db->execute($id);
        return $db->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function getLimitProductsByCategory(int|string $id)
     {
         $connect = DatabaseModel::connect();
         $querry = 'SELECT product.*,categorie.nom FROM product INNER JOIN categorie ON product.categorie = categorie.id WHERE categorie = :id ORDER BY date_ajout_produit DESC LIMIT 4';
         $db = $connect->prepare($querry);
         $db->bindParam(':id', $id, PDO::PARAM_INT);
         $db->execute();
         return $db->fetchAll(PDO::FETCH_ASSOC);
     }

    public static function getProduct()
    {
        // TODO: Implement getProduct() method.
    }

    public static function getTotalProducts()
    {
        $connect = DatabaseModel::connect();
        $db = $connect->prepare('SELECT count(*) as total FROM product');   // count the number of products
        $db->execute();
        return $db->fetch(PDO::FETCH_ASSOC)['total'];
    }

}