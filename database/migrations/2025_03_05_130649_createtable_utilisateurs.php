<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (!Capsule::schema()->hasTable('utilisateurs')) {
            Capsule::schema()->create('utilisateurs', function (Blueprint $table) {
                $table->id();
                $table->string('nom', 20);
                $table->string('prenom', 100);
                $table->string('email', 50);
                $table->string('numero', 20);
                $table->string('password');

                $table->timestamps();
                // Ajoutez ici les autres colonnes nécessaires, par exemple :
                // $table->string('name');
                // $table->integer('age');
            });
            echo "Table 'utilisateurs' créée avec succès.\n";
        } else {
            echo "La table 'utilisateurs' existe déjà.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('utilisateurs')) {
            Capsule::schema()->dropIfExists('utilisateurs');
            echo "Table 'utilisateurs' supprimée.\n";
        } else {
            echo "La table 'utilisateurs' n'existe pas.\n";
        }
    }
};
