<?php

namespace App\Web\Controllers;

use StormBin\Package\Controllers\Controller;
use StormBin\Package\Views\Views;
use App\Models\Wills;
use StormBin\Package\Request\Request;
use Illuminate\Validation\ValidationException;


class WillsController extends Controller
{
    /**
     * Afficher la liste des ressources.
     */
    public function index()
    {
        $items = Wills::with([])->get();
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
            $validatedData = $request->validate(Wills::getRules(), Wills::getMessages());

            // Créer une nouvelle entité avec les données validées
            $item = Wills::create($validatedData);

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
        $item = Wills::with([])->findOrFail($id);
        Views::jsonResponse($item->toArray());
    }

    /**
     * Afficher le formulaire de modification d'une ressource.
     */
    public function edit($id)
    {
        $item = Wills::with([])->findOrFail($id);
        Views::jsonResponse(['message' => 'Formulaire de modification', 'data' => $item->toArray()]);
    }

    /**
     * Mettre à jour une ressource dans la base de données.
     */
    public function update(Request $request, $id)
{
    //\Log::info("ID reçu dans update : " . $id); // Log l'ID

    try {
        // Valider les données de la requête
        $validatedData = $request->validate(Wills::getRules(), Wills::getMessages());

        // Trouver l'entité à mettre à jour
        $item = Wills::findOrFail($id);

        // Mettre à jour l'entité avec les données validées
        $item->update($validatedData);

        // Retourner une réponse JSON
        return Views::jsonResponse(['message' => 'Mise à jour réussie', 'data' => $item->toArray()]);
    } catch (ValidationException $e) {
        // Retourner les erreurs de validation
        return Views::jsonResponse(['errors' => $e->errors()], 422);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Retourner une réponse JSON avec un message d'erreur et un statut 404
        return Views::jsonResponse(['message' => 'Ressource non trouvée', 'id' => $id], 404);
    }
}

    /**
     * Supprimer une ressource de la base de données.
     */
    public function destroy($id)
    {
        $item = Wills::findOrFail($id);
        $item->delete();
        Views::jsonResponse(['message' => 'Suppression réussie']);
    }
}