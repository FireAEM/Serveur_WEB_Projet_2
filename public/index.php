<?php

# ini_set('display_errors', 1);
# ini_set('display_startup_errors', 1);
# error_reporting(E_ALL);

include_once __DIR__ . '/../src/Database.php';
include_once __DIR__ . '/../src/controllers/MainController.php';
include_once __DIR__ . '/../vendor/autoload.php';

$router = include_once __DIR__ . '/../src/router/routes.php';

// Débogage
dump($router->getRoutes());

$match = $router->match();

if ($match) {
    dump($match); // Voir ce qu'AltoRouter détecte pour la requête
    [$controller, $method] = explode('#', $match['target']);
    
    if (class_exists($controller) && method_exists($controller, $method)) {
        if (isset($match['params'])) {
            (new $controller())->$method(...array_values($match['params']));
        } else {
            (new $controller())->$method();
        }
    } else {
        (new MainController())->notFound();
    }
} else {
    (new MainController())->notFound();
}
