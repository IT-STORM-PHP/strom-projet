<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

return new class extends Migration {
    public function up()
    {
        if (Capsule::schema()->hasTable('ok')) {
            Capsule::schema()->dropIfExists('ok');
            echo "Table 'ok' supprimée avec succès.\n";
        } else {
            echo "La table 'ok' n'existe pas.\n";
        }
    }

    public function down()
    {
        // Pour restaurer la table, il faudrait une logique d'up pour la créer de nouveau.
        echo "La table 'ok' ne peut pas être restaurée automatiquement.\n";
    }
};
