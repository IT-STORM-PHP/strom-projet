<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (Capsule::schema()->hasTable('utilisateurs')) {
            Capsule::schema()->table('utilisateurs', function (Blueprint $table) {
                if (!Capsule::schema()->hasColumn('utilisateurs', 'okay')) {
                    $table->string('okay')->nullable();
                    echo "Colonne 'okay' ajoutée à la table 'utilisateurs'.\n";
                } else {
                    echo "La colonne 'okay' existe déjà dans 'utilisateurs'.\n";
                }
            });
        } else {
            echo "La table 'utilisateurs' n'existe pas.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('utilisateurs')) {
            Capsule::schema()->table('utilisateurs', function (Blueprint $table) {
                if (Capsule::schema()->hasColumn('utilisateurs', 'okay')) {
                    $table->dropColumn('okay');
                    echo "Colonne 'okay' supprimée de la table 'utilisateurs'.\n";
                } else {
                    echo "La colonne 'okay' n'existe pas dans 'utilisateurs'.\n";
                }
            });
        } else {
            echo "La table 'utilisateurs' n'existe pas.\n";
        }
    }
};