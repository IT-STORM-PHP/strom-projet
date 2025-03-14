<?php

namespace App\api\Controllers;

use StormBin\Package\Controllers\Controller;
use StormBin\Package\Views\Views;
use App\Models\Journals;
use StormBin\Package\Request\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;



class JournalsController extends Controller
{
    /**
     * Afficher la liste des ressources.
     */
    public function index()
    {
        try {
            $items = Journals::with([])->get();
            return Views::jsonResponse(['data' => $items], 200); // Retourner un tableau
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des ressources : ' . $e->getMessage());
            return Views::jsonResponse(['message' => 'Une erreur est survenue'], 500);
        }
    }

    /**
     * Stocker une nouvelle ressource dans la base de données.
     */
    public function store(Request $request)
    {
        try {
            // Valider les données de la requête
            $validatedData = $request->validate(Journals::getRules(), Journals::getMessages());

            // Créer une nouvelle entité avec les données validées
            $item = Journals::create($validatedData);

            // Retourner une réponse JSON
            return Views::jsonResponse([
                'message' => 'Création réussie',
                'data' => $item->toArray() // Convertir l'objet en tableau
            ], 201);
        } catch (ValidationException $e) {
            // Retourner les erreurs de validation
            return Views::jsonResponse(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la ressource : ' . $e->getMessage());
            return Views::jsonResponse(['message' => 'Une erreur est survenue'], 500);
        }
    }

    /**
     * Afficher une ressource spécifique.
     */
    public function show($id)
    {
        try {
            $item = Journals::with([])->findOrFail($id);
            return Views::jsonResponse(['data' => $item->toArray()], 200); // Convertir l'objet en tableau
        } catch (ModelNotFoundException $e) {
            return Views::jsonResponse(['message' => 'Ressource non trouvée'], 404);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération de la ressource : ' . $e->getMessage());
            return Views::jsonResponse(['message' => 'Une erreur est survenue'], 500);
        }
    }

    /**
     * Mettre à jour une ressource dans la base de données.
     */
    public function update(Request $request, $id)
    {
        try {
            // Valider les données de la requête
            $validatedData = $request->validate(Journals::getRules(), Journals::getMessages());

            // Trouver l'entité à mettre à jour
            $item = Journals::findOrFail($id);

            // Mettre à jour l'entité avec les données validées
            $item->update($validatedData);

            // Retourner une réponse JSON
            return Views::jsonResponse([
                'message' => 'Mise à jour réussie',
                'data' => $item->toArray() // Convertir l'objet en tableau
            ], 200);
        } catch (ValidationException $e) {
            // Retourner les erreurs de validation
            return Views::jsonResponse(['errors' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return Views::jsonResponse(['message' => 'Ressource non trouvée'], 404);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de la ressource : ' . $e->getMessage());
            return Views::jsonResponse(['message' => 'Une erreur est survenue'], 500);
        }
    }

    /**
     * Supprimer une ressource de la base de données.
     */
    public function destroy($id)
    {
        try {
            $item = Journals::findOrFail($id);
            $item->delete();
            return Views::jsonResponse(['message' => 'Suppression réussie'], 200);
        } catch (ModelNotFoundException $e) {
            return Views::jsonResponse(['message' => 'Ressource non trouvée'], 404);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de la ressource : ' . $e->getMessage());
            return Views::jsonResponse(['message' => 'Une erreur est survenue'], 500);
        }
    }
}