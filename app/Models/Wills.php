<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Wills extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'wills';

    // Définir la clé primaire
    protected $primaryKey = 'id';

    // Champs remplissables
    protected $fillable = ['ok'];

    // Timestamps
    public $timestamps = true;

    // Règles de validation (protégées)
    protected static $rules = array (
  'ok' => 'string|required',
  'created_at' => 'nullable',
  'updated_at' => 'nullable',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'ok.string' => 'Le champ ok doit être une chaîne de caractères.',
  'ok.required' => 'Le champ ok est obligatoire.',
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