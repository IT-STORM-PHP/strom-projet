<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (Capsule::schema()->hasTable('emery')) {
            Capsule::schema()->table('emery', function (Blueprint $table) {
                if (!Capsule::schema()->hasColumn('emery', 'test')) {
                    $table->string('test')->nullable();
                    $table->string('uno')->nullable();
                    
                    

                    echo "Colonne 'test' ajoutée à la table 'emery'.\n";
                } else {
                    echo "La colonne 'test' existe déjà dans 'emery'.\n";
                }
            });
        } else {
            echo "La table 'emery' n'existe pas.\n";
        }
    }

    public function down()
    {
        if (Capsule::schema()->hasTable('emery')) {
            Capsule::schema()->table('emery', function (Blueprint $table) {
                if (Capsule::schema()->hasColumn('emery', 'test')) {
                    $table->dropColumn('test');
                    echo "Colonne 'test' supprimée de la table 'emery'.\n";
                } else {
                    echo "La colonne 'test' n'existe pas dans 'emery'.\n";
                }
            });
        } else {
            echo "La table 'emery' n'existe pas.\n";
        }
    }
};