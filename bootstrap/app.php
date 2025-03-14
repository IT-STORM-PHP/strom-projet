<?php

use Illuminate\Config\Repository as Config;
use Illuminate\Log\LogManager;
use Illuminate\Routing\Router;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


// Inclut la classe CustomContainer
require __DIR__ . '/CustomContainer.php';

// Crée une instance du conteneur personnalisé
$app = new CustomContainer();

// Enregistre le service "events"
$app->bind('events', function () {
    return new Dispatcher();
});

// Enregistre le service "config"
$app->bind('config', function () {
    // Configuration de base pour les logs
    return new Config([
        'logging' => [
            'default' => 'single',
            'channels' => [
                'single' => [
                    'driver' => 'single',
                    'path' => __DIR__ . '/../storage/logs/storm.log',
                    'level' => 'debug',
                ],
            ],
        ],
    ]);
});

// Enregistre le service "log"
$app->bind('log', function ($app) {
    return new LogManager($app);
});

// Enregistre le service "router"
$app->bind('router', function ($app) {
    return new Router($app['events'], $app);
});

// Enregistre le service "request"
$app->bind('request', function () {
    return Request::capture();
});

// Enregistre le service "redirect"
$app->bind('redirect', function ($app) {
    return new \Illuminate\Routing\Redirector(new \Illuminate\Routing\UrlGenerator($app['router']->getRoutes(), $app['request']));
});

// Enregistre le service "jsonResponse"
$app->bind('jsonResponse', function ($app, $parameters) {
    return new JsonResponse($parameters['data'], $parameters['status'], $parameters['headers'], $parameters['options']);
});

// Enregistre le conteneur dans les facades
Illuminate\Support\Facades\Redirect::setFacadeApplication($app);
Illuminate\Support\Facades\Log::setFacadeApplication($app);
Illuminate\Support\Facades\Config::setFacadeApplication($app);
Illuminate\Support\Facades\Event::setFacadeApplication($app);

// Crée des alias pour les facades
class_alias(Illuminate\Support\Facades\Redirect::class, 'Redirect');
class_alias(Illuminate\Support\Facades\Log::class, 'Log');
class_alias(Illuminate\Support\Facades\Config::class, 'Config');
class_alias(Illuminate\Support\Facades\Event::class, 'Event');