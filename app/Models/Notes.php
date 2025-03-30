<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Notes extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'notes';

    // Définir la clé primaire
    protected $primaryKey = 'id';

    // Champs remplissables
    protected $fillable = ['note', 'description'];

    // Timestamps
    public $timestamps = true;

    // Règles de validation (protégées)
    protected static $rules = array (
  'note' => 'integer|required',
  'description' => 'string|required',
  'created_at' => 'nullable',
  'updated_at' => 'nullable',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'note.integer' => 'Le champ note doit être un entier.',
  'note.required' => 'Le champ note est obligatoire.',
  'description.string' => 'Le champ description doit être une chaîne de caractères.',
  'description.required' => 'Le champ description est obligatoire.',
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