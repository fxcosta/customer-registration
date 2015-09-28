<?php

namespace Candido\Controllers;

use Silex\Application;

class CustomersControllers
{
    public function connect(Application $app)
    {
        $customersController = $app['controllers_factory'];

        // list customers
        $customersController->get('/api/', function () use ($app) {

            $data = $app['db']->fetchAll('SELECT * FROM persons');

            return $app->json($data);
        });

        // select customers
        $customersController->get('/api/{id}', function ($id) use ($app) {

            $sql = "SELECT * FROM persons WHERE id = ?";
            $data = $app['db']->fetchAssoc($sql, array((int) $id));

            return $app->json($data);
        });

        // insert
        $customersController->post('/api/', function () use ($app) {

            $app['db']->insert('persons',
                ['name' => $app['request']->request->get('name'), 'email' => $app['request']->request->get('email')]
            );

            return $app->redirect(('/api/'));
        });

        // update
        $customersController->put('/api/{id}', function ($id) use ($app) {

            $data = $app['db']->update('persons',
                ['name' => $app['request']->request->get('name')],
                ['email' => $app['request']->request->get('email')],
                [$id => $app['request']->request->get('id')]

            );

            return $app->redirect(('/api/'));
        });

        // delete
        $customersController->delete('/api/{id}', function ($id) use ($app) {

            $app['db']->delete('categories', array(
                'id' => $app['request']->query->get('id'),
            ));
        });

        return $customersController;
    }
}