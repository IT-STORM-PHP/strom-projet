<?php

namespace App\web\Controllers;

use StormBin\Package\Controllers\Controller;
use StormBin\Package\Views\Views;
use App\Models\Notes;
use StormBin\Package\Request\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;



class NotesController extends Controller
{
    public function index()
    {
        try {
            $items = Notes::with([])->paginate(10);
            return Views::render('Notes.index', ['items' => $items]);
            
        } catch (\Exception $e) {
            Log::error('Index error: ' . $e->getMessage());
            echo "Erreur: Impossible de charger les données";
            return;
        }
    }

    public function create()
    {
        return Views::render('Notes.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate(
                Notes::getRules(),
                Notes::getMessages()
            );
            
            Notes::create($validated);
            
            return Views::redirect(route('notes.index'));
                
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
            $item = Notes::with([])->findOrFail($id);
            return Views::render('Notes.show', ['item' => $item]);
            
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
            $item = Notes::with([])->findOrFail($id);
            return Views::render('Notes.edit', ['item' => $item]);
            
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
        // Debug: Afficher les données reçues (décommenter si nécessaire)
        // echo "<pre>Données reçues:\n";
        // print_r($request->all());
        // echo "</pre>";
        
        $validated = $request->validate(
            Notes::getRules(),
            Notes::getMessages()
        );
        
        // Debug: Afficher les données validées (décommenter si nécessaire)
        // echo "<pre>Données validées:\n";
        // print_r($validated);
        // echo "</pre>";
        
        $item = Notes::findOrFail($id);
        
        // Debug: Afficher l'état avant mise à jour (décommenter si nécessaire)
        // echo "<pre>Avant mise à jour:\n";
        // print_r($item->toArray());
        // echo "</pre>";
        
        $item->update($validated);
        
        // Debug: Afficher l'état après mise à jour (décommenter si nécessaire)
        // echo "<pre>Après mise à jour:\n";
        // print_r($item->fresh()->toArray());
        // echo "</pre>";
        
        return Views::redirect(route('notes.index'));
            
    } catch (ValidationException $e) {
        // Debug: Afficher les erreurs de validation (décommenter si nécessaire)
        // echo "<pre>Erreurs de validation:\n";
        // print_r($e->errors());
        // echo "</pre>";
        echo "Erreur: Données invalides";
        return;
            
    } catch (ModelNotFoundException $e) {
        echo "Erreur: Élément non trouvé";
        return;
            
    } catch (\Exception $e) {
        // Debug: Afficher l'erreur complète (décommenter si nécessaire)
        // echo "<pre>Erreur:\n";
        // echo $e->getMessage();
        // echo "\nStack Trace:\n";
        // echo $e->getTraceAsString();
        // echo "</pre>";
        
        Log::error('Update error: ' . $e->getMessage());
        echo "Erreur: Impossible de mettre à jour" . $e->getMessage();
        return;
    }
}

    public function destroy($id)
    {
        try {
            $item = Notes::findOrFail($id);
            $item->delete();
            
            return Views::redirect(route('notes.index'));
                
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