<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Migrations extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'migrations';

    // Définir la clé primaire
    protected $primaryKey = 'id';

    // Champs remplissables
    protected $fillable = ['migration'];

    // Timestamps
    public $timestamps = false;

    // Règles de validation (protégées)
    protected static $rules = array (
  'migration' => 'string|required',
  'created_at' => 'required',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'migration.string' => 'Le champ migration doit être une chaîne de caractères.',
  'migration.required' => 'Le champ migration est obligatoire.',
  'created_at.required' => 'Le champ created_at est obligatoire.',
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