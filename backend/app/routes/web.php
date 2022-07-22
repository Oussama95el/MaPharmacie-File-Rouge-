<?php


use App\Controller\AdminController;
use App\Controller\CategoryController;
use App\Controller\ClientController;
use App\Controller\LivreurController;
use App\Controller\OrderController;
use App\Controller\OrderDetailController;
use App\Controller\ProductController;
use App\router\Route;

//admin routes
Route::post('/admin/login' , [AdminController::class, "auth"]);




//client routes
Route::post("/client/register", [ClientController::class, "register"]);
Route::post('/client/login' , [ClientController::class, "auth"]);
Route::post('/client/updateInfo' , [ClientController::class, "updateClientInfo"]);
Route::post("/client/getClientInfo" , [ClientController::class, "getClientById"]);

//livreur routes
Route::post('/livreur/login',[LivreurController::class,"auth"]);
Route::get('/livreur/getAllLivreur',[LivreurController::class,"getAllLivreur"]);
Route::post('/livreur/addLivreur' , [LivreurController::class, "addLivreur"]);
Route::post('/livreur/updateLivreur' , [LivreurController::class, "updateLivreur"]);
Route::delete('/livreur/delete/{id}' , [LivreurController::class, "deleteLivreur"]);
//Category routes
Route::post('/category/add', [CategoryController::class,"addCategory"]);
Route::post('/category/update',[CategoryController::class,"updateCategory"]);
Route::get('/categories',[CategoryController::class,"geAllCategories"]);
Route::delete('/category/delete/{id}',[CategoryController::class,"deleteCategory"]);
//Product routes
Route::post('/product/add',[ProductController::class,"addProduct"]);
Route::get('/products/totalPages',[ProductController::class,"getTotalPages"]);
Route::get('/products',[ProductController::class,"getAllProducts"]);
Route::get('/products/similarProd/{category}',[ProductController::class,"getProductsByCategory"]);
Route::post('/product/update',[ProductController::class,"updateProduct"]);
Route::delete('/product/delete/{id}',[ProductController::class,"deleteProduct"]);
Route::post('/product/{search}',[ProductController::class,"searchProduct"]);
//// Order details routes
Route::post('/datail/add', [OrderDetailController::class,"addOrderDetail"]);
Route::post('/details', [OrderDetailController::class,"OrderDetailByOrder"]);
//Route::get('/detail/getAll', [OrderDetailController::class,"getAllOrderDetails"]);
//// Order routes
Route::post('/order/add',[OrderController::class,"addOrder"]);
Route::post('/order/update',[OrderController::class,"updateOrderLivereur"]);
Route::post('/orders/valid',[OrderController::class,"fetchOrdersByStatus"] );
//Route::post('/livreur/currentLivreur' , [OrderController::class, "getCurrentLivreur"]);
Route::post('/orders/invalid',[OrderController::class,"InvalidOrders"]);
Route::post('/order/status',[OrderController::class,"updateStatus"]);

