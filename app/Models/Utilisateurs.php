<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Utilisateurs extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'utilisateurs';

    // Définir la clé primaire
    protected $primaryKey = 'id';

    // Champs remplissables
    protected $fillable = ['nom', 'prenom', 'email', 'numero', 'password', 'okay'];

    // Timestamps
    public $timestamps = true;

    // Règles de validation (protégées)
    protected static $rules = array (
  'nom' => 'string|required',
  'prenom' => 'string|required',
  'email' => 'string|required',
  'numero' => 'string|required',
  'password' => 'string|required',
  'created_at' => 'required',
  'updated_at' => 'required',
  'okay' => 'string|nullable',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'nom.string' => 'Le champ nom doit être une chaîne de caractères.',
  'nom.required' => 'Le champ nom est obligatoire.',
  'prenom.string' => 'Le champ prenom doit être une chaîne de caractères.',
  'prenom.required' => 'Le champ prenom est obligatoire.',
  'email.string' => 'Le champ email doit être une chaîne de caractères.',
  'email.required' => 'Le champ email est obligatoire.',
  'numero.string' => 'Le champ numero doit être une chaîne de caractères.',
  'numero.required' => 'Le champ numero est obligatoire.',
  'password.string' => 'Le champ password doit être une chaîne de caractères.',
  'password.required' => 'Le champ password est obligatoire.',
  'created_at.required' => 'Le champ created_at est obligatoire.',
  'updated_at.required' => 'Le champ updated_at est obligatoire.',
  'okay.string' => 'Le champ okay doit être une chaîne de caractères.',
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