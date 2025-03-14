<?php

    use StormBin\Package\Routes\Route;
    use App\Web\Controllers\WebController;
    use App\Api\Controllers\BackController;
    use StormBin\Package\Request\Request;
    
    use App\Api\Controllers\TelephonesController;

    Route::get('/taches', [TelephonesController::class, 'index']);
    Route::get('/taches/create', [TelephonesController::class, 'create']);
    Route::post('/taches/store', [TelephonesController::class, 'store']);
    Route::get('/taches/{id}', [TelephonesController::class, 'show']);
    Route::get('/taches/edit/{id}', [TelephonesController::class, 'edit']);
    Route::post('/taches/update/{id}', [TelephonesController::class, 'update']);
    Route::post('taches/del/{id}', [TelephonesController::class, 'destroy']);

    Route::get('/api', [BackController::class, 'getInfo']);
    Route::get('/update/{id}', [WebController::class, 'updatename']);

    Route::get('/test/{id}-{idd}', function($id, $idd, Request $request){
        echo "\r nothing" . $id . $idd . "\n";
        $val = $request->get('test');
        echo $val;
        echo"<form action=\"\" method=\"get\">
    <input type=\"text\" name=\"test\">
    
    <input type=\"submit\" name=\"btn\" value=\"Soumettre\">
</form>";
        return ;
    });

    Route::group(['prefix' => '/test'], function() {

        Route::get('/usr', [WebController::class, 'index'])->name('user.index');

        Route::post('/add' ,[WebController::class, 'add'])->name('user.store');
        Route::get('/fnd/{id}' ,[WebController::class, 'find']);
        Route::get('/blade' ,[WebController::class, 'blade']);
    });
    
    
    
    


#use App\Api\Controllers\TachesController;
use App\Web\Controllers\TachesController;
// Routes API pour Taches
Route::get('/api/taches', [TachesController::class, 'index']);
Route::post('/api/taches', [TachesController::class, 'store']);
Route::get('/api/taches/{id}', [TachesController::class, 'show']);
Route::put('/api/taches/{id}', [TachesController::class, 'update']);
Route::delete('/api/taches/{id}', [TachesController::class, 'destroy']);

// Routes pour Taches

Route::get('/taches', [TachesController::class, 'index']);
Route::get('/taches/create', [TachesController::class, 'create']);
Route::post('/taches/store', [TachesController::class, 'store']);
Route::get('/taches/{id}', [TachesController::class, 'show']);
Route::get('/taches/edit/{id}', [TachesController::class, 'edit']);
Route::post('/taches/update/{id}', [TachesController::class, 'update']);
Route::post('/taches/del/{id}', [TachesController::class, 'destroy']);