<?php

    namespace App\Web\Controllers;

    use StormBin\Package\Controllers\Controller;
    use StormBin\Package\Views\View;
    use App\Web\Models\User;
    class WebController extends Controller
    {
        public function index()
        {
            // Action par défaut
            $users = User::all();
            if ($users->isEmpty()) {
                return "Aucun utilisateur trouvé dans la base de données.";
            }
    
            $output = "Liste des utilisateurs : <br>";
            foreach ($users as $user) {
                $output .= "- " . $user->nom . " (" . $user->email . ")<br>";
            }
    
            return $output;
            echo 'Hello from WebController Controller';
        }
    }
