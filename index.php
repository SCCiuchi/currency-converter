<?php

require_once __DIR__ . '/vendor/autoload.php';
use Twig\Loader\FilesystemLoader;

$loader = new \Twig\Loader\FilesystemLoader('./web/views');
$twig = new \Twig\Environment($loader);

echo $twig->render('base.html');

