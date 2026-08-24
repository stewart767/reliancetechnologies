<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Automatically clear configuration/route/services/packages caches if they were generated
// on a local development environment (e.g. Windows/XAMPP) but the application is running
// on a live environment (e.g. Linux), or vice-versa, to prevent database/view errors.
$cachePath = __DIR__ . '/cache/';
$currentDir = dirname(__DIR__);
$escapedCurrentDir = addslashes($currentDir);
$cachedFiles = ['config.php', 'routes-v7.php', 'services.php', 'packages.php'];

foreach ($cachedFiles as $file) {
    $filePath = $cachePath . $file;
    if (file_exists($filePath)) {
        $content = file_get_contents($filePath);
        if (
            strpos($content, $escapedCurrentDir) === false ||
            (DIRECTORY_SEPARATOR === '/' && (strpos($content, 'C:\\') !== false || strpos($content, 'c:\\') !== false))
        ) {
            foreach ($cachedFiles as $f) {
                $fPath = $cachePath . $f;
                if (file_exists($fPath)) {
                    @unlink($fPath);
                }
            }
            break;
        }
    }
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectTo(
            guests: '/admin/login',
            users: '/admin'
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
