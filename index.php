<?php

require_once __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/web/views');
$twig = new Twig_Environment($loader);

echo $twig->render('index.html.twig');

$conn = new \App\Database\DbConnection();
$conn->connectToDb(); // debug

$currencyRates = new \App\Converter\RateBnr();


function printRate(\App\Interfaces\RateProviderInterface $provider)
{
    var_dump($provider->getRate());
}

printRate(new \App\Converter\RateEcb());
printRate(new \App\Converter\RateBnr());