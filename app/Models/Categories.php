<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Categories extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'categories';

    // Définir la clé primaire
    protected $primaryKey = 'id';

    // Champs remplissables
    protected $fillable = ['nom', 'description'];

    // Timestamps
    public $timestamps = false;

    // Règles de validation (protégées)
    protected static $rules = array (
  'nom' => 'string|required',
  'description' => 'string|nullable',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'nom.string' => 'Le champ nom doit être une chaîne de caractères.',
  'nom.required' => 'Le champ nom est obligatoire.',
  'description.string' => 'Le champ description doit être une chaîne de caractères.',
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