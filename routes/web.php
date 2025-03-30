<?php

    use StormBin\Package\Routes\Route;
    use App\Web\Controllers\WebController;
    use App\Api\Controllers\BackController;
    use StormBin\Package\Request\Request;
    
    use App\Api\Controllers\TelephonesController;

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
    
    
    
    


/* 

use App\Web\Controllers\LivresController;

// Routes pour Livres
Route::get('/livres', [LivresController::class, 'index']);
Route::get('/livres/create', [LivresController::class, 'create']);
Route::post('/livres/store', [LivresController::class, 'store']);
Route::get('/livres/{id}', [LivresController::class, 'show']);
Route::get('/livres/edit/{id}', [LivresController::class, 'edit']);
Route::post('/livres/update/{id}', [LivresController::class, 'update']);
Route::post('/livres/del/{id}', [LivresController::class, 'destroy']);
 */
use App\Web\Controllers\CoursesController;

// Routes pour Courses
Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CoursesController::class, 'create'])->name('courses.create');
Route::post('/courses/store', [CoursesController::class, 'store'])->name('courses.store');
Route::get('/courses/{id}', [CoursesController::class, 'show'])->name('courses.show');
Route::get('/courses/edit/{id}', [CoursesController::class, 'edit'])->name('courses.edit');
Route::post('/courses/update/{id}', [CoursesController::class, 'update'])->name('courses.update');
Route::post('/courses/del/{id}', [CoursesController::class, 'destroy'])->name('courses.destroy');

use App\Web\Controllers\TachesController;

Route::get('/taches', [TachesController::class, 'index'])->name('taches.index');
Route::get('/taches/create', [TachesController::class, 'create'])->name('taches.create');
Route::post('/taches/store', [TachesController::class, 'store'])->name('taches.store');
Route::get('/taches/{id}', [TachesController::class, 'show'])->name('taches.show');
Route::get('/taches/edit/{id}', [TachesController::class, 'edit'])->name('taches.edit');
Route::post('/taches/update/{id}', [TachesController::class, 'update'])->name('taches.update');
Route::post('/taches/destroy/{id}', [TachesController::class, 'destroy'])
     ->name('taches.destroy'); // Nom cohérent
Route::post('/taches/errors', [TachesController::class, 'errors'])->name('will.error');

Route::get('/taches/error', [TachesController::class, 'error'])->name('taches.error');

Route::get('will', [TachesController::class, 'error'])->name('will.error');




use App\Web\Controllers\LivresController;

// Routes pour Livres
Route::get('/livres', [LivresController::class, 'index'])->name('livres.index');
Route::get('/livres/create', [LivresController::class, 'create'])->name('livres.create');
Route::post('/livres/store', [LivresController::class, 'store'])->name('livres.store');
Route::get('/livres/{id}', [LivresController::class, 'show'])->name('livres.show');
Route::get('/livres/edit/{id}', [LivresController::class, 'edit'])->name('livres.edit');
Route::post('/livres/update/{id}', [LivresController::class, 'update'])->name('livres.update');
Route::post('/livres/del/{id}', [LivresController::class, 'destroy'])->name('livres.destroy');
Route::post('/livres/errors', [LivresController::class, 'errors'])->name('livres.errors');

use App\Web\Controllers\ProduitsController;

// Routes pour Produits
Route::get('/produits', [ProduitsController::class, 'index'])->name('produits.index');
Route::get('/produits/create', [ProduitsController::class, 'create'])->name('produits.create');
Route::post('/produits/store', [ProduitsController::class, 'store'])->name('produits.store');
Route::get('/produits/{id}', [ProduitsController::class, 'show'])->name('produits.show');
Route::get('/produits/edit/{id}', [ProduitsController::class, 'edit'])->name('produits.edit');
Route::post('/produits/update/{id}', [ProduitsController::class, 'update'])->name('produits.update');
Route::post('/produits/del/{id}', [ProduitsController::class, 'destroy'])->name('produits.destroy');
Route::post('/produits/errors', [ProduitsController::class, 'errors'])->name('produits.errors');

use App\Web\Controllers\EtudiantsController;

// Routes pour Etudiants
Route::get('/etudiants', [EtudiantsController::class, 'index'])->name('etudiants.index');
Route::get('/etudiants/create', [EtudiantsController::class, 'create'])->name('etudiants.create');
Route::post('/etudiants/store', [EtudiantsController::class, 'store'])->name('etudiants.store');
Route::get('/etudiants/{id}', [EtudiantsController::class, 'show'])->name('etudiants.show');
Route::get('/etudiants/edit/{id}', [EtudiantsController::class, 'edit'])->name('etudiants.edit');
Route::post('/etudiants/update/{id}', [EtudiantsController::class, 'update'])->name('etudiants.update');
Route::post('/etudiants/del/{id}', [EtudiantsController::class, 'destroy'])->name('etudiants.destroy');
Route::post('/etudiants/errors', [EtudiantsController::class, 'errors'])->name('etudiants.errors');

use App\Web\Controllers\NotesController;

// Routes pour Notes
Route::get('/notes', [NotesController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [NotesController::class, 'create'])->name('notes.create');
Route::post('/notes/store', [NotesController::class, 'store'])->name('notes.store');
Route::get('/notes/{id}', [NotesController::class, 'show'])->name('notes.show');
Route::get('/notes/edit/{id}', [NotesController::class, 'edit'])->name('notes.edit');
Route::post('/notes/update/{id}', [NotesController::class, 'update'])->name('notes.update');
Route::post('/notes/del/{id}', [NotesController::class, 'destroy'])->name('notes.destroy');
Route::post('/notes/errors', [NotesController::class, 'errors'])->name('notes.errors');
