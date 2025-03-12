<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (Capsule::schema()->hasTable('taches')) {
            Capsule::schema()->table('taches', function (Blueprint $table) {
                if (!Capsule::schema()->hasColumn('taches', 'mig')) {
                    $table->unsignedBigInteger('mig')->nullable();
                    $table->foreign('mig')->references('id')->on('migrations')->onDelete('cascade');
                    echo "Colonne 'mig' ajoutée à la table 'taches'.\n";
                } else {
                    echo "La colonne 'mig' existe déjà dans 'taches'.\n";
                }
            });
        } else {
            echo "La table 'taches' n'existe pas.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('taches')) {
            Capsule::schema()->table('taches', function (Blueprint $table) {
                if (Capsule::schema()->hasColumn('taches', 'mig')) {
                    $table->dropColumn('mig');
                    echo "Colonne 'mig' supprimée de la table 'taches'.\n";
                } else {
                    echo "La colonne 'mig' n'existe pas dans 'taches'.\n";
                }
            });
        } else {
            echo "La table 'taches' n'existe pas.\n";
        }
    }
};