<?php

namespace App\web\Controllers;

use StormBin\Package\Controllers\Controller;
use StormBin\Package\Views\Views;
use App\Models\Courses;
use StormBin\Package\Request\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use App\Models\Chauffeurs;

class CoursesController extends Controller
{
    /**
     * Afficher la liste des ressources.
     */
    public function index()
    {
        
        try {
            $items = Courses::with(['chauffeurs'])->get();
            return Views::render('Courses.index', ['items' => $items]);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des ressources : ' . $e->getMessage());
            echo "Erreur lors de la récupération des ressources. Veuillez réessayer plus tard.";
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
            // Valider les données de la requête
            $validatedData = $request->validate(Courses::getRules(), Courses::getMessages());

            // Créer une nouvelle entité avec les données validées
            $item = Courses::create($validatedData);

            // Rediriger vers la liste des ressources avec un message de succès
            return Views::render('Courses.index')->with('success', 'Création réussie');
        } catch (ValidationException $e) {
            // Afficher les erreurs de validation
            echo "Erreur de validation : " . implode(", ", $e->errors());
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la ressource : ' . $e->getMessage());
            echo "Erreur lors de la création de la ressource. Veuillez réessayer plus tard.";
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
            echo "Ressource non trouvée.";
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération de la ressource : ' . $e->getMessage());
            echo "Erreur lors de la récupération de la ressource. Veuillez réessayer plus tard.";
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
            echo "Ressource non trouvée.";
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération de la ressource : ' . $e->getMessage());
            echo "Erreur lors de la récupération de la ressource. Veuillez réessayer plus tard.";
        }
    }

    /**
     * Mettre à jour une ressource dans la base de données.
     */
    public function update(Request $request, $id)
{
    try {
        // Valider les données de la requête
        $validatedData = $request->validate(Courses::getRules(), Courses::getMessages());

        // Trouver l'entité à mettre à jour
        $item = Courses::findOrFail($id);

        // Mettre à jour l'entité avec les données validées
        $item->update($validatedData);

        // Rediriger vers la liste des ressources avec un message de succès
        return Views::redirect(route('courses.index'));
    } catch (ValidationException $e) {
        // Afficher les erreurs de validation de manière structurée
        $errors = [];
        foreach ($e->errors() as $field => $messages) {
            $errors[] = "$field: " . implode(", ", $messages);
        }
        echo "Erreur de validation : " . implode(" | ", $errors);
    } catch (ModelNotFoundException $e) {
        echo "Ressource non trouvée.";
    } catch (\Exception $e) {
        Log::error('Erreur lors de la mise à jour de la ressource : ' . $e->getMessage());
        echo "Erreur lors de la mise à jour de la ressource. Veuillez réessayer plus tard.";
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
            return Views::redirect('/courses');
        } catch (ModelNotFoundException $e) {
            echo "Ressource non trouvée.";
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de la ressource : ' . $e->getMessage());
            echo "Erreur lors de la suppression de la ressource. Veuillez réessayer plus tard.";
        }
    }
}