<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Taches extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'taches';

    // Définir la clé primaire
    protected $primaryKey = 'id_tache';

    // Champs remplissables
    protected $fillable = ['nom', 'description', 'id_user', 'mig'];

    // Timestamps
    public $timestamps = true;

    // Règles de validation (protégées)
    protected static $rules = array (
  'nom' => 'string|required',
  'description' => 'string|required',
  'id_user' => 'integer|required',
  'created_at' => 'nullable',
  'updated_at' => 'nullable',
  'mig' => 'integer|nullable',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'nom.string' => 'Le champ nom doit être une chaîne de caractères.',
  'nom.required' => 'Le champ nom est obligatoire.',
  'description.string' => 'Le champ description doit être une chaîne de caractères.',
  'description.required' => 'Le champ description est obligatoire.',
  'id_user.integer' => 'Le champ id_user doit être un entier.',
  'id_user.required' => 'Le champ id_user est obligatoire.',
  'mig.integer' => 'Le champ mig doit être un entier.',
);

    // Relations

    public function utilisateurs()
    {
        return $this->belongsTo(Utilisateurs::class, 'id_user');
    }

    public function migrations()
    {
        return $this->belongsTo(Migrations::class, 'mig');
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