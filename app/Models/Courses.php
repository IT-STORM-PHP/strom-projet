<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Courses extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'courses';

    // Définir la clé primaire
    protected $primaryKey = 'course_id';

    // Champs remplissables
    protected $fillable = ['point_depart', 'point_arrivee', 'date_heure', 'satut', 'chauffeur_id'];

    // Timestamps
    public $timestamps = true;

    // Règles de validation (protégées)
    protected static $rules = array (
  'point_depart' => 'string|required',
  'point_arrivee' => 'string|required',
  'date_heure' => 'date|required',
  'satut' => 'required',
  'chauffeur_id' => 'integer|required',
  'created_at' => 'required',
  'updated_at' => 'required',
);

    // Messages d'erreur personnalisés (protégés)
    protected static $messages = array (
  'point_depart.string' => 'Le champ point_depart doit être une chaîne de caractères.',
  'point_depart.required' => 'Le champ point_depart est obligatoire.',
  'point_arrivee.string' => 'Le champ point_arrivee doit être une chaîne de caractères.',
  'point_arrivee.required' => 'Le champ point_arrivee est obligatoire.',
  'date_heure.date' => 'Le champ date_heure doit être une date valide.',
  'date_heure.required' => 'Le champ date_heure est obligatoire.',
  'satut.required' => 'Le champ satut est obligatoire.',
  'chauffeur_id.integer' => 'Le champ chauffeur_id doit être un entier.',
  'chauffeur_id.required' => 'Le champ chauffeur_id est obligatoire.',
  'created_at.required' => 'Le champ created_at est obligatoire.',
  'updated_at.required' => 'Le champ updated_at est obligatoire.',
);

    // Relations

    public function chauffeurs()
    {
        return $this->belongsTo(Chauffeurs::class, 'chauffeur_id');
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