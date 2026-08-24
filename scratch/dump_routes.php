<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$routes = Route::getRoutes();
foreach ($routes as $route) {
    if ($route->uri() === '/') {
        echo "Route: / \n";
        echo "Methods: " . implode(', ', $route->methods()) . "\n";
        echo "Action: " . json_encode($route->getAction()) . "\n\n";
    }
}
