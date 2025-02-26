<?php

namespace StormBin\Storm\Console;


class Kernel 
{
    
    protected array $commands = [
        'serve' => 'serve',
        'make:controller'=>'makeController'

    ];

    public function handle($argv)
    {
        $command = $argv[1] ?? null;
        $argument = $argv[2] ?? null;

        if (!$command || !isset($this->commands[$command])) {
            $this->showUsage();
            exit(1);
        }

        $method = $this->commands[$command];
        $this->$method($argument);
    }

    public function makeController($controllerName)
    {
        if (!$controllerName) {
            echo "❌ Veuillez fournir un nom pour le contrôleur.\n";
            exit(1);
        }

        // Mettre la première lettre en majuscule
        $controllerName = ucfirst($controllerName);

        // Chemin du fichier
        $filePath = "app/web/Controllers/{$controllerName}.php";

        // Vérifier si le contrôleur existe déjà
        if (file_exists($filePath)) {
            echo "❌ Le contrôleur '$controllerName' existe déjà.\n";
            exit(1);
        }

        // Contenu du contrôleur
        $content = "<?php\n\nnamespace App\Controllers;\n\n";
        $content .= "use App\Controller\Controllers;\n\n";
        $content .= "class {$controllerName} extends Controller\n{\n";
        $content .= "    public function index()\n    {\n";
        $content .= "        // Action par défaut\n";
        $content .= "        echo 'Hello from {$controllerName} Controller';\n";
        $content .= "    }\n";
        $content .= "}\n";

        // Créer le fichier du contrôleur
        file_put_contents($filePath, $content);

        echo "✅ Contrôleur '$controllerName' créé dans 'app/Controllers'.\n";
    }
    
    protected function serve()
    {
        global $argv;

        $host = "127.0.0.1"; // Valeur par défaut
        $port = 8000;        // Valeur par défaut

        foreach ($argv as $arg) {
            if (strpos($arg, '--host=') === 0) {
                $host = substr($arg, 7);
            } elseif (strpos($arg, '--port=') === 0) {
                $port = (int) substr($arg, 7);
            }
        }

        while (!@stream_socket_server("tcp://$host:$port")) {
            $port++; // Incrémente si le port est occupé
        }

        $cmd = "php -S $host:$port -t public";
        echo "Serveur démarré sur http://$host:$port\n";
        exec($cmd);
    }

    



    protected function showUsage()
    {
        echo "Usage: php storm <commande>\n";
        echo "Commandes disponibles :\n";
        echo "  serve             Démarrer le serveur local\n";
        echo "  make:migration   Créer un fichier de migration\n";
        echo "  migrate           Exécuter les migrations\n";
        //echo "  migrateTest       Exécuter les migrations avec possibilité de mise à jour des tables (test) \n";
        echo "  rollback          Annuler la dernière migration\n";
        echo '  make:crud         Créer un modèle et un contrôleur CRUD pour une table existante' . "\n";
        echo '  make:controller  Créer un contrôleur' . "\n";
        echo '  make:login        Créer un système de connexion avec une table existante' . "\n";
        echo '  make:model        Créer un modèle' . "\n";
    }
    
}
