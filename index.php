<?php

require_once __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/web/views');
$twig = new \Twig\Environment($loader);

echo $twig->render('partials/converter.html.twig');



$url = 'https://www.partials.europa.eu/stats/eurofxref/eurofxref-daily.xml';
$url2 = 'https://www.bnr.ro/nbrfxrates.xml';

$content = file_get_contents($url);
$xml = new SimpleXMLElement($content);

var_dump($xml);