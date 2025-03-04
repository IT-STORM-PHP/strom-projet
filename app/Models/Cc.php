<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Factories\HasFactory;

    class Cc extends Model
    {
        use HasFactory;

        protected $table = 'tasks'; // Nom de la table

        protected $primaryKey = 'id'; // Clé primaire de la table

        protected $fillable = [
            'title'

        ]; // Champs remplissables

        protected $guarded = [

        ]; // Champs protégé 

        public $timestamps = true; // Active created_at et updated_at si nécessaire

        // gestion des clé etrangère 
        public function service(){
            
        }
    }
