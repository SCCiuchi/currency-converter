<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Converter\DisplayManager;

$display = new DisplayManager();
$tpl = new \App\View\Template('./web/views/main.tpl');
$tpl->set('exchange', $display->displayEcbResult());

$tpl->render();



