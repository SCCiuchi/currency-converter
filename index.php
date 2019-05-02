<?php

require_once __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/web/views');
$twig = new Twig_Environment($loader);

$template = $twig->load('base.twig');

echo $template->renderBlock('content');
