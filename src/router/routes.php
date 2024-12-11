<?php

include_once __DIR__ . '/../controllers/MainController.php';

$router = new AltoRouter();

// Calcul automatique de la base path (en incluant /public)
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$router->setBasePath($basePath);

$router->map('GET', '/', 'MainController#home', 'home');
$router->map('GET', '/products', 'MainController#products', 'products');
$router->map('GET', '/product', 'MainController#product', 'product'); // Route pour un produit spécifique
$router->map('GET', '/cart', 'MainController#cart', 'cart');
$router->map('GET', '/login', 'MainController#login', 'login');
$router->map('GET', '/register', 'MainController#register', 'register');

$router->map('GET|POST', '*', 'MainController#notFound', 'notFound');

return $router;
