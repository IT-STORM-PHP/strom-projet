<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (!Capsule::schema()->hasTable('taches')) {
            Capsule::schema()->create('taches', function (Blueprint $table) {
                $table->id('id_tache');
                $table->string('nom');
                $table->text('description');
                $table->integer('id_user');
                $table->foreign('id_user')->references('id')->on('utilisateurs')->onDelete('cascade');
                $table->timestamps(true);
                // Ajoutez ici les autres colonnes nécessaires, par exemple :
                // $table->string('name');
                // $table->integer('age');
            });
            echo "Table 'taches' créée avec succès.\n";
        } else {
            echo "La table 'taches' existe déjà.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('taches')) {
            Capsule::schema()->dropIfExists('taches');
            echo "Table 'taches' supprimée.\n";
        } else {
            echo "La table 'taches' n'existe pas.\n";
        }
    }
};
