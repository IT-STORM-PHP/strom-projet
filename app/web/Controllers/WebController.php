<?php

namespace App\Web\Controllers;

use StormBin\Package\Controllers\Controller;
use StormBin\Package\Views\Views;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Cc;
class WebController extends Controller
{

    public function find($id)
    {
        try {
            $user = User::findOrFail($id);
            return "Utilisateur trouvé : {$user->nom} {$user->prenom} ({$user->email}) - {$user->numero}";
        } catch (\Exception $e) {
            return "Erreur : " . $e->getMessage();
        }
    }
    public function index()
    {
        $cretate_task = Cc::create(
            [
                'title'=>'Un titre',
            ]
        );
        // Action par défaut
        $users = User::all();
        if ($users->isEmpty()) {
            return "Aucun utilisateur trouvé dans la base de données.";
        }

        $output = "Liste des utilisateurs : <br>";
        foreach ($users as $user) {
            $output .= "- " . $user->nom . " (" . $user->email . ")  $user->prenom $user->numero <br> ";
        }

        return $output;
    }

    public function add()
    {
        // Création d'un nouvel utilisateur
        $user = User::create([
            'nom'     => 'Dupont',
            'prenom'  => 'Jean',
            'email'   => 'jean.dupont@example.com',
            'password' => password_hash('secret', PASSWORD_BCRYPT), // Toujours hacher le mot de passe
            'numero'  => '0123456789',
        ]);

        return /*"Utilisateur créé avec succès : " . $user->nom . " (" . $user->email . ")"*/ Views::redirect('/test/usr');
    }
    
    public function blade(){
        $tab = [
            'mangue',
            'orange',
            'ananas',
        ];
        $data = [
            "username"=>'Godwill',
            "email"=>'godwilloussou@gmail.com',
            'data'=>$tab,
            'number'=>13
        ];
        return Views::render('index', $data);
    }
}
