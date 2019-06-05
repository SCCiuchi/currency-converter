<?php
// TODO remove these lines
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/views');
$twig = new \Twig\Environment($loader);

echo $twig->render('converter.html.twig');



// TODO remove debug
//$debug = new \App\Controllers\DisplayController(new \App\Converter\Ecb(new Core\RateReader\XMLReader()));
//$debug->displayRate();

//$debug = new \Core\ConfigReader\ConfigLoader();
//var_dump($debug->getConfigKeys('db')['host']);

//$debug = new \Core\Router\Router($_SERVER);
//$debug->addRoute('', function () {
//   echo 'it works!';
//});
//$debug->run();

//$debug = \App\Services\Database\DbConnection::getInstance();
//$conn = $debug->getConnection();
//var_dump($conn);