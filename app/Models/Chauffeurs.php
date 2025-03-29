<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Chauffeurs extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'chauffeurs';

    // Définir la clé primaire
    protected $primaryKey = 'chauffeur_id';

    // Champs remplissables
    protected $fillable = ['nom', 'prenoms', 'telephone', 'sexe', 'disponible'];

    // Timestamps
    public $timestamps = true;

    // Règles de validation (protégées)
    protected static $rules = array (
  'nom' => 'string|required',
  'prenoms' => 'string|required',
  'telephone' => 'string|required',
  'sexe' => 'required',
  'disponible' => 'integer|required',
  'created_at' => 'required',
  'updated_at' => 'required',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'nom.string' => 'Le champ nom doit être une chaîne de caractères.',
  'nom.required' => 'Le champ nom est obligatoire.',
  'prenoms.string' => 'Le champ prenoms doit être une chaîne de caractères.',
  'prenoms.required' => 'Le champ prenoms est obligatoire.',
  'telephone.string' => 'Le champ telephone doit être une chaîne de caractères.',
  'telephone.required' => 'Le champ telephone est obligatoire.',
  'sexe.required' => 'Le champ sexe est obligatoire.',
  'disponible.integer' => 'Le champ disponible doit être un entier.',
  'disponible.required' => 'Le champ disponible est obligatoire.',
  'created_at.required' => 'Le champ created_at est obligatoire.',
  'updated_at.required' => 'Le champ updated_at est obligatoire.',
);

    // Relations

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