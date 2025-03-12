<?php

    use StormBin\Package\Routes\Route;
    use App\Web\Controllers\WebController;
    use App\Api\Controllers\BackController;
    use StormBin\Package\Request\Request;
    use App\Web\Controllers\WillsController;


    Route::get('/taches', [WillsController::class, 'index']);
    Route::get('/taches/create', [WillsController::class, 'create']);
    Route::post('/taches/store', [WillsController::class, 'store']);
    Route::get('/taches/{id}', [WillsController::class, 'show']);
    Route::get('/taches/edit/{id}', [WillsController::class, 'edit']);
    Route::post('/taches/update/{id}', [WillsController::class, 'update']);
    Route::post('/del/{id}', [WillsController::class, 'destroy']);

    Route::get('/api', [BackController::class, 'getInfo']);
    Route::get('/update/{id}', [WebController::class, 'updatename']);

    Route::get('/test/{id}-{idd}', function($id){
        echo "\r nothing"  + $id;
        echo "\n  \x1b[32mmake:migration\x1b[0m \x1b[31m<nom_migration>\x1b[0m - Créer une migration avec le nom spécifié\n"; // 'make:migration <nom_migration>' en vert
        return ;
    });

    Route::group(['prefix' => '/test'], function() {

        Route::get('/usr', [WebController::class, 'index'])->name('user.index');

        Route::post('/add' ,[WebController::class, 'add'])->name('user.store');
        Route::get('/fnd/{id}' ,[WebController::class, 'find']);
        Route::get('/blade' ,[WebController::class, 'blade']);
    });
    
    
    
    



    