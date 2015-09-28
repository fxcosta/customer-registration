<?php
//******* PRODUÇÃO *******//
/*
error_reporting(E_ALL);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
ini_set("error_log", "../errors.log");
date_default_timezone_set('America/Sao_Paulo');
 */

//******* DESENVOLVIMENTO *******//
error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('America/Sao_Paulo');


require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

$app = new Application();

$app['debug'] = true;

// REGISTRO DOCTRINE
$app->register(new \Silex\Provider\DoctrineServiceProvider(), [
    'db.options' => include_once __DIR__ . '/config/db.options.php'
]);

return $app;
