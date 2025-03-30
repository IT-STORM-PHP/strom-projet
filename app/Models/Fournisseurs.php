<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Fournisseurs extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'fournisseurs';

    // Définir la clé primaire
    protected $primaryKey = 'id';

    // Champs remplissables
    protected $fillable = ['nom_entreprise', 'contact', 'telephone'];

    // Timestamps
    public $timestamps = false;

    // Règles de validation (protégées)
    protected static $rules = array (
  'nom_entreprise' => 'string|required',
  'contact' => 'string|nullable',
  'telephone' => 'string|nullable',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'nom_entreprise.string' => 'Le champ nom_entreprise doit être une chaîne de caractères.',
  'nom_entreprise.required' => 'Le champ nom_entreprise est obligatoire.',
  'contact.string' => 'Le champ contact doit être une chaîne de caractères.',
  'telephone.string' => 'Le champ telephone doit être une chaîne de caractères.',
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