<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Clients extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'clients';

    // Définir la clé primaire
    protected $primaryKey = 'id';

    // Champs remplissables
    protected $fillable = ['prenom', 'nom', 'email', 'date_inscription'];

    // Timestamps
    public $timestamps = false;

    // Règles de validation (protégées)
    protected static $rules = array (
  'prenom' => 'string|required',
  'nom' => 'string|required',
  'email' => 'string|nullable',
  'date_inscription' => 'date|nullable',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'prenom.string' => 'Le champ prenom doit être une chaîne de caractères.',
  'prenom.required' => 'Le champ prenom est obligatoire.',
  'nom.string' => 'Le champ nom doit être une chaîne de caractères.',
  'nom.required' => 'Le champ nom est obligatoire.',
  'email.string' => 'Le champ email doit être une chaîne de caractères.',
  'date_inscription.date' => 'Le champ date_inscription doit être une date valide.',
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