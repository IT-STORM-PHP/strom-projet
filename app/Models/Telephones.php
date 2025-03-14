<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Telephones extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'telephones';

    // Définir la clé primaire
    protected $primaryKey = 'id';

    // Champs remplissables
    protected $fillable = ['marque', 'num_serie'];

    // Timestamps
    public $timestamps = true;

    // Règles de validation (protégées)
    protected static $rules = array (
  'marque' => 'required',
  'num_serie' => 'integer|required',
  'created_at' => 'nullable',
  'updated_at' => 'nullable',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'marque.required' => 'Le champ marque est obligatoire.',
  'num_serie.integer' => 'Le champ num_serie doit être un entier.',
  'num_serie.required' => 'Le champ num_serie est obligatoire.',
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