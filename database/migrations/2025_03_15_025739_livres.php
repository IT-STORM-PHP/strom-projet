<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (!Capsule::schema()->hasTable('livres')) {
            Capsule::schema()->create('livres', function (Blueprint $table) {
                $table->id();
                $table->string('titre', 100);
                $table->unsignedBigInteger('auteur_id');
                $table->foreign('auteur_id')->references('id')->on('auteurs');
                $table->string('isbn', 13);
                $table->timestamps();
            });
            echo "Table 'livres' créée avec succès.\n";
        } else {
            echo "La table 'livres' existe déjà.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('livres')) {
            Capsule::schema()->dropIfExists('livres');
            echo "Table 'livres' supprimée.\n";
        } else {
            echo "La table 'livres' n'existe pas.\n";
        }
    }
};