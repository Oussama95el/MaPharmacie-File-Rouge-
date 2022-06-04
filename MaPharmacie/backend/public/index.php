<?php


use App\router\Route;

require_once dirname(__DIR__)."/app/utils/index.php";

require_once dirname(__DIR__)."/vendor/autoload.php";
require_once dirname(__DIR__)."/app/routes/index.php";


Route::handleRequest(); // handle current request