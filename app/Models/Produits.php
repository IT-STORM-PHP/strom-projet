<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Produits extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'produits';

    // Définir la clé primaire
    protected $primaryKey = 'id_produits_will';

    // Champs remplissables
    protected $fillable = ['nom', 'prix', 'stock', 'categorie_id', 'fournisseur_id', 'client_favori_id'];

    // Timestamps
    public $timestamps = false;

    // Règles de validation (protégées)
    protected static $rules = array (
  'nom' => 'string|required',
  'prix' => 'required',
  'stock' => 'integer|nullable',
  'categorie_id' => 'integer|nullable',
  'fournisseur_id' => 'integer|nullable',
  'client_favori_id' => 'integer|nullable',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'nom.string' => 'Le champ nom doit être une chaîne de caractères.',
  'nom.required' => 'Le champ nom est obligatoire.',
  'prix.required' => 'Le champ prix est obligatoire.',
  'stock.integer' => 'Le champ stock doit être un entier.',
  'categorie_id.integer' => 'Le champ categorie_id doit être un entier.',
  'fournisseur_id.integer' => 'Le champ fournisseur_id doit être un entier.',
  'client_favori_id.integer' => 'Le champ client_favori_id doit être un entier.',
);

    // Relations

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categorie_id');
    }

    public function fournisseurs()
    {
        return $this->belongsTo(Fournisseurs::class, 'fournisseur_id');
    }

    public function clients()
    {
        return $this->belongsTo(Clients::class, 'client_favori_id');
    }

    /**
     * Récupérer les règles de validation.
     */
    public static function getRules()
    {
        return static::$rules;
    }

    /**
     * Récupérer les messages d'erreur personnalisés.
     */
    public static function getMessages()
    {
        return static::$messages;
    }
}