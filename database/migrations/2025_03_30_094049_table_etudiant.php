<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (!Capsule::schema()->hasTable('notes')) {
            Capsule::schema()->create('notes', function (Blueprint $table) {
                $table->id();
                $table->integer('note');
                $table->text('description');
                $table->timestamps();
            });
            echo "Table 'notes' créée avec succès.\n";
        } else {
            echo "La table 'notes' existe déjà.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('notes')) {
            Capsule::schema()->dropIfExists('notes');
            echo "Table 'notes' supprimée.\n";
        } else {
            echo "La table 'notes' n'existe pas.\n";
        }
    }
};