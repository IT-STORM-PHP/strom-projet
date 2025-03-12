<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        $tableName = 'emery';
        $columnsToRemove = ['test', 'uno']; //  autant de colonnes que nécessaire

        if (!Capsule::schema()->hasTable($tableName)) {
            echo "❌ La table '{$tableName}' n'existe pas.\n";
            return;
        }

        Capsule::schema()->table($tableName, function ($table) use ($tableName, $columnsToRemove) {
            foreach ($columnsToRemove as $column) {
                if (Capsule::schema()->hasColumn($tableName, $column)) {
                    $table->dropColumn($column);
                    echo "✅ Colonne '{$column}' supprimée de la table '{$tableName}'.\n";
                } else {
                    echo "⚠️ La colonne '{$column}' n'existe pas dans la table '{$tableName}'.\n";
                }
            }
        });
    }
};
