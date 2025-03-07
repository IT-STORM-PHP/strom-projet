<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (!Capsule::schema()->hasTable('tasks')) {
            Capsule::schema()->create('tasks', function (Blueprint $table) {
                $table->id();
                $table->text('title');
                $table->timestamps();
                // Ajoutez ici les autres colonnes nécessaires, par exemple :
                // $table->string('name');
                // $table->integer('age');
            });
            echo "Table 'tasks' créée avec succès.\n";
        } else {
            echo "La table 'tasks' existe déjà.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('tasks')) {
            Capsule::schema()->dropIfExists('tasks');
            echo "Table 'tasks' supprimée.\n";
        } else {
            echo "La table 'tasks' n'existe pas.\n";
        }
    }
};
