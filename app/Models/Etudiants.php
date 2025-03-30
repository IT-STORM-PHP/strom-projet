<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Etudiants extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'etudiants';

    // Définir la clé primaire
    protected $primaryKey = 'id';

    // Champs remplissables
    protected $fillable = ['name__email', 'age', 'note'];

    // Timestamps
    public $timestamps = true;

    // Règles de validation (protégées)
    protected static $rules = array (
  'name__email' => 'string|required',
  'age' => 'integer|required',
  'note' => 'integer|required',
  'created_at' => 'nullable',
  'updated_at' => 'nullable',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'name__email.string' => 'Le champ name__email doit être une chaîne de caractères.',
  'name__email.required' => 'Le champ name__email est obligatoire.',
  'age.integer' => 'Le champ age doit être un entier.',
  'age.required' => 'Le champ age est obligatoire.',
  'note.integer' => 'Le champ note doit être un entier.',
  'note.required' => 'Le champ note est obligatoire.',
);

    // Relations

    public function notes()
    {
        return $this->belongsTo(Notes::class, 'note');
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