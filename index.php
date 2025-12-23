<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\View\FileViewFinder;
use Illuminate\View\Factory;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Compilers\BladeCompiler;

// Chemins
$viewsPath = __DIR__ . '/views';
$cachePath = __DIR__ . '/cache';

// Container + events
$container = new Container;
$events = new Dispatcher($container);

// Blade compiler
$bladeCompiler = new BladeCompiler(new Illuminate\Filesystem\Filesystem, $cachePath);

// Résolution des engines
$resolver = new EngineResolver;
$resolver->register('blade', function () use ($bladeCompiler) {
    return new CompilerEngine($bladeCompiler);
});

// View Factory
$factory = new Factory(
    $resolver,
    new FileViewFinder(new Illuminate\Filesystem\Filesystem, [$viewsPath]),
    $events
);

// Router simple
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Gestion des routes
switch ($uri) {
    case '/':
    case '/home':
        echo $factory->make('home')->render();
        break;

    case '/login':
        echo $factory->make('login', [
            'currentPage' => 'login'
        ])->render();
        break;

    case '/register':
        echo $factory->make('register')->render();
        break;

    case '/dashboard':
        echo $factory->make('dashboard')->render();
        break;

    case '/about':
        echo $factory->make('about')->render();
        break;

    default:
        http_response_code(404);
        echo $factory->make('404')->render();
        break;
}

