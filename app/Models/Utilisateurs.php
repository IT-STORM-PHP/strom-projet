<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utilisateurs extends Model
{
    use HasFactory;

    // Définir le nom de la table
    protected $table = 'utilisateurs'; // Nom de la table

    // Définir la clé primaire
    protected $primaryKey = 'id'; // Clé primaire de la table

    // Champs remplissables
    protected $fillable = ['nom', 'prenom', 'email', 'numero', 'password', 'okay'];

    // Champs protégés
    protected $guarded = [];

    // Pour les timestamps
    public $timestamps = true; // Active created_at et updated_at si nécessaire

    // Gestion des clés étrangères
}