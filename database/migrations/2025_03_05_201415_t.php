<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (!Capsule::schema()->hasTable('wills')) {
            Capsule::schema()->create('wills', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
            });
            echo "Table 'wills' créée avec succès.\n";
        } else {
            echo "La table 'wills' existe déjà.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('wills')) {
            Capsule::schema()->dropIfExists('wills');
            echo "Table 'wills' supprimée.\n";
        } else {
            echo "La table 'wills' n'existe pas.\n";
        }
    }
};