<?php

namespace Candido\Controllers;

use Silex\Application;

/**
 * Interface ControllersInterface
 * @package Candido\Controllers
 */
interface ControllersInterface
{
    /**
     * @param Application $app
     * @return mixed
     */
    public function connect(Application $app);
}
