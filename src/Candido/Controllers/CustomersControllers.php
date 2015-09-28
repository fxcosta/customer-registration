<?php

namespace Candido\Controllers;

use Candido\Service\CustomersService;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class CustomersControllers
{
    public function connect(Application $app)
    {
        $customersController = $app['controllers_factory'];

        /**
         * @var CustomersService
         * @return CustomersService
         */
        $app['customersService'] = function () use ($app) {
            $customersService = new CustomersService($app);
            return $customersService;
        };

        // list customers
        $customersController->get('/api/', function () use ($app) {

            $data = $app['customersService']->showAll();

            return $app->json($data);

        });

        // select customers
        $customersController->get('/api/{id}', function ($id) use ($app) {

            $data = $app['customersService']->show($id);

            return $app->json($data);
        });

        // insert
        $customersController->post('/api/', function () use ($app) {

            $data = $app['customersService']->create();

            if($data)
                return $app->redirect(('/api/'));
            return $app->json(['success' => false]);

        });

        // update
        $customersController->put('/api/{id}', function (Request $request,$id) use ($app) {

            $update = $app['db']->update('persons',
                ['name' => $app['request']->request->get('name')],
                ['email'=> $app['request']->request->get('email')],
                ['id'   => $id]
            );

            if($update)
                return $app->json(['success' => true]);
            if(!$update)
                return $app->json(['success' => false]);
        });

        // delete
        $customersController->delete('/api/{id}', function ($id) use ($app) {

            $delete = $app['db']->delete('persons', array(
                'id' => $id,
            ));

            if($delete)
                return $app->json(['success' => true]);
            if(!$delete)
                return $app->json(['success' => false]);
        });

        return $customersController;
    }
}