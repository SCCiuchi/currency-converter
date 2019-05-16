<?php

require_once __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/web/views');
$twig = new \Twig\Environment($loader);

echo $twig->render('ecb/ecb_converter.html.twig');



$url = 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
$xml = file_get_contents($url);
var_dump($xml);