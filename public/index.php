<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once __DIR__ . '/../vendor/autoload.php';
    require __DIR__ . '/../app/helpers/helpers.php';
    require_once __DIR__ . '/../routes/web.php';
    require_once __DIR__ . '/../config/database.php';
    
    use StormBin\Package\Routes\Route;
    use StormBin\Package\MiddleWare\SessionMiddleware;
    SessionMiddleware::start();
    Route::dispatch();
?>