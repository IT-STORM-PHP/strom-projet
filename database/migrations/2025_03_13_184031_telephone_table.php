<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (!Capsule::schema()->hasTable('telephones')) {
            Capsule::schema()->create('telephones', function (Blueprint $table) {
                $table->id();
                $table->string('marque');
                $table->integer('num_serie');
                $table->timestamps();
            });
            echo "Table 'telephones' créée avec succès.\n";
        } else {
            echo "La table 'telephones' existe déjà.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('telephones')) {
            Capsule::schema()->dropIfExists('telephones');
            echo "Table 'telephones' supprimée.\n";
        } else {
            echo "La table 'telephones' n'existe pas.\n";
        }
    }
};