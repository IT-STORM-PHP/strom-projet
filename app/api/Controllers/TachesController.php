<?php

namespace App\api\Controllers;

use StormBin\Package\Controllers\Controller;
use StormBin\Package\Views\Views;
use App\Models\Taches;
use StormBin\Package\Request\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

use App\Models\Utilisateurs;
use App\Models\Migrations;

class TachesController extends Controller
{
    /**
     * Afficher la liste des ressources.
     */
    public function index()
    {
        try {
            // Récupérer les données
            $items = Taches::with(['utilisateurs', 'migrations'])->get();

            // Retourner une réponse JSON structurée
            return Views::jsonResponse([
                'status' => true,
                'message' => 'Données récupérées avec succès',
                'data' => $items, // Encapsuler les données dans une clé "data"
            ], 200);
        } catch (\Exception $e) {
            // Journaliser l'erreur
            Log::error('Erreur lors de la récupération des ressources : ' . $e->getMessage());

            // Retourner une réponse d'erreur structurée
            return Views::jsonResponse([
                'status' => false,
                'message' => 'Une erreur est survenue',
                'error' => $e->getMessage()
            ], 500);
        }
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

            // Retourner une réponse JSON structurée
            return Views::jsonResponse([
                'status' => true,
                'message' => 'Création réussie',
                'data' => $item // Encapsuler les données dans une clé "data"
            ], 201);
        } catch (ValidationException $e) {
            // Retourner les erreurs de validation
            return Views::jsonResponse([
                'status' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Journaliser l'erreur
            Log::error('Erreur lors de la création de la ressource : ' . $e->getMessage());

            // Retourner une réponse d'erreur structurée
            return Views::jsonResponse([
                'status' => false,
                'message' => 'Une erreur est survenue',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Afficher une ressource spécifique.
     */
    public function show($id)
    {
        try {
            // Récupérer la ressource
            $item = Taches::with(['utilisateurs', 'migrations'])->findOrFail($id);

            // Retourner une réponse JSON structurée
            return Views::jsonResponse([
                'status' => true,
                'message' => 'Ressource récupérée avec succès',
                'data' => $item // Encapsuler les données dans une clé "data"
            ], 200);
        } catch (ModelNotFoundException $e) {
            // Retourner une réponse d'erreur structurée
            return Views::jsonResponse([
                'status' => false,
                'message' => 'Ressource non trouvée',
                'error' => 'La ressource demandée n\'existe pas'
            ], 404);
        } catch (\Exception $e) {
            // Journaliser l'erreur
            Log::error('Erreur lors de la récupération de la ressource : ' . $e->getMessage());

            // Retourner une réponse d'erreur structurée
            return Views::jsonResponse([
                'status' => false,
                'message' => 'Une erreur est survenue',
                'error' => $e->getMessage()
            ], 500);
        }
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

            // Retourner une réponse JSON structurée
            return Views::jsonResponse([
                'status' => true,
                'message' => 'Mise à jour réussie',
                'data' => $item // Encapsuler les données dans une clé "data"
            ], 200);
        } catch (ValidationException $e) {
            // Retourner les erreurs de validation
            return Views::jsonResponse([
                'status' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (ModelNotFoundException $e) {
            // Retourner une réponse d'erreur structurée
            return Views::jsonResponse([
                'status' => false,
                'message' => 'Ressource non trouvée',
                'error' => 'La ressource demandée n\'existe pas'
            ], 404);
        } catch (\Exception $e) {
            // Journaliser l'erreur
            Log::error('Erreur lors de la mise à jour de la ressource : ' . $e->getMessage());

            // Retourner une réponse d'erreur structurée
            return Views::jsonResponse([
                'status' => false,
                'message' => 'Une erreur est survenue',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Supprimer une ressource de la base de données.
     */
    public function destroy($id)
    {
        try {
            // Trouver l'entité à supprimer
            $item = Taches::findOrFail($id);

            // Supprimer l'entité
            $item->delete();

            // Retourner une réponse JSON structurée
            return Views::jsonResponse([
                'status' => true,
                'message' => 'Suppression réussie'
            ], 200);
        } catch (ModelNotFoundException $e) {
            // Retourner une réponse d'erreur structurée
            return Views::jsonResponse([
                'status' => false,
                'message' => 'Ressource non trouvée',
                'error' => 'La ressource demandée n\'existe pas'
            ], 404);
        } catch (\Exception $e) {
            // Journaliser l'erreur
            Log::error('Erreur lors de la suppression de la ressource : ' . $e->getMessage());

            // Retourner une réponse d'erreur structurée
            return Views::jsonResponse([
                'status' => false,
                'message' => 'Une erreur est survenue',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}