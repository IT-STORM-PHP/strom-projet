<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (!Capsule::schema()->hasTable('auteurs')) {
            Capsule::schema()->create('auteurs', function (Blueprint $table) {
                $table->id();
                $table->string('nom', 100);
                $table->timestamps();
            });
            echo "Table 'auteurs' créée avec succès.\n";
        } else {
            echo "La table 'auteurs' existe déjà.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('auteurs')) {
            Capsule::schema()->dropIfExists('auteurs');
            echo "Table 'auteurs' supprimée.\n";
        } else {
            echo "La table 'auteurs' n'existe pas.\n";
        }
    }
};