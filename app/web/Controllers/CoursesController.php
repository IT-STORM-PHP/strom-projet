<?php

namespace App\web\Controllers;

use StormBin\Package\Controllers\Controller;
use StormBin\Package\Views\Views;
use App\Models\Courses;
use StormBin\Package\Request\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

use App\Models\Chauffeurs;
use Illuminate\Support\Facades\Schema ;
class CoursesController extends Controller
{
    /**
     * Afficher la liste des ressources.
     */
    public function index()
{
    try {
        // Récupérer les données de la table
        $items = Courses::with(['chauffeurs'])->get();

        // Récupérer les colonnes à partir de $fillable
        $columns = (new Courses)->getFillable();

        // Passer les données et les colonnes à la vue
        return Views::render('Courses.index', ['items' => $items, 'columns' => $columns]);
    } catch (\Exception $e) {
        Log::error('Erreur lors de la récupération des ressources : ' . $e->getMessage());
        return Views::render('Courses.error', ['message' => 'Une erreur s\'est produite lors de la récupération des ressources.']);
    }
}
    /**
     * Afficher le formulaire de création d'une nouvelle ressource.
     */
    public function create()
    {
        return Views::render('Courses.create');
    }

    /**
     * Stocker une nouvelle ressource dans la base de données.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate(Courses::getRules(), Courses::getMessages());
            $item = Courses::create($validatedData);
            return Views::redirect(route('courses.index'));
        } catch (ValidationException $e) {
            return Views::render('Courses.error', ['message' => 'Erreur de validation : ' . implode(', ', $e->errors())]);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la ressource : ' . $e->getMessage());
            return Views::render('Courses.error', ['message' => 'Une erreur s\'est produite lors de la création de la ressource.']);
        }
    }

    /**
     * Afficher une ressource spécifique.
     */
    public function show($id)
    {
        try {
            $item = Courses::with(['chauffeurs'])->findOrFail($id);
            return Views::render('Courses.show', ['item' => $item]);
        } catch (ModelNotFoundException $e) {
            return Views::render('Courses.error', ['message' => 'Ressource non trouvée.']);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération de la ressource : ' . $e->getMessage());
            return Views::render('Courses.error', ['message' => 'Une erreur s\'est produite lors de la récupération de la ressource.']);
        }
    }

    /**
     * Afficher le formulaire de modification d'une ressource.
     */
    public function edit($id)
    {
        try {
            $item = Courses::with(['chauffeurs'])->findOrFail($id);
            return Views::render('Courses.edit', ['item' => $item]);
        } catch (ModelNotFoundException $e) {
            return Views::render('Courses.error', ['message' => 'Ressource non trouvée.']);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération de la ressource : ' . $e->getMessage());
            return Views::render('Courses.error', ['message' => 'Une erreur s\'est produite lors de la récupération de la ressource.']);
        }
    }

    /**
     * Mettre à jour une ressource dans la base de données.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate(Courses::getRules(), Courses::getMessages());
            $item = Courses::findOrFail($id);
            $item->update($validatedData);
            return Views::redirect(route('courses.index'));
        } catch (ValidationException $e) {
            return Views::render('Courses.error', ['message' => 'Erreur de validation : ' . implode(', ', $e->errors())]);
        } catch (ModelNotFoundException $e) {
            return Views::render('Courses.error', ['message' => 'Ressource non trouvée.']);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de la ressource : ' . $e->getMessage());
            return Views::render('Courses.error', ['message' => 'Une erreur s\'est produite lors de la mise à jour de la ressource.']);
        }
    }

    /**
     * Supprimer une ressource de la base de données.
     */
    public function destroy($id)
    {
        try {
            $item = Courses::findOrFail($id);
            $item->delete();
            return Views::redirect(route('courses.index'));
        } catch (ModelNotFoundException $e) {
            return Views::render('Courses.error', ['message' => 'Ressource non trouvée.']);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de la ressource : ' . $e->getMessage());
            return Views::render('Courses.error', ['message' => 'Une erreur s\'est produite lors de la suppression de la ressource.']);
        }
    }
}