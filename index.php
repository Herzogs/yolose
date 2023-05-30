<?php
include_once('Configuration.php');
include_once('helpers/Session.php');

Session::initializeSession();

$configuration = new Configuration();
$router = $configuration->getRouter();

$module = $_GET['module'] ?? 'home';
$method = $_GET['action'] ?? 'list';

$controladoresValidos = [
    'home',
    'login',
    'registro',
    'activation',
    'perfil',
    'reportar'
];

if (!Session::isLogged() && !in_array($module, $controladoresValidos)){
        $module = 'home';
}

$router->route($module, $method);
?>
