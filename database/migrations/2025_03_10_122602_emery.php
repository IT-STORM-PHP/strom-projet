<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (!Capsule::schema()->hasTable('emery')) {
            Capsule::schema()->create('emery', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
            echo "Table 'emery' créée avec succès.\n";
        } else {
            echo "La table 'emery' existe déjà.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('emery')) {
            Capsule::schema()->dropIfExists('emery');
            echo "Table 'emery' supprimée.\n";
        } else {
            echo "La table 'emery' n'existe pas.\n";
        }
    }
};