<?php

require_once __DIR__ . '/../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/views');
$twig = new \Twig\Environment($loader);

echo $twig->render('partials/converter.html.twig');

$debug = new \App\Converter\Bnr(new \App\Core\Services\RateProviderService\XMLReader());
$debug->getRate();