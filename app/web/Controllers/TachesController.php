<?php

namespace App\web\Controllers;

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
    public function index()
    {
        try {
            $items = Taches::with(['utilisateurs', 'migrations'])->get();
            return Views::render('Taches.index', ['items' => $items]);
            //var_dump(compact('items'));
            
        } catch (\Exception $e) {
            Log::error('Index error: ' . $e->getMessage());
            echo "Erreur: Impossible de charger les données";
            return;
        }
    }

    public function create()
    {
        return Views::render('Taches.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate(
                Taches::getRules(),
                Taches::getMessages()
            );
            
            Taches::create($validated);
            
            return Views::redirect(route('taches.index',));
                
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
            $item = Taches::with(['utilisateurs', 'migrations'])->findOrFail($id);
            return Views::render('Taches.show', ['item' => $item]);
            
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
            $item = Taches::with(['utilisateurs', 'migrations'])->findOrFail($id);
            return Views::render('Taches.edit', ['item' => $item]);
            
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

                Taches::getMessages()
            );
            
            $item = Taches::findOrFail($id);
            $item->update($validated);
            
            return Views::redirect(route('taches.index'));
                
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
            $item = Taches::findOrFail($id);
            $item->delete();
            
            return Views::redirect(route('taches.index'));
                
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