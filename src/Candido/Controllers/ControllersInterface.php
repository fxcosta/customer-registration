<?php

namespace Candido\Controllers;

use Silex\Application;

interface ControllersInterface
{
    public function connect(Application $app);
}