<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (!Capsule::schema()->hasTable('etudiants')) {
            Capsule::schema()->create('etudiants', function (Blueprint $table) {
                $table->id();
                $table->string('name__email');
                $table->integer('age');
                $table->unsignedBigInteger('note');
                $table->foreign('note',)->references('id')->on('notes')->onDelete('cascade');
                $table->timestamps();
            });
            echo "Table 'etudiants' créée avec succès.\n";
        } else {
            echo "La table 'etudiants' existe déjà.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('etudiants')) {
            Capsule::schema()->dropIfExists('etudiants');
            echo "Table 'etudiants' supprimée.\n";
        } else {
            echo "La table 'etudiants' n'existe pas.\n";
        }
    }
};