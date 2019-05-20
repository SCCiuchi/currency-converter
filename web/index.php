<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/views');
$twig = new \Twig\Environment($loader);

echo $twig->render('index.html.twig');

//$debug = new \App\Controllers\DisplayController(new \App\Converter\Ecb(new \App\Core\Services\RateProviderService\XMLReader()));
//$debug->displayRate();
