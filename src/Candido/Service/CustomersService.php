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
        $this->app['db']->insert('persons',
            ['name' => $this->app['request']->request->get('name'), 'email' => $this->app['request']->request->get('email')]
        );

        return true;
    }

    public function update($id)
    {
        $this->app['db']->update('persons',
            ['name' => $this->app['request']->request->get('name'), 'email'=> $this->app['request']->request->get('email')],
            ['id'   => $id]
        );

        return true;
    }

    public function delete($id)
    {
        $this->app['db']->delete('persons', array(
            'id' => $id,
        ));

        return true;
    }
}