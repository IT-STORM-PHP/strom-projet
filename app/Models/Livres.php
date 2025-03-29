<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Livres extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'livres';

    // Définir la clé primaire
    protected $primaryKey = 'id';

    // Champs remplissables
    protected $fillable = ['titre', 'auteur_id', 'isbn'];

    // Timestamps
    public $timestamps = true;

    // Règles de validation (protégées)
    protected static $rules = array (
  'titre' => 'string|required',
  'auteur_id' => 'integer|required',
  'isbn' => 'string|required',
  'created_at' => 'nullable',
  'updated_at' => 'nullable',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'titre.string' => 'Le champ titre doit être une chaîne de caractères.',
  'titre.required' => 'Le champ titre est obligatoire.',
  'auteur_id.integer' => 'Le champ auteur_id doit être un entier.',
  'auteur_id.required' => 'Le champ auteur_id est obligatoire.',
  'isbn.string' => 'Le champ isbn doit être une chaîne de caractères.',
  'isbn.required' => 'Le champ isbn est obligatoire.',
);

    // Relations

    public function auteurs()
    {
        return $this->belongsTo(Auteurs::class, 'auteur_id');
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