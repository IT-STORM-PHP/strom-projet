<?php

namespace App\web\Controllers;

use StormBin\Package\Controllers\Controller;
use StormBin\Package\Views\Views;
use App\Models\Livres;
use StormBin\Package\Request\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

use App\Models\Auteurs;

class LivresController extends Controller
{
    /**
     * Afficher la liste des ressources.
     */
    public function index()
    {
        try {
            $items = Livres::with(['auteurs'])->get();
            return Views::render('Livres.index', ['items' => $items]);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des ressources : ' . $e->getMessage());
            return Views::redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }

    /**
     * Afficher le formulaire de création d'une nouvelle ressource.
     */
    public function create()
    {
        return Views::render('Livres.create');
    }

    /**
     * Stocker une nouvelle ressource dans la base de données.
     */
    public function store(Request $request)
    {
        try {
            // Valider les données de la requête
            $validatedData = $request->validate(Livres::getRules(), Livres::getMessages());

            // Créer une nouvelle entité avec les données validées
            $item = Livres::create($validatedData);

            // Rediriger vers la liste des ressources avec un message de succès
            return Views::redirect(route('Livres.index'))->with('success', 'Création réussie');
        } catch (ValidationException $e) {
            // Rediriger avec les erreurs de validation
            return Views::redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de la ressource : ' . $e->getMessage());
            return Views::redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }

    /**
     * Afficher une ressource spécifique.
     */
    public function show($id)
    {
        try {
            $item = Livres::with(['auteurs'])->findOrFail($id);
            return Views::render('Livres.show', ['item' => $item]);
        } catch (ModelNotFoundException $e) {
            return Views::redirect()->back()->with('error', 'Ressource non trouvée');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération de la ressource : ' . $e->getMessage());
            return Views::redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }

    /**
     * Afficher le formulaire de modification d'une ressource.
     */
    public function edit($id)
    {
        try {
            $item = Livres::with(['auteurs'])->findOrFail($id);
            return Views::render('Livres.edit', ['item' => $item]);
        } catch (ModelNotFoundException $e) {
            return Views::redirect()->back()->with('error', 'Ressource non trouvée');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération de la ressource : ' . $e->getMessage());
            return Views::redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }

    /**
     * Mettre à jour une ressource dans la base de données.
     */
    public function update(Request $request, $id)
    {
        try {
            // Valider les données de la requête
            $validatedData = $request->validate(Livres::getRules(), Livres::getMessages());

            // Trouver l'entité à mettre à jour
            $item = Livres::findOrFail($id);

            // Mettre à jour l'entité avec les données validées
            $item->update($validatedData);

            // Rediriger vers la liste des ressources avec un message de succès
            return Views::redirect(route('Livres.index'))->with('success', 'Mise à jour réussie');
        } catch (ValidationException $e) {
            // Rediriger avec les erreurs de validation
            return Views::redirect()->back()->withErrors($e->errors())->withInput();
        } catch (ModelNotFoundException $e) {
            return Views::redirect()->back()->with('error', 'Ressource non trouvée');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de la ressource : ' . $e->getMessage());
            return Views::redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }

    /**
     * Supprimer une ressource de la base de données.
     */
    public function destroy($id)
    {
        try {
            $item = Livres::findOrFail($id);
            $item->delete();
            return Views::redirect(route('Livres.index'))->with('success', 'Suppression réussie');
        } catch (ModelNotFoundException $e) {
            return Views::redirect()->back()->with('error', 'Ressource non trouvée');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de la ressource : ' . $e->getMessage());
            return Views::redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }
}