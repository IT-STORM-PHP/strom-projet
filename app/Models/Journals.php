<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Journals extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'journals';

    // Définir la clé primaire
    protected $primaryKey = 'num_journ';

    // Champs remplissables
    protected $fillable = ['intitulé', 'description', 'genre'];

    // Timestamps
    public $timestamps = true;

    // Règles de validation (protégées)
    protected static $rules = array (
  'intitulé' => 'string|required',
  'description' => 'required',
  'genre' => 'string|required',
  'created_at' => 'date|nullable',
  'updated_at' => 'date|nullable',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'intitulé.string' => 'Le champ intitulé doit être une chaîne de caractères.',
  'intitulé.required' => 'Le champ intitulé est obligatoire.',
  'description.required' => 'Le champ description est obligatoire.',
  'genre.string' => 'Le champ genre doit être une chaîne de caractères.',
  'genre.required' => 'Le champ genre est obligatoire.',
  'created_at.date' => 'Le champ created_at doit être une date valide.',
  'updated_at.date' => 'Le champ updated_at doit être une date valide.',
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