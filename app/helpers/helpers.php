<?php

use StormBin\Package\Routes\Route;

// Démarrer la session si elle n'est pas déjà démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!function_exists('route')) {
    /**
     * Génère une URL pour une route nommée.
     *
     * @param string $name Nom de la route.
     * @param array $params Paramètres de la route.
     * @return string URL générée.
     */
    function route(string $name, array $params = []): string
    {
        return Route::route($name, $params);
    }
}

if (!function_exists('asset')) {
    /**
     * Génère une URL pour un fichier statique.
     *
     * @param string $path Chemin du fichier relatif au dossier "public".
     * @return string URL absolue du fichier.
     */
    function asset(string $path): string
    {
        $path = '/' . ltrim($path, '/');
        return '//' . $_SERVER['HTTP_HOST'] . $path; // Utilisation d'un protocole relatif
    }
}

if (!function_exists('url')) {
    /**
     * Génère une URL absolue pour un chemin donné.
     *
     * @param string $path Chemin relatif.
     * @return string URL absolue.
     */
    function url(string $path = ''): string
    {
        $path = '/' . ltrim($path, '/');
        return '//' . $_SERVER['HTTP_HOST'] . $path; // Utilisation d'un protocole relatif
    }
}

if (!function_exists('csrf_field')) {
    /**
     * Génère un champ caché contenant le token CSRF.
     *
     * @return string Champ HTML caché.
     */
    function csrf_field(): string
    {
        return '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    }
}

if (!function_exists('csrf_token')) {
    /**
     * Retourne le token CSRF actuel et en génère un nouveau pour la prochaine requête.
     *
     * @return string Token CSRF.
     */
    function csrf_token(): string
    {
        // Si le token CSRF n'existe pas, en générer un nouveau
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        // Stocker l'ancien token avant de régénérer
        $_SESSION['previous_csrf_token'] = $_SESSION['csrf_token'];

        // Générer un nouveau token CSRF pour la prochaine requête
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        // Retourner le token actuel (celui qui vient d'être généré)
        return $_SESSION['previous_csrf_token'];
    }
}

if (!function_exists('validate_csrf_token')) {
    /**
     * Valide le token CSRF.
     *
     * @param string $token Token CSRF à valider.
     * @return bool True si le token est valide, sinon false.
     */
    function validate_csrf_token(string $token): bool
    {
        // Vérifier si le token correspond au token actuel ou à l'ancien token
        return $token === ($_SESSION['csrf_token'] ?? '') || $token === ($_SESSION['previous_csrf_token'] ?? '');
    }
}

if (!function_exists('old')) {
    /**
     * Retourne une ancienne valeur de formulaire après une redirection.
     *
     * @param string $key Clé de la valeur.
     * @param mixed $default Valeur par défaut.
     * @return mixed Ancienne valeur ou valeur par défaut.
     */
    function old(string $key, $default = null)
    {
        return $_SESSION['old'][$key] ?? $default;
    }
}

if (!function_exists('session')) {
    /**
     * Récupère ou définit une valeur en session.
     *
     * @param string $key Clé de la session.
     * @param mixed $value Valeur à définir (optionnel).
     * @return mixed Valeur de la session si $value est null, sinon null.
     */
    function session(string $key, $value = null)
    {
        if ($value === null) {
            return $_SESSION[$key] ?? null;
        }
        $_SESSION[$key] = $value;
    }
}

if (!function_exists('redirect')) {
    /**
     * Redirige vers une URL.
     *
     * @param string $url URL de redirection.
     * @return void
     */
    function redirect(string $url): void
    {
        header("Location: " . filter_var($url, FILTER_SANITIZE_URL));
        exit();
    }
}