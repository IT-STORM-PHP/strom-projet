<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (!Capsule::schema()->hasTable('journals')) {
            Capsule::schema()->create('journals', function (Blueprint $table) {
                $table->id('num_journ');
                $table->string('intitulé');
                $table->text('description');
                $table->enum('genre', ['Informatique', 'Finance']);
                $table->timestamps();
            });
            echo "Table 'journal' créée avec succès.\n";
        } else {
            echo "La table 'journal' existe déjà.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('journals')) {
            Capsule::schema()->dropIfExists('journals');
            echo "Table 'journal' supprimée.\n";
        } else {
            echo "La table 'journal' n'existe pas.\n";
        }
    }
};