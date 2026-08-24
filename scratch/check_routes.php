<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

foreach (Route::getRoutes() as $r) {
    if ($r->uri() === '/' || str_contains($r->uri(), 'home')) {
        echo "URI: " . $r->uri() . " | Methods: " . implode(',', $r->methods()) . " | Action: " . $r->getActionName() . PHP_EOL;
    }
}
