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

// Affichage
echo $factory->make('home')->render();

