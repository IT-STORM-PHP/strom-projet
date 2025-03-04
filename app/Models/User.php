<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    protected $table = 'utilisateurs'; // Nom de la table
    protected $fillable = ['nom', 'email', 'password', 'prenom', 'numero']; // Champs remplissables
    public $timestamps = true; // Active created_at et updated_at si nécessaire
}
