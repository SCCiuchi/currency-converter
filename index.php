<?php

require_once __DIR__ . '/vendor/autoload.php';

$tpl = new \App\View\Template('./web/views/main.tpl');
$tpl->render();

echo $values;
