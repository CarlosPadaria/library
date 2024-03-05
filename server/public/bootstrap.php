<?php

use Slim\Factory\AppFactory;

$app = AppFactory::create();

$routes = require '../Library/Routes/routes.php';

$routes($app);

$app->run();
