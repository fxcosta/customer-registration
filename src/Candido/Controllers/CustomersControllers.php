<?php

namespace Candido\Controllers;

use Silex\Application;

class CustomersControllers
{
    public function connect(Application $app)
    {
        $customersController = $app['controllers_factory'];

        // list customers
        $customersController->get('/api', function () use ($app) {
            $data = $app['db']->fetchAll('SELECT * FROM persons');

            return $app->json($data);
        });

        return $customersController;
    }
}