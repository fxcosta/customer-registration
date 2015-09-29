<?php

namespace Candido\Service;

use Candido\Exceptions\ServiceException;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

class CustomersService implements ServiceInterface
{
    /**
     * @var Application
     */
    private $app;

    /**
     * Construct
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * ShowAll
     *
     * @return mixed
     */
    public function showAll()
    {
        $data = $this->app['db']->fetchAll('SELECT * FROM persons');

        return $data;
    }

    /**
     * Show id
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $sql = "SELECT * FROM persons WHERE id = ?";
        $data = $this->app['db']->fetchAssoc($sql, array((int) $id));

        return $data;
    }

    /**
     * Create
     *
     * @return bool
     */
    public function create()
    {
        $name = filter_var($this->app['request']->request->get('name'), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if (filter_var($this->app['request']->request->get('email'), FILTER_VALIDATE_EMAIL)) {
            $this->app['db']->insert('persons',
                ['name' => $name, 'email' => $this->app['request']->request->get('email')]
            );
            return true;

        }
        return false;
    }

    /**
     * Update
     *
     * @param $id
     * @return bool
     */
    public function update($id)
    {
        $name = filter_var($this->app['request']->request->get('name'), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

        if (filter_var($this->app['request']->request->get('email'), FILTER_VALIDATE_EMAIL)) {
            $this->app['db']->update('persons',
            ['name' => $name, 'email' => $this->app['request']->request->get('email')],
            ['id' => $id]);
            
            return true;
        }
        return false;
    }

    /**
     * Delete
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $delete = $this->app['db']->delete('persons', array(
            'id' => $id,
        ));

        return $delete;
    }
}
