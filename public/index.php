<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$request = Request::capture();

// If the request is rewritten to /public internally (the URI doesn't have /public but the script path does),
// we adjust SCRIPT_NAME and PHP_SELF to remove '/public' so Symfony detects the correct base URL.
$scriptName = $request->server->get('SCRIPT_NAME');
if (str_contains($scriptName, '/public/') && !str_contains($request->getRequestUri(), '/public')) {
    $request->server->set('SCRIPT_NAME', str_replace('/public', '', $scriptName));
    $request->server->set('PHP_SELF', str_replace('/public', '', $request->server->get('PHP_SELF')));

    $request->initialize(
        $request->query->all(),
        $request->request->all(),
        $request->attributes->all(),
        $request->cookies->all(),
        $request->files->all(),
        $request->server->all(),
        $request->getContent()
    );
}

$app->handleRequest($request);
