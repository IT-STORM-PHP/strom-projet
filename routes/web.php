<?php

    use StormBin\Package\Routes\Route;
    use App\Web\Controllers\WebController;
    Route::get('/usr' ,[WebController::class, 'index']);
    Route::get('/add' ,[WebController::class, 'add']);
    Route::get('/fnd/{id}' ,[WebController::class, 'find']);


    