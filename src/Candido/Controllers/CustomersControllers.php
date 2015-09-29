<?php

namespace Candido\Controllers;

use Candido\Service\CustomersService;
use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CustomersControllers
 * @package Candido\Controllers
 */
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

        // Template
        $customersController->get('/', function () use ($app) {
            return new Response(file_get_contents('customers/views/template.html'), 200);
        });

        // list customers
        $customersController->get('/api/', function () use ($app) {

            if($app['customersService']->showAll())
                return new JsonResponse($app['customersService']->showAll());
            return new Response('404 not found', Response::HTTP_NOT_FOUND, array('content-type' => 'application/json'));
        });

        // select customers
        $customersController->get('/api/{id}', function ($id) use ($app) {

            if($app['customersService']->show($id))
                return new JsonResponse($app['customersService']->show($id));
            return new Response('404 not found', Response::HTTP_NOT_FOUND, array('content-type' => 'application/json'));
        });

        // insert
        $customersController->post('/api/', function () use ($app) {

            if($app['customersService']->create())
                return $app->redirect(('/api/'));
            return new Response('406 Não aceito, verifique os dados', Response::HTTP_NOT_ACCEPTABLE, array('content-type' => 'application/json'));
        });

        // update
        $customersController->put('/api/{id}', function ($id) use ($app) {

            if($app['customersService']->update($id))
                return $app->json(['success' => true]);
            return new Response('406 Não aceito, verifique os dados', Response::HTTP_NOT_ACCEPTABLE, array('content-type' => 'application/json'));
        });

        // delete
        $customersController->delete('/api/{id}', function ($id) use ($app) {

            if($app['customersService']->delete($id))
                return $app->json(['success' => true]);
            return new Response('404 not found', Response::HTTP_NOT_FOUND, array('content-type' => 'application/json'));
        });

        return $customersController;
    }
}
