<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (!Capsule::schema()->hasTable('ok')) {
            Capsule::schema()->create('ok', function (Blueprint $table) {
                $table->id();
                $table->string('test');
                $table->timestamps();
                // Ajoutez ici les autres colonnes nécessaires, par exemple :
                // $table->string('name');
                // $table->integer('age');
            });
            echo "Table 'default_table' créée avec succès.\n";
        } else {
            echo "La table 'default_table' existe déjà.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('default_table')) {
            Capsule::schema()->dropIfExists('default_table');
            echo "Table 'default_table' supprimée.\n";
        } else {
            echo "La table 'default_table' n'existe pas.\n";
        }
    }
};
