<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (Capsule::schema()->hasTable('ok')) {
            Capsule::schema()->table('ok', function (Blueprint $table) {
                if (!Capsule::schema()->hasColumn('ok', 'nom')) {
                    $table->string('nom')->nullable();
                    echo "Colonne 'nom' ajoutée à la table 'ok'.\n";
                } else {
                    echo "La colonne 'nom' existe déjà dans 'ok'.\n";
                }
            });
        } else {
            echo "La table 'ok' n'existe pas.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('ok')) {
            Capsule::schema()->table('ok', function (Blueprint $table) {
                if (Capsule::schema()->hasColumn('ok', 'nom')) {
                    $table->dropColumn('nom');
                    echo "Colonne 'nom' supprimée de la table 'ok'.\n";
                } else {
                    echo "La colonne 'nom' n'existe pas dans 'ok'.\n";
                }
            });
        } else {
            echo "La table 'ok' n'existe pas.\n";
        }
    }
};