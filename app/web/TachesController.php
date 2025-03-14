<?php

namespace App\Web\Controllers;

use StormBin\Package\Controllers\Controller;
use StormBin\Package\Views\Views;
use App\Models\Taches;
use StormBin\Package\Request\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Utilisateurs;
use App\Models\Migrations;

class TachesController extends Controller
{
    /**
     * Afficher la liste des ressources.
     */
    public function index()
    {
        $items = Taches::with(['utilisateurs', 'migrations'])->get();
        Views::jsonResponse($items->toArray());
    }

    /**
     * Afficher le formulaire de création d'une nouvelle ressource.
     */
    public function create()
    {
        Views::jsonResponse(['message' => 'Formulaire de création']);
    }

    /**
     * Stocker une nouvelle ressource dans la base de données.
     */
    public function store(Request $request)
    {
        try {
            // Valider les données de la requête
            $validatedData = $request->validate(Taches::getRules(), Taches::getMessages());

            // Créer une nouvelle entité avec les données validées
            $item = Taches::create($validatedData);

            // Retourner une réponse JSON
            Views::jsonResponse(['message' => 'Création réussie', 'data' => $item], 201);
        } catch (ValidationException $e) {
            // Retourner les erreurs de validation
            Views::jsonResponse(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Afficher une ressource spécifique.
     */
    public function show($id)
{
    try {
        // Trouver l'élément avec l'ID spécifié
        $item = Taches::with(['utilisateurs', 'migrations'])->findOrFail($id);
        
        // Retourner une réponse JSON avec l'élément trouvé
        Views::jsonResponse($item->toArray());
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Retourner une réponse JSON avec un message d'erreur et un statut 404
        Views::jsonResponse(['message' => 'Ressource non trouvée', 'id'=>$id], 404);
    }
}

    /**
     * Afficher le formulaire de modification d'une ressource.
     */
    public function edit($id)
    {
        $item = Taches::with(['utilisateurs', 'migrations'])->findOrFail($id);
        Views::jsonResponse(['message' => 'Formulaire de modification', 'data' => $item->toArray()]);
    }

    /**
     * Mettre à jour une ressource dans la base de données.
     */
    public function update(Request $request, $id)
    {
        try {
            // Valider les données de la requête
            $validatedData = $request->validate(Taches::getRules(), Taches::getMessages());

            // Trouver l'entité à mettre à jour
            $item = Taches::findOrFail($id);

            // Mettre à jour l'entité avec les données validées
            $item->update($validatedData);

            // Retourner une réponse JSON
            Views::jsonResponse(['message' => 'Mise à jour réussie', 'data' => $item->toArray()]);
        } catch (ValidationException $e) {
            // Retourner les erreurs de validation
            Views::jsonResponse(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Supprimer une ressource de la base de données.
     */
    public function destroy($id)
    {
        $item = Taches::findOrFail($id);
        $item->delete();
        Views::jsonResponse(['message' => 'Suppression réussie']);
    }
}