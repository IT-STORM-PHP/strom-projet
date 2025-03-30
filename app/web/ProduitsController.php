<?php

namespace App\web\Controllers;

use StormBin\Package\Controllers\Controller;
use StormBin\Package\Views\Views;
use App\Models\Produits;
use StormBin\Package\Request\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

use App\Models\Categories;
use App\Models\Fournisseurs;
use App\Models\Clients;

class ProduitsController extends Controller
{
    public function index()
    {
        try {
            $items = Produits::with(['categories', 'fournisseurs', 'clients'])->paginate(10);
            return Views::render('Produits.index', ['items' => $items]);
            
        } catch (\Exception $e) {
            Log::error('Index error: ' . $e->getMessage());
            echo "Erreur: Impossible de charger les données";
            return;
        }
    }

    public function create()
    {
        return Views::render('Produits.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate(
                Produits::getRules(),
                Produits::getMessages()
            );
            
            Produits::create($validated);
            
            return Views::redirect(route('produits.index'));
                
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
            $item = Produits::with(['categories', 'fournisseurs', 'clients'])->findOrFail($id);
            return Views::render('Produits.show', ['item' => $item]);
            
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
            $item = Produits::with(['categories', 'fournisseurs', 'clients'])->findOrFail($id);
            return Views::render('Produits.edit', ['item' => $item]);
            
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
        // Debug: Afficher les données reçues
        echo "<pre>Données reçues:\n";
        print_r($request->all());
        echo "</pre>";
        
        // Valider les données
        $validated = $request->validate(Produits::getRules(), Produits::getMessages());
        
        // Debug: Afficher les données validées
        echo "<pre>Données validées:\n";
        print_r($validated);
        echo "</pre>";
        
        // Trouver et mettre à jour l'item
        $item = Produits::findOrFail($id);
        
        // Debug avant mise à jour
        echo "<pre>Avant mise à jour:\n";
        print_r($item->toArray());
        echo "</pre>";
        
        $item->update($validated);
        
        // Debug après mise à jour
        echo "<pre>Après mise à jour:\n";
        print_r($item->fresh()->toArray());
        echo "</pre>";
        
        echo "Mise à jour réussie!";
        return Views::redirect(route('produits.index'));
            
    } catch (ValidationException $e) {
        echo "<pre>Erreur de validation:\n";
        print_r($e->errors());
        echo "</pre>";
        return;
            
    } catch (ModelNotFoundException $e) {
        echo "Erreur: Produit avec ID $id non trouvé";
        return;
            
    } catch (\Exception $e) {
        echo "<pre>Erreur:\n";
        echo $e->getMessage();
        echo "\nStack Trace:\n";
        echo $e->getTraceAsString();
        echo "</pre>";
        return;
    }
}

    public function destroy($id)
    {
        try {
            $item = Produits::findOrFail($id);
            $item->delete();
            
            return Views::redirect(route('produits.index'));
                
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