<?php

namespace Candido\Service;

use Silex\Application;

class CustomersService implements ServiceInterface
{
    /**
     * @var Application
     */
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function showAll()
    {
        $data = $this->app['db']->fetchAll('SELECT * FROM persons');

        return $data;
    }

    public function show($id)
    {
        $sql = "SELECT * FROM persons WHERE id = ?";
        $data = $this->app['db']->fetchAssoc($sql, array((int) $id));

        return $data;
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}