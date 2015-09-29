<?php

require_once __DIR__ . '/../app/bootstrap.php';

$customersController = new \Candido\Controllers\CustomersControllers();
$app->mount('/', $customersController->connect($app));

$app->run();
