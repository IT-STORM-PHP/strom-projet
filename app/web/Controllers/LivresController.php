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
    public function index()
    {
        try {
            $items = Livres::with(['auteurs', 'auteurs'])->paginate(10);
            return Views::render('Livres.index', ['items' => $items]);
            
        } catch (\Exception $e) {
            Log::error('Index error: ' . $e->getMessage());
            echo "Erreur: Impossible de charger les données";
            return;
        }
    }

    public function create()
    {
        return Views::render('Livres.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate(
                Livres::getRules(),
                Livres::getMessages()
            );
            
            Livres::create($validated);
            
            return Views::redirect(route('livres.index'));
                
        } catch (ValidationException $e) {
            echo "Erreur: Données invalides";
            return;
                
        } catch (\Exception $e) {
            Log::error('Store error: ' . $e->getMessage());
            echo "Erreur: Impossible de créer l'élément";
            return;
        }
    }

    public function show($id)
    {
        try {
            $item = Livres::with(['auteurs', 'auteurs'])->findOrFail($id);
            return Views::render('Livres.show', ['item' => $item]);
            
        } catch (ModelNotFoundException $e) {
            echo "Erreur: Élément non trouvé";
            return;
                
        } catch (\Exception $e) {
            Log::error('Show error: ' . $e->getMessage());
            echo "Erreur: Impossible d'afficher l'élément";
            return;
        }
    }

    public function edit($id)
    {
        try {
            $item = Livres::with(['auteurs', 'auteurs'])->findOrFail($id);
            return Views::render('Livres.edit', ['item' => $item]);
            
        } catch (ModelNotFoundException $e) {
            echo "Erreur: Élément non trouvé";
            return;
                
        } catch (\Exception $e) {
            Log::error('Edit error: ' . $e->getMessage());
            echo "Erreur: Impossible d'éditer l'élément";
            return;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate(
                Livres::getRules(), 
                Livres::getMessages()
            );
            
            
            $item = Livres::findOrFail($id);
            $item->update($validated);
            
            echo "modifié";
                
        } catch (ValidationException $e) {
            echo "Erreur: Données invalides";
            return;
                
        } catch (ModelNotFoundException $e) {
            echo "Erreur: Élément non trouvé";
            return;
                
        } catch (\Exception $e) {
            Log::error('Update error: ' . $e->getMessage());
            echo "Erreur: Impossible de mettre à jour" . $e->getMessage();
            return;
        }
    }

    public function destroy($id)
    {
        try {
            $item = Livres::findOrFail($id);
            $item->delete();
            
            return Views::redirect(route('livres.index'));
                
        } catch (ModelNotFoundException $e) {
            echo "Erreur: Élément non trouvé";
            return;
                
        } catch (\Exception $e) {
            Log::error('Delete error: ' . $e->getMessage());
            echo "Erreur: Impossible de supprimer";
            return;
        }
    }
}