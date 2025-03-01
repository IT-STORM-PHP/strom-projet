<?php

    use StormBin\Package\Routes\Route;
    use App\Web\Controllers\WebController;
    

    Route::group(['prefix' => '/test'], function() {

        Route::get('/usr', [WebController::class, 'index'])->name('user.index');

        Route::get('/add' ,[WebController::class, 'add']);
        Route::get('/fnd/{id}' ,[WebController::class, 'find']);
        Route::get('/blade' ,[WebController::class, 'blade']);
    });
    
    
    
    



    