<?php

namespace App\Web\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'utilisateurs'; // Nom de la table
    protected $fillable = ['nom', 'email', 'password']; // Champs remplissables
    public $timestamps = true; // Active created_at et updated_at si nécessaire
}
