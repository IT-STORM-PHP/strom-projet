<?php

namespace App\web\Controllers;

use StormBin\Package\Controllers\Controller;
use StormBin\Package\Views\Views;
use App\Models\Journals;
use StormBin\Package\Request\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;




class JournalsController extends Controller
{
    /**
     * Afficher la liste des ressources.
     */
    public function index()
    {
        try {
            $items = Journals::with([])->get();
            return Views::render('Journals.index', ['items' => $items]);
        } catch (\Exception $e) {
            
            return Views::redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }

    /**
     * Afficher le formulaire de création d'une nouvelle ressource.
     */
    public function create()
    {
        return Views::render('Journals.create');
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

            // Rediriger vers la liste des ressources avec un message de succès
            return Views::redirect(route('Journals.index'))->with('success', 'Création réussie');
        } catch (ValidationException $e) {
            // Rediriger avec les erreurs de validation
            return Views::redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            
            return Views::redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }

    /**
     * Afficher une ressource spécifique.
     */
    public function show($id)
    {
        try {
            $item = Journals::with([])->findOrFail($id);
            return Views::render('Journals.show', ['item' => $item]);
        } catch (ModelNotFoundException $e) {
            return Views::redirect()->back()->with('error', 'Ressource non trouvée');
        } catch (\Exception $e) {
            
            return Views::redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }

    /**
     * Afficher le formulaire de modification d'une ressource.
     */
    public function edit($id)
    {
        try {
            $item = Journals::with([])->findOrFail($id);
            return Views::render('Journals.edit', ['item' => $item]);
        } catch (ModelNotFoundException $e) {
            return Views::redirect()->back()->with('error', 'Ressource non trouvée');
        } catch (\Exception $e) {
            
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
            $validatedData = $request->validate(Journals::getRules(), Journals::getMessages());

            // Trouver l'entité à mettre à jour
            $item = Journals::findOrFail($id);

            // Mettre à jour l'entité avec les données validées
            $item->update($validatedData);

            // Rediriger vers la liste des ressources avec un message de succès
            return Views::redirect(route('Journals.index'))->with('success', 'Mise à jour réussie');
        } catch (ValidationException $e) {
            // Rediriger avec les erreurs de validation
            return Views::redirect()->back()->withErrors($e->errors())->withInput();
        } catch (ModelNotFoundException $e) {
            return Views::redirect()->back()->with('error', 'Ressource non trouvée');
        } catch (\Exception $e) {
            
            return Views::redirect()->back()->with('error', 'Une erreur est survenue');
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
            return Views::redirect(route('Journals.index'))->with('success', 'Suppression réussie');
        } catch (ModelNotFoundException $e) {
            return Views::redirect()->back()->with('error', 'Ressource non trouvée');
        } catch (\Exception $e) {
            
            return Views::redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }
}


for ($i=0 ; $i<5; $i+=1){
    echo("Bonjour");
    $ii+=1;
}