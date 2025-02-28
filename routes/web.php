<?php

    use StormBin\Package\Routes\Route;
    use App\Web\Controllers\WebController;
    Route::get('/usr' ,[WebController::class, 'index']);
    